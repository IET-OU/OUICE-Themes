<?php

print '<div class="block ou-box">';
include('edit-block.tpl.php');
if ($block->subject){
	print '<h2>'.$block->subject.'</h2>';
}
print '<div class="content">';
print $content;
print '</div>';
print '</div>';