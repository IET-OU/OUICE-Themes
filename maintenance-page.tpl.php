<?php

/**
* @file
* Default theme implementation to display the basic html structure of a single
* Drupal page.
*
* Variables:
* - $css: An array of CSS files for the current page.
* - $language: (object) The language the site is being displayed in.
*   $language->language contains its textual representation.
*   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
* - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
* - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
* - $head_title: A modified version of the page title, for use in the TITLE
*   tag.
* - $head_title_array: (array) An associative array containing the string parts
*   that were used to generate the $head_title variable, already prepared to be
*   output as TITLE tag. The key/value pairs may contain one or more of the
*   following, depending on conditions:
*   - title: The title of the current page, if any.
*   - name: The name of the site.
*   - slogan: The slogan of the site, if any, and if there is no title.
* - $head: Markup for the HEAD section (including meta tags, keyword tags, and
*   so on).
* - $styles: Style tags necessary to import all CSS files for the page.
* - $scripts: Script tags necessary to load the JavaScript files and settings
*   for the page.
* - $page_top: Initial markup from any modules that have altered the
*   page. This variable should always be output first, before all other dynamic
*   content.
* - $page: The rendered page content.
* - $page_bottom: Final closing markup from any modules that have altered the
*   page. This variable should always be output last, after all other dynamic
*   content.
* - $classes String of classes that can be used to style contextually through
*   CSS.
*
* @see template_preprocess()
* @see template_preprocess_html()
* @see template_process()
*/

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php print $styles; ?>
<?php //print $scripts; ?>
<?php  // get the common header elements (This can be called by all page templates)
include('includes/header.php'); ?>
</head>
<body class="ou-mobile <?php print phptemplate_get_body_classes(); ?> <?php print phptemplate_get_faculty_classes(); ?> <?php print phptemplate_get_ia_classes(); ?> <?php print $classes; ?>" <?php print $attributes;?>>
  <div id="ou-org">
    <?php  // INCLUDE THE OU HEADER
    $header_footer_selection = phptemplate_get_ia();
    if (!empty($header_footer_selection['header'])){
      include($header_footer_selection['header']);
    } else {
      if ($header_footer_selection['header'] != ''){
        print $header_footer_selection['error'];
      }
    }; 
    ?>
    <div id="ou-site">
      <div id="skip-link">
        <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
      </div>
  <div id="ou-site-header">
    <?php if ($site_name || $site_slogan || $logo){
      print '<div id="ou-site-ident">';
      print ($logo ? '<img class="go2" src="'. check_url($logo) .'" alt="'. $site_name .'" id="logo" />' : "");
      print ($site_name ? '<p id="ou-site-title">' . $site_name . '</p>' : '');
      print ($site_slogan ? '<p id="ou-site-description">'. $site_slogan .'</p>' : '');
      print '</div>';
    }; ?>
    <?php if ($main_menu || $secondary_menu) {
      print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('id' => 'main-menu', 'class' => array('ou-sections'))));
    }	
    ?>
  </div>
  <div id="ou-site-body">
    <div id="ou-page">
      <!-- Start of region 1 -->
        <div id="ou-region1">
        <div class="ou-content" id="ou-content">
          <?php print $content; ?>
        </div>
      </div>
      <!-- End of region 1 -->
    </div>
  </div>
  <div id="ou-site-footer">
    <a href="#ou-content" class="ou-to-top">Back to top</a>
  </div>
  </div>
  <?php //Get the page footer and common OU elements
    $header_footer_selection = phptemplate_get_ia();
    if (!empty($header_footer_selection['footer'])){
      include($header_footer_selection['footer']);
    }
    else {
      if ($header_footer_selection['footer'] != ''){
        print $header_footer_selection['error'];
      }
    };
  if ($page_bottom){
    print $page_bottom;
  };
  ?>
</div>
<?php  // get the common header elements (This can be called by all page templates)
include('includes/footer.php'); ?>
</body>
</html>