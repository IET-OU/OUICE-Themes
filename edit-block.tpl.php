<?php
// $Id: edit-block.tpl.php,v 3.0 2011/05/19 09:00:00 laustin (07779 146104) $
?>
<!-- start edit-block.tpl.php -->
<?php
	if (
		(($block->module == "block") && (user_access('administer blocks'))) ||
		(($block->module == "views") && (user_access('administer views'))) ||
		(($block->module == "oubrand") && (user_access('administer oubrand')))
	):?>

	<div class="administer-block-links administer-block-hide">
		<a href="<?php print check_url(base_path()) ?>admin/build/block/configure/<?php print $block->module;?>/<?php print $block->delta;?>">Edit this block</a>
	</div>
<?php endif; ?>
<!-- /end edit-block.tpl.php -->