<?php
/**
 * @file
 * The theme system, which controls the output of Drupal.
 *
 * The theme system allows for nearly all output of the Drupal system to be
 * customized by user themes.
 */
// $Id: template.php,v 3.1 2012/06/29 09:00:00 laustin (07779 146104) $
/**
 * Force refresh of theme registry.
 * DEVELOPMENT USE ONLY - COMMENT OUT FOR PRODUCTION
 */
//
//drupal_theme_rebuild();
global $base_url;

function ou_ouice3_preprocess_page(&$variables, $hook) {
   // Page template suggestions based off of content types
   if (isset($variables['node'])) {
    $variables['theme_hook_suggestions'][] = 'page__type__'. $variables['node']->type;
    $variables['theme_hook_suggestions'][] = "page__node__" . $variables['node']->nid;
   }

   // Page template suggestions based off URL alias
   if (module_exists('path')) {
    $alias = drupal_get_path_alias(str_replace('/edit','',$_GET['q']));
    if ($alias != $_GET['q']) {
      $template_filename = 'page';
      foreach (explode('/', $alias) as $path_part) {
        $template_filename = $template_filename . '__' . $path_part;
        $variables['theme_hook_suggestions'][] = $template_filename;
      }
    }
  }

}

/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">' . $content . '</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">' . t('Comments') . '</h2>' . $content . '</div>';
  }
}
/**
 * THEME SETTINGS
 * Return Header and Footer pair selection which is made in theme-settings.
 * @param
 * @return a string containing the header and footer filename
 */
function phptemplate_get_ia() {
  // Set header and footer paths based on selection made in theme config settings
  // Normal path when on live server is 'includes/xxx'
  switch (theme_get_setting('header_choice')) {
  case "legacy" :
    $header_selection = '/var/www/html/includes/header-centre-09.html';
    $footer_selection = '/var/www/html/includes/footer-09.html';
    break;
  case "intranet" :
    $header_selection = '/var/www/html/includes/headers-footers/header-intranet-v3.html';
    $footer_selection = '/var/www/html/includes/headers-footers/footer-intranet-v3.html';
    break;
  case "none" :
    $header_selection = '';
    $footer_selection = '';
    break;
  case "ou-ia-about" :
  case "ou-ia-study" :
  case "ou-ia-research" :
  case "ou-ia-community" :
  case "ou-ia-learning" :
  default:
    $header_selection = '/var/www/html/includes/headers-footers/ou-header.html';
    $footer_selection = '/var/www/html/includes/headers-footers/ou-footer.html';
    break;
  }
  return array(
    'header' => $header_selection,
    'footer' => $footer_selection,
    'error' => '<div>ERROR: No Header or footer selection found. Go to theme settings and select a header/footer pair to display</div>'
  );
}
/**
 * THEME SETTINGS
 * Return body classes selection made in theme-settings.
 * @param
 * @return a string containing the class names
 */
function phptemplate_get_body_classes() {
  $body_classes = '';
  $stored_classes = theme_get_setting('body_classes');
  if (!empty($stored_classes)) {
    foreach ($stored_classes as $classes) {
      $body_classes .= ($classes == '0' ? '' : $classes . ' ');
    }
  }
  return $body_classes;
}

/**
 * THEME SETTINGS
 * Return faculty classes selection made in theme-settings.
 * @param
 * @return a string containing the class names
 */
function phptemplate_get_faculty_classes() {
  $faculty_classes = '';
  $faculty_classes .= theme_get_setting('faculty_classes');
  return $faculty_classes;
}

/**
 * THEME SETTINGS
 * Return IA classes selection made in theme-settings.
 * @param
 * @return a string containing the class names
 */
function phptemplate_get_ia_classes() {
  $ia_classes = '';
  $ia_classes .= theme_get_setting('header_choice');
  return $ia_classes;
}

/**
 * THEME SETTINGS
 * Return nav type selection made in theme-settings.
 *
 *
 */
function phptemplate_get_nav_type() {
  $nav_class = '';
  switch (theme_get_setting('nav_type')) {
  case "ou-full-nav" :
    $nav_class = 'ou-full-nav';
    break;
  case "ou-context-nav" :
    $nav_class = 'ou-context-nav ou-box ou-links';
    break;
  }
  return $nav_class;
}

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
 //ou_ouice3_

function ou_ouice3_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  $get_site_name = variable_get('site_name', "Default site name");
  $themed_breadcrumb = '<ol class="ou-ancestors">';

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
	$breadcrumb[] = drupal_get_title();
    $breadcrumb[0] = l(($get_site_name ? 'llsss' : "Home"), NULL);

	$array_size = count($breadcrumb);
    $i = 0;
    while ( $i < $array_size) {
      $themed_breadcrumb .= '<li>';
      $themed_breadcrumb .=  $breadcrumb[$i] . '</li>';
      $i++;
    }
    $themed_breadcrumb .= '</ol>';

    return $themed_breadcrumb;
  }
}

