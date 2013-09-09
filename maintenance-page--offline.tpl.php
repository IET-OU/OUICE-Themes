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
// If your theme is set to display the site name, uncomment this line and replace the value:
  $site_name = 'Your Site Name';

  // If your theme is set to *not* display the site name, uncomment this line:
  //unset($site_name);

  // If your theme is set to display the site slogan, uncomment this line and replace the value:
  $site_slogan = 'My Site Slogan';

  // If your theme is set to *not* display the site slogan, uncomment this line:
  // unset($site_slogan);
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
<title></title>
<?php  // get the common header elements (This can be called by all page templates)
include('includes/header-offline.php'); ?>


</head>
<body class="ou-mobile none">
  <div id="ou-org">
    <?php  // INCLUDE THE OU HEADER
    include('/var/www/html/includes/headers-footers/ou-header.html');
    ?>
    <div id="ou-site">
      <div id="skip-link">
        <a href="#main-content" class="element-invisible element-focusable"><?php print t('Skip to main content'); ?></a>
      </div>
  <div id="ou-site-header">
    <?php 
      print '<div id="ou-site-ident">';
      print '<p id="ou-site-title">' . $site_name . '</p>' : '');
      print '<p id="ou-site-description">'. $site_slogan .'</p>' : '');
      print '</div>';
    ?>
  </div>
  <div id="ou-site-body">
    <div id="ou-page">
      <!-- Start of region 1 -->
        <div id="ou-region1">
        <div class="ou-content" id="ou-content">
          <p>The site is currently not available. Please try again later.</p>
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
    include('/var/www/html/includes/headers-footers/ou-footer.html');
  ?>
</div>
<?php  // get the common header elements (This can be called by all page templates)
include('includes/footer-offline.php'); ?>
</body>
</html>