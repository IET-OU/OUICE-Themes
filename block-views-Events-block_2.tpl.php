<?php
/**
 * @file
 * The theme system, which controls the output of Drupal.
 *
 * The theme system allows for nearly all output of the Drupal system to be
 * customized by user themes.
 */
// $Id: block.tpl.php,v 3.0 2012/06/29 09:00:00 laustin (07779 146104) $
?>
<!-- start block-event.tpl.php -->
<div class="ou-box">
    <?php if ($block->subject){
		print '<h2>'.$block->subject.'</h2>';
	}
	print '<ul class="ou-news">';
    print $block->content;
    print '</ul>';
	?>
</div>
<!-- //end block-event.tpl.php -->