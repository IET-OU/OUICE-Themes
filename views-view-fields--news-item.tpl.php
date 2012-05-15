<?php
// $Id: views-view-fields.tpl,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<li>
    <?php foreach ($fields as $id => $field): ?>
    <?php //print_r($field); ?>
    <?php
      $fname=$field->class;
	    if ($fname == "nid" && empty($nid)):
			    $nid=$field->content;
	    else:
      //print $fname; // uncomment this to show the field name.
        //print_r($fname);
        if ($fname == "title"):
	        print "<h3>". (module_exists('oubrand') ? oubrand_views_content($nid,$field->content) : $field->content) ."</h3>";
        endif;
        if ($fname == "field-image-fid" && !empty($field->content)):
	        print (module_exists('oubrand') ? oubrand_views_content($nid,$field->content) : $field->content);
        endif;
        if ($fname == "field-teaser-text-value"):
	        print '<p>' . (module_exists('oubrand') ? oubrand_views_content($nid,$field->content) : $field->content) . '</p>';
        endif;
      endif;
      endforeach; ?>
  <br class="clear" />
</li>
