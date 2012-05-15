<?php
// $Id: block.tpl.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
?>
<!-- start block.tpl.php -->
<?php if ($block->module == "menu" || $block->module == "user" ): ?>
    <div class="block <?php print phptemplate_get_nav_type(); ?>">
        <?php include('edit-block.tpl.php'); ?>
		<?php if ($block->subject && phptemplate_get_nav_type() != 'ou-full-nav') : ?>
        <h2><?php print $block->subject ?></h2>
        <?php endif; ?>
        <?php print $block->content ?>
    </div>
<?php else:
    //print_r($block->module);
    switch ($block->module) {
		case "views": ?>
            <div class="block ou-box">
				<?php include('edit-block.tpl.php'); ?>
                <?php if ($block->subject): ?>
                <h2><?php print $block->subject ?></h2>
                <?php endif; ?>
                <div class="content">
                <?php print $block->content ?>
                </div>
            </div>
		<?php break;
        case "oubrand": ?>
            <div class="block ou-box">
				<?php include('edit-block.tpl.php'); ?>
				<?php print $block->content ?>
			</div>
        <?php break;
        default : ?>
            <div class="block ou-box">
                <?php include('edit-block.tpl.php'); ?>
				<?php if ($block->subject): ?>
                <h2><?php print $block->subject ?></h2>
                <?php endif; ?>
                <div class="content">
                <?php print $block->content ?>
                </div>
            </div>
        <?php break;
    } ?>
<?php endif; ?>
<!-- /end block.tpl.php -->