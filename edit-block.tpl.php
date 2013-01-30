<?php
/**
 * @file
 * The theme system, which controls the output of Drupal.
 *
 * The theme system allows for nearly all output of the Drupal system to be
 * customized by user themes.
 */
// $Id: edit-block.tpl.php,v 3.1 2012/06/29 09:00:00 laustin (07779 146104) $
?>
<!-- start edit-block.tpl.php -->
<?php
	if (
		(($block->module == "block") && (user_access('administer blocks'))) ||
		(($block->module == "views") && (user_access('administer views'))) ||
		(($block->module == "oubrand") && (user_access('administer oubrand')))
	){
		print '<div class="administer-block-links administer-block-hide">';
		print '<a href="'.check_url(base_path()).'admin/structure/block/manage/'.$block->module.'/'.$block->delta.'">Edit this block</a>';
		print '</div>';
	}; ?>
<!-- /end edit-block.tpl.php -->