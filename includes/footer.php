<?php
// $Id: template.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
/**
 * @file
 * footer.php
 * Javascript at bottom for performance (except OU header script - this must be at top)
 */
  $path_to_base_theme = drupal_get_path('theme','ou_exstdv3');
?>
<?php

if(!ereg('jquery.js', $scripts)) {
  print "<script type='text/javascript' src='" . $base_path . "misc/jquery.js'></script>";
  print "sdfsdf";
}
print "<script type='text/javascript' src='/includes/js/jquery-1.4.2.min.js'></script>";
print $scripts;
?>

<script type="text/javascript" src="http://wwwdev.open.ac.uk/includes/ouice/3/scripts.js"></script>
<script src="<?php print $base_path . $path_to_base_theme; ?>/scripts/ou-exstd-theme.js" type="text/javascript"></script>