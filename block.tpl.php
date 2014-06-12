<?php
/**
 * @file
 * The theme system, which controls the output of Drupal.
 *
 * The theme system allows for nearly all output of the Drupal system to be
 * customized by user themes.
 */
// $Id: block.tpl.php,v 3.0 2012/06/29 09:00:00 laustin $
//print_r($block->module);
//print_r($block->delta);
//print_r(phptemplate_get_nav_type());
?>
<!-- start block.tpl.php -->
<?php 
//print '<div class="ou-box">';
include('edit-block.tpl.php');
if ($block->subject){
	print '<h2>'.$block->subject.'</h2>';
}
print '<div class="content">';
print $content;
print '</div>';
//print '</div>';
?>
<!-- end block.tpl.php -->
