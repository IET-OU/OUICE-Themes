<?php

print '<div class="'.phptemplate_get_nav_type().'">';

if (phptemplate_get_nav_type() != 'ou-full-nav') {
  $_active_primary_trail = menu_get_active_trail();
  print '<h2>'.$_active_primary_trail['1']['link_title'].'</h2>';	
} else {
	print '<h2>'.$block->subject.'</h2>';
}

print $content;
print '</div>';
