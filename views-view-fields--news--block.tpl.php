<?php
// $Id: views-view-fields.tpl.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
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
 //print_r($row);
?>
<li>
  <?php foreach ($fields as $id => $field){
    
    $fname=$field->class;
    if ($fname == "nid" && empty($nid)){
      $nid=$field->content;
    }
    else {
      //print $fname; // uncomment this to show the field name.
      if ($fname == "title" ){
        print '<h3>' . $field->content . '</h3>';
      }
      if ($fname == "field-image" && !empty($field->content)){
        print $field->content;
      }
      if ($fname == "body" ){
        // $body = field_get_items('node', $node, 'body');
        //         $teaser = $body[0]['summary'];
        //         prnit '<p>' . $teaser . '</p>';
        print '<p>' . (module_exists('oubrand') ? oubrand_remove_ou_tokens($field->content) : $field->content) . '</p>';
      }
      // if ($fname == "field-link"){
      //   print '<p>' . $field->content . '</p>';
      // }
      // else {
      //   print '<p>' . $row->node_title . '</p>';
      // }
      
      //field-linktitle-1
      
      if ($fname == "created"){
        print '<p class="list-date">' . $field->content . '</p>';
      }
    }
  }?>
  <br class="clear" />
</li>
