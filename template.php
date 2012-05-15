<?php
// $Id: template.php,v 2.0 2010/06/08 09:00:00 laustin and PConolly Exp $
/**
 * Force refresh of theme registry.
 * DEVELOPMENT USE ONLY - COMMENT OUT FOR PRODUCTION
 */
 //
//drupal_rebuild_theme_registry();
/**
 * Override or insert PHPTemplate variables into the templates.
 */
global $base_url;
function phptemplate_preprocess_page(&$vars) {
  $vars['tabs2'] = menu_secondary_local_tasks();
  if($node = menu_get_object()) {
      $vars['node'] = $node;
      $suggestions = array();
	  if(drupal_is_front_page()):
		  $template_filename = 'page';
		  $template_filename = $template_filename .'-front';
		  $suggestions[] = $template_filename;
	  else:
		  $template_filename = 'page';
		  $template_filename = $template_filename .'-'. $vars['node']->type;
		  $suggestions[] = $template_filename;
	  endif;
     $vars['template_files'] = $suggestions;
    }
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}
/**
 * Allow themable wrapping of all comments.
 */
function phptemplate_comment_wrapper($content, $node) {
  if (!$content || $node->type == 'forum') {
    return '<div id="comments">'. $content .'</div>';
  }
  else {
    return '<div id="comments"><h2 class="comments">'. t('Comments') .'</h2>'. $content .'</div>';
  }
}
/**
 * THEME SETTINGS
 * Return Header and Footer pair selection which is made in theme-settings.
 * @param
 * @return a string containing the header and footer filename
 */
function phptemplate_get_header_footer() {
    // Set header and footer paths based on selection made in theme config settings
	// Normal path when on live server is 'includes/xxx'
    switch (theme_get_setting('header_choice')) {
        case "ou-ia-about" :
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
        break;
        case "ou-ia-study" :
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
        break;
        case "ou-ia-research" :
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
        break;
        case "ou-ia-community" :
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
        break;
		case "ou-ia-learning" :
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
        break;
		case "legacy" :
	        $header_selection = 'header-centre-09.html';
            $footer_selection = 'footer-09.html';
        break;
		case "none" :
	        $header_selection = '';
            $footer_selection = '';
        break;
        default:
	        $header_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-header.html';
            $footer_selection = drupal_get_path('theme','ou_exstd').'/includes/headers-footers/ou-footer.html';
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
	 foreach (theme_get_setting('body_classes') as $classes) {
		$body_classes .= ($classes == '0' ? '' : $classes.' ');
	 }
	 return $body_classes;
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
        case "fullnav" :
			$nav_class = 'ou-full-nav';
        break;
        case "contextnav" :
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
function phptemplate_breadcrumb($breadcrumb) {
   $get_site_name = variable_get('site_name', "Default site name");
   $themed_breadcrumb .= '<ol class="ou-ancestors">';
   if (!empty($breadcrumb)) {
   $breadcrumb[] = drupal_get_title();
   $breadcrumb[0] = l(($get_site_name ? $get_site_name : "Home"),NULL);
   $breadcrumb_string = implode($breadcrumb);
   
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


function phptemplate_item_list($items = array(), $title = NULL, $type = 'ul', $attributes = NULL, $args = NULL) {
//if args = paged then omit the div with class of item-list as this affects the output needed for ouice pagers
  if (isset($args)):
	$output = ($args === 'paged' ? '' : '<div class="item-list">');
  endif;
  
  if (isset($title)) {
    $output .= '<h3>'. $title .'</h3>';
  }

  if (!empty($items)) {
    $output .= "<$type" . drupal_attributes($attributes) . '>';
    foreach ($items as $item) {
      $attributes = array();
      $children = array();
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
        $data .= theme_item_list($children, NULL, $type, $attributes); // Render nested list
      }
      $output .= '<li' . drupal_attributes($attributes) . '>'. $data .'</li>';
    }
    $output .= "</$type>";
  }
  if (isset($args)):
	$output .= ($args === 'paged' ? '' : '</div>');
  endif;
  return $output;
}

/* Standard theme pager function with the addtions of label changes, ouice class names and a dive wrapping
 *
 *
 *
 */
function phptemplate_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 5) {
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

  $li_first = theme('pager_first', (isset($tags[0]) ? $tags[0] : t('« first')), $limit, $element, $parameters);
  $li_previous = theme('pager_previous', (isset($tags[1]) ? $tags[1] : t('‹ previous')), $limit, $element, 1, $parameters);
  $li_next = theme('pager_next', (isset($tags[3]) ? $tags[3] : t('next ›')), $limit, $element, 1, $parameters);
  $li_last = theme('pager_last', (isset($tags[4]) ? $tags[4] : t('last »')), $limit, $element, $parameters);

  if ($pager_total[$element] > 1) {
    if ($li_first) {
      $items[] = array(
        'class' => 'ou-first',
        'data' => $li_first,
      );
    }
    if ($li_previous) {
      $items[] = array(
        'class' => 'ou-previous',
        'data' => $li_previous,
      );
    }

    // When there is more than one page, create the pager list.
    if ($i != $pager_max) {
      if ($i > 1) {
        $items[] = array(
          'class' => 'pager-ellipsis',
          'data' => '…',
        );
      }
      // Now generate the actual pager piece.
      for (; $i <= $pager_last && $i <= $pager_max; $i++) {
        if ($i < $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_previous', $i, $limit, $element, ($pager_current - $i), $parameters),
          );
        }
        if ($i == $pager_current) {
          $items[] = array(
            'class' => 'pager-current',
			'data' => $i,
          );
        }
        if ($i > $pager_current) {
          $items[] = array(
            'class' => 'pager-item',
            'data' => theme('pager_next', $i, $limit, $element, ($i - $pager_current), $parameters),
          );
        }
      }
      if ($i < $pager_max) {
        $items[] = array(
          'class' => 'pager-ellipsis',
          'data' => '…',
        );
      }
    }
    // End generation.
    if ($li_next) {
      $items[] = array(
        'class' => 'ou-next',
        'data' => $li_next,
      );
    }
    if ($li_last) {
      $items[] = array(
        'class' => 'ou-last',
        'data' => $li_last,
      );
    }
	$_page_count = t('@current of @max', array('@current' => $pager_current, '@max' => $pager_max));
    return '<div class="ou-paged"><p>Page '. $_page_count .'</p>' . theme('item_list', $items, NULL, 'ul', array('class' => 'pager'), 'paged') . '</div>';
  }
}


/* Standard view mini pager function with the addtions of label changes and a dive wrapping
 *
 *
 *
 */
function phptemplate_views_mini_pager($tags = array(), $limit = 10, $element = 0, $parameters = array(), $quantity = 9) {
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
    return '<div class="ou-paged"><p>Page '. $_page_count .'</p>' . theme('item_list', $items, NULL, 'ul', array('class' => 'pager'), 'paged') . '</div>';
  }
}








