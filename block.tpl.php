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
<!-- start block.tpl.php <?php print $block->module . '-' . $block->delta; ?> -->
<?php
if ($block->module == 'menu' || $block->module == 'user' || $block->module == 'menu_block') {		
	
	print '<div class="'.phptemplate_get_nav_type().'">';
	if ((phptemplate_get_nav_type() != 'ou-full-nav') && ($block->module == 'menu_block')) {
		$_active_primary_trail = menu_get_active_trail();
		print '<h2>'.$_active_primary_trail['1']['link_title'].'</h2>';		
	}
	else {
		print '<h2>'.$block->subject.'</h2>';
	}
  print $content;
	print '</div>';
}
else {
    //print_r($block->module);
    if($block->module == 'views' && $block->delta == 'faculties-block') {
		  print '<div class="block">';
		  include('edit-block.tpl.php');
      if ($block->subject) {
			  print '<h2>'.$block->subject.'</h2>';
		  }
		  print '<div class="content">' . $content . '</div>';
      print '</div>';
    }
    elseif($block->module == 'views' && $block->delta == 'carousel-block') {
		  print '<div class="block">';
		  include('edit-block.tpl.php');
      if ($block->subject) {
  			print '<h2>'.$block->subject.'</h2>';
  		}
  		print '<div class="content">' . $content . '</div>';
      print '</div>';
    }
    elseif($block->module == 'views' && $block->delta == 'editorial_spotlight-block') {
		  print '<div class="block editorial-spotlight">';
		  include('edit-block.tpl.php');
      if ($block->subject) {
  			print '<h2>'.$block->subject.'</h2>';
  		}
		  print '<div class="content">' . $content . '</div>';
      print '</div>';
    }elseif($block->module == 'views' && $block->delta == 'homepage-block') {
  		  print '<div class="block">';
  		  include('edit-block.tpl.php');
        if ($block->subject) {
    			print '<h2>'.$block->subject.'</h2>';
    		}
  		  print '<div class="content">' . $content . '</div>';
        print '</div>';
      }
    else {
		  switch ($block->module) {
			case "views":
				print '<div class="block ou-box">';
				include('edit-block.tpl.php');
	      if ($block->subject) {
					print '<h2>'.$block->subject.'</h2>';
				}
				print '<div class="content">' . $content . '</div>';
	      print '</div>';
	    break;
	    case "oubrand":
				include('edit-block.tpl.php');
			 	print $content;
	    break;
			case "easy_breadcrumb":
				include('edit-block.tpl.php');
				print $content;
		  break;
	    default:
	      include('edit-block.tpl.php');
				if ($block->subject) {
					print '<h2>'.$block->subject.'</h2>';
				}
	      print '<div class="content">' . (module_exists('oubrand') ? oubrand_replace_ou_tokens($content, $content) : $content) . '</div>';
	    break;
    };
  }
};
?>
<!-- /end block.tpl.php -->