/**
 * Theme function for the breadcrumb.
 *
 * @param array $breadcrumb
 *   breadcrumb segments
 * @param int $segments_quantity
 *   segments number
 * @param string $separator
 *   segments separator
 *
 * @return string
 *   HTML for the themed breadcrumb.
 */
function ou_ouice3_easy_breadcrumb($variables) {

  $breadcrumb = $variables['breadcrumb'];
  $segments_quantity = $variables['segments_quantity'];
  $separator = $variables['separator'];

  $html = '';

  $get_site_name = variable_get('site_name', "Default site name");
  $breadcrumb[] = drupal_get_title();
  $breadcrumb[0] = l(($get_site_name ? $get_site_name : "Home"), NULL);

  if ($segments_quantity > 0) {
    $html .= '<ol class="ou-ancestors">';
    for ($i = 0, $s = $segments_quantity - 1; $i < $segments_quantity; ++$i) {
      $html .= '<li>' . $breadcrumb[$i] . '</li>';
      if ($i < $s) {
        $html .= '' . $separator . '';
      }
    }
    $html .= '</ol>';
  }

  return $html;
}

function ou_ouice3_item_list($variables) {

  $items = $variables['items'];
  $title = $variables['title'];
  $type = $variables['type'];
  $attributes = $variables['attributes'];
  $output = '';
  //if args = paged then omit the div with class of item-list as this affects the output needed for ouice pagers
  if ((!empty($variables['attributes']['class']['0'])) && ($variables['attributes']['class']['0'] == 'pager')) {
	 $output .= '<div class="ou-paged">';
  }

  // Only output the list container and title, if there are any list items.
  // Check to see whether the block title exists before adding a header.
  // Empty headers are not semantic and present accessibility challenges.
  //$output = '<div class="item-list">';
  if (isset($title) && $title !== '') {
    $output .= '<h3>' . $title . '</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    $num_items = count($items);
    foreach ($items as $i => $item) {
      $attributes = array();
      $children = array();
      $data = '';
      if (is_array($item)) {
        foreach ($item as $key => $value) {
          if ($key == 'data') {
            $data = $value;
          }
          elseif ($key == 'children') {
            $children = $value;
          }
          else {
            $attributes[$key] = $value;
          }
        }
      }
      else {
        $data = $item;
      }
      if (count($children) > 0) {
        // Render nested list.
        $data .= theme_item_list(array('items' => $children, 'title' => NULL, 'type' => $type, 'attributes' => $attributes));
      }
      if ($i == 0) {
        $attributes['class'][] = 'first';
      }
      if ($i == $num_items - 1) {
        $attributes['class'][] = 'last';
      }
      $output .= '<li' . drupal_attributes($attributes) . '>' . $data . "</li>\n";
    }
    $output .= "</$type>";
  }
  //$output .= '</div>';
  if ((!empty($variables['attributes']['class']['0'])) && ($variables['attributes']['class']['0'] == 'pager')) {
	 $output .= '</div>';
  }
  return $output;
}


/* Standard theme pager function with the addtions of label changes, ouice class names and a dive wrapping
 *
 *
 *
 */
function ou_ouice3_pager($variables) {
  $tags = $variables['tags'];
  $element = $variables['element'];
  $parameters = $variables['parameters'];
  $quantity = $variables['quantity'];
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // first is the first page listed by this pager piece (re quantity)
  $pager_first = $pager_current - $pager_middle + 1;
  // last is the last page listed by this pager piece (re quantity)
  $pager_last = $pager_current + $quantity - $pager_middle;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.

  // Prepare for generation loop.
  $i = $pager_first;
  if ($pager_last > $pager_max) {
    // Adjust "center" if at end of query.
    $i = $i + ($pager_max - $pager_last);
    $pager_last = $pager_max;
  }
  if ($i <= 0) {
    // Adjust "center" if at start of query.
    $pager_last = $pager_last + (1 - $i);
    $i = 1;
  }
  // End of generation loop preparation.

  $li_first = theme('pager_first', array('text' => (isset($tags[0]) ? $tags[0] : t('« first')), 'element' => $element, 'parameters' => $parameters));
  $li_previous = theme('pager_previous', array('text' => (isset($tags[1]) ? $tags[1] : t('‹ previous')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_next = theme('pager_next', array('text' => (isset($tags[3]) ? $tags[3] : t('next ›')), 'element' => $element, 'interval' => 1, 'parameters' => $parameters));
  $li_last = theme('pager_last', array('text' => (isset($tags[4]) ? $tags[4] : t('last »')), 'element' => $element, 'parameters' => $parameters));

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => array('ou-first'),
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => array('ou-previous'),
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_previous', array('text' => $i, 'element' => $element, 'interval' => ($pager_current - $i), 'parameters' => $parameters)),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => array('pager-current'),
            'data' => '<strong>'.$i.'</strong>' // Ensures that the pager displays correctly for OU ICE. This might want to be themed seperately so it can be changed by other modules?
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => array('pager-item'),
            'data' => theme('pager_next', array('text' => $i, 'element' => $element, 'interval' => ($i - $pager_current), 'parameters' => $parameters)),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => array('pager-ellipsis'),
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => array('ou-next'),
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => array('ou-last'),
        'data' => $li_last,
      );
    }
    $_page_count = t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max));
    return '<div class="ou-paged"><p>' . $_page_count . '</p>' . theme('item_list', array('items' => $items, 'attributes' => array('class' => array('pager')),)) . '</div>';
	// return '<h2 class="element-invisible">' . t('Pages') . '</h2>' . theme('item_list', array(
	//       'items' => $items,
	//       'attributes' => array('class' => array('pager')),
	//     ));
  }
}

