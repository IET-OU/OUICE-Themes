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
<?php //print_r($fields); ?>

    <?php foreach ($fields as $id => $field): ?>
    <?php //print_r($field); ?>
    <?php
      $fname=$field->class;
		  if ($fname == "nid" && empty($nid)):
			    $nid=$field->content;
	    else:
        print $fname; // uncomment this to show the field name.
		?>
		<li> 
		<?php 
			if ($fname == "field-image-fid"):
				print '<a href="#">'.$field->content.'</a>';
			endif;
		
			if ($fname == "title"):
				
				if(!empty($row->node_data_field_link_field_link_url)){
					print '<a href="' . $row->node_data_field_link_field_link_url . '">' . $field->content . '</a>';
				} else {
					print $field->content;
				};
				//print '<a href="#">'.$field->content.'</a>';
			endif;
		?>
		</li>
	    <?php endif;
     endforeach; ?>