/**
 * Returns the rendered local tasks. The default implementation renders
 * them as tabs. Overridden to split the secondary tasks.
 *
 * @ingroup themeable
 */
function phptemplate_menu_local_tasks() {
  return menu_primary_local_tasks();
}
function phptemplate_comment_submitted($comment) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $comment),
      '!datetime' => format_date($comment->timestamp)
    ));
}
function phptemplate_node_submitted($node) {
  return t('!datetime — !username',
    array(
      '!username' => theme('username', $node),
      '!datetime' => format_date($node->created),
    ));
}

/**
 * Generate the HTML output for a menu tree
 * USED to output correct OUICE structure and classes
 * Removes class="menu"
 */
function phptemplate_menu_tree($tree) {
	if(phptemplate_get_nav_type() == 'ou-full-nav'):
		return '<ul><li><ul>'. $tree .'</ul></li></ul>';
	else:
		return '<ul>'. $tree .'</ul>';
	endif;
    
    //print_r($tree);
}
/**
 * Generate the HTML output for a menu item and submenu.
 * USED to output correct OUICE structure and classes
 *
 */
function phptemplate_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'ou-expanded' : ($has_children ? 'ou-collapsed' : ''));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' current active-trail';
  }
  return '<li '. ($class ? 'class="'. $class .'"' : '') .'>'. $link . $menu ."</li>\n";
}

/**
 * Generate the HTML output for a single local task link.
 * USED to output correct OUICE structure and classes
 *
 */
function phptemplate_menu_local_task($link, $active = FALSE) {
  return '<li '. ($active ? 'class="current active" ' : '') .'>'. $link ."</li>\n";
}


/*
*
* Return a themed event profile div containing location, contact and time values
*
*
*/
function phptemplate_event_profile($node) {
$retstr="";
 if ($node->field_location[0]['value']):
	$retstr.=  '<div class="event_location clear-block">
	<div class="event_profile_row" ><span class="event_title_lable" >Location: </span><span class="event_title_value" >' .$node->field_location[0]['value'].'</span></div>';
	if (empty($node->field_end_date[0]['view'])): // check events dates and handle options
		// no end date set
		if (!empty($node->field_start_date[0]['view'])):
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Date:</span><span class="event_title_value" >'. str_replace("(All day)","",$node->field_start_date[0]['view']).'</span></div>';
		endif;
		$retstr.=oustyle_event_time_handle($node);
	else:
		if (!empty($node->field_start_date[0]['view'])):
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Start Date:</span><span class="event_title_value" >'.str_replace("(All day)","",$node->field_start_date[0]['view'])."</span></div>";
		endif;
		$retstr.=oustyle_event_time_handle($node);
		$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >End date:</span><span class="event_title_value" >'.str_replace("(All day)","",$node->field_end_date[0]['view'])."</span></div>";
	endif;
	if (!empty($node->field_contact[0]['value'])):
		if (empty($node->field_content_link[0]['url'])):
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Contact:</span><span class="event_title_value" >'.$node->field_contact[0]['value'].'</span></div>';
		else:
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Contact:</span><span class="event_title_value" ><a href="' .$node->field_content_link[0]['url'] .'" > ' .$node->field_contact[0]['value'].'</a></span></div>';
		endif;
	endif;
 	$retstr.= "</div>";
 endif;
return $retstr;
}
/*
* the time element of event handling: return themed content
*
*/
function oustyle_event_time_handle($node) {
$retstr="";
if ( $node->field_start_time[0]['value'] !== "none"  ): // check to see if anything needs rendering
	if ( $node->field_start_time[0]['value'] == "all day"  ): $node->field_end_time[0]['value'] = "none"; endif;
	if (empty($node->field_end_time[0]['value'])): // no end time, only show a single item
		if (!empty($node->field_start_time[0]['value'])):
			$retstr.=  '<div class="event_profile_row" ><span class="event_time_lable" >Time: </span><span class="event_title_value" >'. $node->field_start_time[0]['value']."</span></div>";
		endif;
	else:
		if ( $node->field_end_time[0]['value'] == "none"  ): // check to see if anything needs rendering
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Time: </span><span class="event_title_value" >'. $node->field_start_time[0]['value']."</span></div>";
		else:
			$retstr.=  '<div class="event_profile_row" ><span class="event_title_lable" >Time: </span><span class="event_title_value" >'. $node->field_start_time[0]['value']."&nbsp;-&nbsp;" . $node->field_end_time[0]['value']."</span></div>";
		endif;
	endif;
endif;
return $retstr;
}
