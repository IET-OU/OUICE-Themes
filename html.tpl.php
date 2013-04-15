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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML+RDFa 1.0//EN" "http://www.w3.org/MarkUp/DTD/xhtml-rdfa-1.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language; ?>" version="XHTML+RDFa 1.0" dir="<?php print $language->dir; ?>"<?php print $rdf_namespaces; ?>>
<head profile="<?php print $grddl_profile; ?>">
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<?php  // get the common header elements (This can be called by all page templates)
include('includes/header.php'); ?>
<?php print $styles; ?>
<?php print $scripts; ?>

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
      <?php print $page_top; ?>
      <?php print $page; ?>
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