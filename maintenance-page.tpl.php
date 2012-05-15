<?php
// $Id: page.tpl.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
/**
 * @file
 * page-front.tpl.php default front page layout
 * Draft drupal 6 theme linking OU webstandards, OUICE and Headscape work
 * written by Lee Austin - +44 (0)7779 146104 & Paul Conolly - +44 01634 813182
 * 	
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-GB" xml:lang="en-GB">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php  print $head_title; ?></title>
    <?php  // get the common header elements (This can be called by all page templates)
        include('includes/header.php');
    ?>
    <?php print $head ?>
</head>
<body class="hstheme colouredIntro soft rounded" >
<div id="ou">
    <?php  // INCLUDE THE OU HEADER
        include('header-centre-09.html');
    ?>
    <?php if ($siteheaderbanner): ?>
        <div id="site">
    <?php else: ?>
        <div id="site" class="nobanner">
    <?php endif; ?>
        <div id="site-header">
            <?php if ($siteheaderbanner): ?>
                <div class="site-header-banner">
                <div id="intro">			
                    <div class="grid" id="intro01">
                        <?php print $siteheaderbanner; ?>
                    </div>
                </div>
                </div>
            <?php endif; ?>
            <?php if(isset($primary_links)):
                print phptemplate_primarylinks($primary_links, array('class' => 'sections'));
            endif; ?>
            <?php if (isset($secondary_links)) :
                print theme('links', $secondary_links, array('class' => 'links secondary-links'));
            endif; ?>
        </div>
        <div id="site-body">
            <div id="page">
                <!-- Start of region 0 -->
                <?php if ($region0): ?>
                    <?php print $region0; ?>
                <?php endif; ?>
                <!-- End of region 0 -->
                <!-- Start of region 1 -->
                    <div id="region1" style="float: left">
                        <?php if ($help): ?>
                          <?php print $help; ?>
                        <?php endif; ?>
                        <div id="search_box">
                            <?php print $search_box;?>
                        </div>
                        <?php print $feed_icons ?>
                            <?php if ($breadcrumb): ?>
                                <?php print $breadcrumb; ?>
                            <?php endif; ?>
                            <?php if ($tabs): print '<div id="tabs-wrapper" class="clear-block">'; endif; ?>
                            <?php if ($title): print '<h1'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h1>'; endif; ?>
                            <?php if ($tabs): print '<ul class="tabs primary">'. $tabs .'</ul></div>'; endif; ?>
                            <?php if ($tabs2): print '<ul class="tabs secondary">'. $tabs2 .'</ul>'; endif; ?>
                            <?php if ($show_messages && $messages): print $messages; endif;
							 print $content;
							
							 print ($region1 ? $region1 : "");
							 ?>
                    </div>
                <!-- End of region 1 -->
                <!-- Start of region 2 -->
                <?php if ($region2): ?>
                <div id="region2" style="float: right">
                    <?php print $region2; ?>
                </div>
                <?php endif; ?>
                <!-- End of region 2 -->
                <!-- Start of region 3 -->
                <?php if ($region3): ?>
                    <div id="region3">
                        <?php print $region3; ?>
                    </div>
                <?php endif; ?>
                <!-- End of region 3 -->
            </div>
        </div>
        <div id="site-footer" class="clear">
            <?php if ($footer): ?>
                <?php print $footer; ?>
            <?php endif; ?>
            <?php if ($footer_message): ?>
                <?php print $footer_message; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php
            include('footer-09.html');  //	Get the page footer and common OU elements
            if ($closure):
                print $closure;
            endif;
            // get the page footer and common OU elememnts
        ?>
</div>
<?php  // get the common header elements (This can be called by all page templates)
        include('includes/footer.php');
    ?>
</body>
</html>