<?php
// $Id: block.tpl.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
?>
<!-- start block-event.tpl.php -->
<div class="ou-box">
    <?php if ($block->subject): ?>
        <h2"><?php print $block->subject ?></h2>
    <?php endif; ?>
    <ul class="ou-news">
        <?php print $block->content ?>
    </ul>
</div>
<!-- //end block-event.tpl.php -->