<?php
// $Id: theme-settings.php,v 3.1 2012/06/29 09:00:00 laustin (07779 146104) $
/**
 * @file
 * The theme system, which controls the output of Drupal.
 *
 * The theme system allows for nearly all output of the Drupal system to be
 * customized by user themes.
 */
function ou_ouice3_form_system_theme_settings_alter(&$form, &$form_state) {
  // OU ICE settings fieldset
  $form['ouice'] = array(
    '#type' => 'fieldset',
    '#title' => t('OU ICE Settings'),
  );

  // Create header and footer form, Forms API
  $form['ouice']['header_choice'] = array(
    '#type' => 'select',
    '#title' => t('Select OU header and footer pair to display'),
    '#default_value' => theme_get_setting('header_choice'),
    '#options' => array(
      // Standard OU ICE header selections
      'OU ICE' => array(
        'ou-ia-about' => 'About',
        'ou-ia-study' => 'Study',
        'ou-ia-research' => 'Research',
        'ou-ia-community' => 'Community',
        'ou-ia-learning' => 'Learning',
        '' => 'No IA',
      ),
      'Intranet' => array(
        'intranet' => 'Default',
      ),
      'legacy' => 'Legacy',
      'none' => 'None',
    ),
  );

  // Create body classes form, Forms API
  $form['ouice']['body_classes'] = array(
    '#type' => 'checkboxes',
    '#title' => t('Select which OUICE body classes to apply'),
    '#default_value' => theme_get_setting('body_classes'),
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

  // Create faculty classes form, Forms API
  $form['ouice']['faculty_classes'] = array(
    '#type' => 'radios',
    '#title' => t('Select OU faculty to customise'),
    '#default_value' => theme_get_setting('faculty_classes'),
    '#options' => array(
      'none' => 'no faculty style selected',
      'ou-arts' => 'Faculty of Arts',
      'ou-fels' => 'Faculty of Education & Language Studies (FELS)',
      'ou-hsc' => 'Faculty of Health & Social Care (HSC)',
      'ou-mct' => 'Faculty of Mathematics, Computing & Technology (MCT)',
      'ou-science' => 'Faculty of Science',
      'ou-ss' => 'Faculty of Social Sciences',
      'ou-iet' => 'Institute of Educational Technology (IET)',
      'ou-bs' => 'Open University Business School (OUBS)',
      'ou-law' => 'Law',
      'ou-kmi' => 'KMI',
      'ou-esteem' => 'Esteem',
      'ou-intranet' => 'Intranet',
    ),
  );

  // Create menu type Forms API
  $form['ouice']['nav_type'] = array(
    '#type' => 'radios',
    '#title' => t('Select OUICE menu type to display'),
    '#default_value' => theme_get_setting('nav_type'),
    '#options' => array(
      'ou-full-nav' => 'OUICE full navigation',
      'ou-context-nav' => 'OUICE context navigation',
    ),
  );
}
