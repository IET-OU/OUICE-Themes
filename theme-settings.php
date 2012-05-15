<?php
// $Id: theme-settings.php,v 3.0 2010/10/25 09:00:00 laustin and PConolly IPP $
function phptemplate_settings($saved_settings) {
  /*
   * The default values for the theme variables. Make sure $defaults exactly
   * matches the $defaults in the template.php file.
   */
  // we don't receive $key parameter like system_theme_settings()
  // so get it from path: 'admin/build/themes/settings/THEMENAME'
  $key = arg(4);
  if ($key == "global") { // undesirable side-effect of admin_menu.module
    $key = '';
  }
  $settings = theme_get_settings($key);
  // Set a default value
  $defaults = array(
    'header_choice' => 'ou-ia-about',
	'body_classes' => 'ou-sections',
	'nav_type' => 'fullnav',
  );
  $display_header_value = 'ou-ia-about';
  $display_nav_type_value = 'fullnav';
  
  // deduce which header/footer pair radio-button to select
  if ($settings['header_choice'] == 'ou-ia-about') {
      $display_header_value = 'ou-ia-about';
  }
  elseif (($settings['header_choice'] == 'ou-ia-study')) {
      $display_header_value = 'ou-ia-study';
  }
  elseif (($settings['header_choice'] == 'ou-ia-research')) {
      $display_header_value = 'ou-ia-research';
  }
  elseif (($settings['header_choice'] == 'ou-ia-community')) {
      $display_header_value = 'ou-ia-community';
  }
  elseif (($settings['header_choice'] == 'ou-ia-learning')) {
      $display_header_value = 'ou-ia-learning';
  }
  elseif (($settings['header_choice'] == 'legacy')) {
      $display_header_value = 'legacy';
  }
  elseif (($settings['header_choice'] == 'none')) {
      $display_header_value = 'none';
  }
  
  
  // deduce which nav type to select
  if ($settings['nav_type'] == 'fullnav') {
      $display_nav_type_value = 'fullnav';
  }
  elseif (($settings['nav_type'] == 'contextnav')) {
      $display_nav_type_value = 'contextnav';
  }
 
  // Create header and footer form, Forms API
  $form['header_choice'] = array(
    '#type' => 'radios',
    '#title' => t('Select OU header and footer pair to display'),
    '#default_value' => $display_header_value,
    '#options' => array(
    'ou-ia-about' => 'About header and footer',
    'ou-ia-study' => 'Study header and footer',
    'ou-ia-research' => 'Research header and footer',
    'ou-ia-community' => 'Community header and footer',
	'ou-ia-learning' => 'Learning header and footer',
	'legacy' => 'Legacy header and footer',
	'none' => 'no header and footer',
    ),
  );
  
  // Create body classes form, Forms API
  $form['body_classes'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Select which OUICE body classes to apply'),
	'#return_value' => $settings['body_classes'],
    '#default_value' => $settings['body_classes'],
    '#options' => array(
    'ou-connected' => 'Connected',
    'ou-sections' => 'Sections',
    'ou-pure' => 'Pure',
    'ou-three' => 'Three',
	'ou-panels' => 'Panel',
	'ou-subtle' => 'Subtle',
	'ou-unboxed' => 'Unboxed',
	'ou-altnav' => 'Altnav',
	'ou-neutral' => 'Neutral',
    ),
  );
  
  
   // Create menu type Forms API
  $form['nav_type'] = array(
    '#type' => 'radios',
    '#title' => t('Select OUICE menu type to display'),
    '#default_value' => $display_nav_type_value,
    '#options' => array(
    'fullnav' => 'OUICE full nav',
    'contextnav' => 'OUICE contexet nav',
    ),
  );
 
  // Merge the saved variables and their default values
  $settings = array_merge($defaults, $saved_settings);
 
  // Return the additional form widgets
  return $form;
}
?>