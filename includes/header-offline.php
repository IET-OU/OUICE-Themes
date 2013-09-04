<?php
// $Id: header.php,v 3.0 2012/06/29 09:00:00 laustin (07779 146104) $
/**
 * @file
 * header.php
 *
 */
global $base_url;
//$path_to_base_theme = drupal_get_path('theme','ou_ouice3');
$path_to_base_theme = '/sites/all/themes/ou_ouice3';

//sites/all/themes/ou_ouice3
?>
<?php
print '<link rel="stylesheet" type="text/css" href="/includes/headers-footers/ou-header-mob.css" media="screen, projection" />';
print '<link rel="stylesheet" type="text/css" href="/includes/ouice/3/mobile.css" media="screen, projection" />';
?>
<!-- OUICE -->
<link rel="stylesheet" type="text/css" href="/includes/headers-footers/ou-header.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="/includes/ouice/3/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="/includes/ouice/3/print.css" media="print" />
<!-- <link href="/includes/headers-footers/header-public-centre-gradient.css" rel="stylesheet" type="text/css" media="all" /> -->
<!--[if lt IE 9]>
  <link rel="stylesheet" type="text/css" href="/includes/ouice/3/ie.css" />
<![endif]-->
<!--[if lt IE 7]>
  <link rel="stylesheet" type="text/css" href="/includes/ouice/3/ie6.css" />
<![endif]-->
<!--[if IE 8]>
  <link href="<?php print $base_url . '/' . $path_to_base_theme; ?>/styles/style_ie8.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 7]>
  <link href="<?php print $base_url . '/' . $path_to_base_theme; ?>/styles/style_ie7.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->
<!--[if IE 6]>
  <link href="<?php print $base_url . '/' . $path_to_base_theme; ?>/styles/style_ie6.css" rel="stylesheet" type="text/css" media="screen" />
<![endif]-->

<meta name="viewport" content="width=device-width; initial-scale=1" />
<?php if(isset($_REQUEST['OUMOBILE'])){
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/includes/headers-footers/ou-header-mob.css\">";
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"/includes/ouice/3/mobile.css\">";
}
?>
<link rel="stylesheet" type="text/css" href="/includes/ouice/3/mobile.css" media="only screen and (max-device-width:640px)" />
<link rel="stylesheet" type="text/css" href="/includes/ouice/3/mobile.css" media="only screen and (max-width:640px)" />
<link rel="stylesheet" type="text/css" href="/includes/headers-footers/ou-header-mob.css" media="only screen and (max-device-width:640px)" />
<link rel="stylesheet" type="text/css" href="/includes/headers-footers/ou-header-mob.css" media="only screen and (max-width:640px)" />
<script type="text/javascript" src="/includes/headers-footers/ou-header.js"></script>