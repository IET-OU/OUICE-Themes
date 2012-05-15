<?php
// $Id: header.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
/**
 * @file
 * header.php
 *
 */
  $path_to_base_theme = drupal_get_path('theme','ou_exstdv3');
?>
<!-- link to ou webstandards OUICE -->
<link href="http://wwwdev.open.ac.uk/includes/headers-footers/ou-header.css" rel="stylesheet" type="text/css" media="all" />
<link href="http://wwwdev.open.ac.uk/includes/ouice/3/screen.css" rel="stylesheet" type="text/css" media="screen, projection" />
<link href="http://wwwdev.open.ac.uk/includes/ouice/3/print.css" rel="stylesheet" type="text/css" media="print" />
<!-- <link href="/includes/headers-footers/header-public-centre-gradient.css" rel="stylesheet" type="text/css" media="all" /> -->
<!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="http://wwwdev.open.ac.uk/includes/ouice/3/ie.css" />
<![endif]-->
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="http://wwwdev.open.ac.uk/includes/ouice/3/ie6.css" />
<![endif]-->
  <script type="text/javascript" src="/includes/header.js"></script>
  <?php print $styles ?>
<!--[if IE 8]>
  <link href="<?php print $base_path . $path_to_base_theme; ?>/styles/style_ie8.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
  <link href="<?php print $base_path . $path_to_base_theme; ?>/styles/style_ie7.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
  <link href="<?php print $base_path . $path_to_base_theme; ?>/styles/style_ie6.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<meta name="viewport" content="width=device-width; initial-scale=1" />
<link rel="stylesheet" type="text/css" href="http://wwwdev.open.ac.uk/includes/ouice/3/mobile.css" media="only screen and (max-device-width:640px)" />
<link rel="stylesheet" type="text/css" href="http://wwwdev.open.ac.uk/includes/ouice/3/mobile.css" media="only screen and (max-width:640px)" />