/* Standard view mini pager function with the addtions of label changes and a dive wrapping
 *
 *
 *
 */
function ssphptemplate_views_mini_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9) {
  global $pager_page_array, $pager_total;

  // Calculate various markers within this pager piece:
  // Middle is used to "center" pages around the current page.
  $pager_middle = ceil($quantity / 2);
  // current is the page we are currently paged to
  $pager_current = $pager_page_array[$element] + 1;
  // max is the maximum page number
  $pager_max = $pager_total[$element];
  // End of marker calculations.


  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('Prev')), $limit, $element, 1, $parameters);
  if (empty($li_previous)) {
    $li_previous = "&nbsp;";
  }

  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('Next')), $limit, $element, 1, $parameters);
  if (empty($li_next)) {
    $li_next = "&nbsp;";
  }

  if ($pager_total[$element] > 1) {
    $items[] = array(
      'class' => 'pager-previous',
      'data' => $li_previous,
    );

    //$items[] = array(
    //  'class' => 'pager-current',
    //  'data' => t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max)),
    //);

    $items[] = array(
      'class' => 'pager-next',
      'data' => $li_next,
    );
    $_page_count = t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max));
    return '<div class="ou-paged"><p>Pageasdsadsada ' . $_page_count . '</p>' . theme('item_list', $items, NULL, 'ul', array('class' => 'pager'), 'paged') . '</div>';
  }
}

/**
 * Generate the HTML output for a menu tree
 * USED to output correct OUICE structure and classes
 * Removes class="menu"
 */
function ou_ouice3_menu_tree($variables) {
  if (phptemplate_get_nav_type() == 'ou-full-nav'):
    return '<ul><li><ul>' . $variables['tree'] . '</ul></li></ul>';
  else:
    return '<ul>' . $variables['tree'] . '</ul>';
  endif;
}

/**
 * Generate the HTML output for a menu item and submenu.
 * USED to output correct OUICE structure and classes
 *
 */
function ou_ouice3_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';

  $classes_count = count($element['#attributes']['class']);
	for($i=0;$i<$classes_count;++$i){
		if($element['#attributes']['class'][$i] == 'expanded'){
			$element['#attributes']['class'][$i] = 'ou-expanded';
		}
	}

  if ($element['#below']) {
    $sub_menu = drupal_render($element['#below']);
  }
  $output = l($element['#title'], $element['#href'], $element['#localized_options']);
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * Generate the HTML output for a single local task link.
 * USED to output correct OUICE structure and classes
 *
 */
function ou_ouice3_menu_local_task($variables) {
  $link = $variables['element']['#link'];
  $link_text = $link['title'];

  if (!empty($variables['element']['#active'])) {
    // Add text to indicate active tab for non-visual users.
    $active = '<span class="element-invisible">' . t('(active tab)') . '</span>';

    // If the link does not contain HTML already, check_plain() it now.
    // After we set 'html'=TRUE the link will not be sanitized by l().
    if (empty($link['localized_options']['html'])) {
      $link['title'] = check_plain($link['title']);
    }
    $link['localized_options']['html'] = TRUE;
    $link_text = t('!local-task-title!active', array('!local-task-title' => $link['title'], '!active' => $active));
  }

  return '<li' . (!empty($variables['element']['#active']) ? ' class="current active"' : '') . '>' . l($link_text, $link['href'], $link['localized_options']) . "</li>\n";
}

/**
 * OU_PURE CLASS
 * Add ou-pure body class if region2 is empty
 *
 */
function ou_ouice3_preprocess_html(&$variables) {
  if(empty($variables['page']['region2'])) {
    $variables['classes_array'][] = 'ou-pure';
  }
  //add socialcount class to body for certain pages / content types
  if(drupal_is_front_page()) {
    $variables['classes_array'][] = 'has-sc';
  }
}
