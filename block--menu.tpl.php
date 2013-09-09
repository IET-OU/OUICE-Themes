<?php

print '<div class="'.phptemplate_get_nav_type().'">';
if($block->subject) {
	print '<h2>'.$block->subject.'</h2>';
}
print $content;
print '</div>';
