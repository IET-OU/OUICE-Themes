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
<?php 
$i = 1;
//print_r($fields); ?>

<?php foreach ($fields as $id => $field): ?>
  
  <?php
  $fname=$field->class;
  if ($fname == "nid" && empty($nid)){
    $nid=$field->content;
  }
  else {
    //print $fname; // uncomment this to show the field name.
    if ($fname == "field-image"){ ?>
      <li class="<?php print $i; ?>"> 
      <?php //print_r($row);
      if(!empty($row->field_data_field_link_node_entity_type)){
        // If CT is Caoursel_item then use field_link otherwise link to node
        // if($row->_field_data['nid']['entity']->type){
        //           if($row->_field_data['nid']['entity']->type == 'carousel_item') {
        //               //print '<a href="' . $row->field_field_link[0]['raw']['url'] . '">' . $field->content . '</a>';
        //               print $row->field_field_link[0]['raw']['url'];
        //             }
        //             else {
        //               //print_r($row->_field_data['nid']['entity']->type);
        //               //print 'here: ' . $row->_field_data->nid->entity['type']  . ':gfd';
        //               //print '<a href="' . $row->field_field_link[0]['raw']['url'] . '">' . $field->content . '</a>';
        //               //print $field->content;
        //             }
        //        }
        
        print $field->content;
        
      }
      else {
        print $field->content;
      };
    };?>
</li>
<?php 
};
$i = $i + 1;
endforeach; ?>