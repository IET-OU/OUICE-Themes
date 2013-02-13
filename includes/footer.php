<?php
// $Id: footer.php,v 3.0 2012/06/29 09:00:00 laustin (07779 146104) $
/**
 * @file
 * footer.php
 * Javascript at bottom for performance (except OU header script - this must be at top)
 */
?>
<?php print $scripts; ?>
<script type="text/javascript" src="/includes/ouice/3/scripts.js"></script>
<script type="text/javascript" src="<?php print $base_url . '/' . path_to_theme(); ?>/scripts/plugin.js"></script>
<script type="text/javascript" src="<?php print $base_url . '/' . path_to_theme(); ?>/scripts/socialcount.js"></script>