<?php
// $Id: views-view-fields.tpl,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
  <ul class="ou-rssfeed ou-twitterfeed">
  <?php foreach ($rows as $id => $row): ?>
    <div class="<?php print $classes[$id]; ?>">
      <?php print $row; ?>
    </div>
  <?php endforeach; ?>
  </ul>
