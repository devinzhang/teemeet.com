<?php

function color_mine_background_settings_form(&$form, $settings)
{     
    $form['background_custom'] = array(
    '#type' => 'checkbox',
    '#title' => t('Check me to enable custom background image.'),    
    '#default_value' => $settings['background_custom']    
    );  
    
    $form['background_path'] = array(
    '#type' => 'textfield',
    '#title' => t('Path to background image'),
    '#default_value' => $settings['background_path'],
    '#description' => t('The path to the image file you would like to use as your custom background.'),
    '#default_value' => $settings['background_path']
    );
    
    $form['background_position'] = array(
    '#type' => 'select',
    '#title' => t('Position'),
    '#description' => t("Positioning of background image."),
    '#options' => array(
      '' => '< select >',
      'top left' => 'top left',
      'top center' => 'top center',
      'top right' => 'top right',
      'center left' => 'center left',
      'center center' => 'center center',
      'center right' => 'center right',
      'bottom left' => 'bottom left',
      'bottom center' => 'bottom center',
      'bottom right' => 'bottom right'),
      '#default_value' => $settings['background_position'],
    );
    
    $form['background_repeat'] = array(
    '#type' => 'select',
    '#title' => t('Repeat'),
    '#description' => t("Positioning of background image."),
    '#options' => array(
      '' => '< select >',
      'repeat' => 'repeat',
      'repeat-x' => 'repeat-x',
      'repeat-y' => 'repeat-y',
      'no-repeat' => 'no-repeat'),
      '#default_value' => $settings['background_repeat'],
    );
    
    $form['background_attachment'] = array(
    '#type' => 'select',
    '#title' => t('Attachment'),
    '#description' => t("Sets whether a background image is fixed or scrolls with the rest of the page."),
    '#options' => array(
      '' => '< select >',
      'fixed' => 'fixed',
      'scroll' => 'scroll'),
      '#default_value' => $settings['background_attachment'],
    );
    
    $form['background_upload'] = array(
    '#type' => 'file',
    '#title' => t('Upload background image'),
    '#description' => t("If you don't have direct file access to the server, use this field to upload your background.")
    );
}

function color_mine_palette_form(&$form, $form_state)
{  
  $form['color'] = array(
    '#type' => 'fieldset',
    '#title' => t('Color scheme'),
    '#weight' => -1,
    '#attributes' => array('id' => 'color_mine_scheme_form'),
    '#theme' => 'color_mine_scheme_form',
  );
  $form['color'] += color_mine_scheme_form($form_state);
}

function color_mine_scheme_form(&$form_state)
{
  $theme = variable_get('color_mine_themeid', '');
  $base = drupal_get_path('module', 'color_mine');
  $info = color_get_info($theme);
//print_r($info);die;
  // Add Farbtastic color picker
  drupal_add_css('misc/farbtastic/farbtastic.css', 'module', 'all', FALSE);
  drupal_add_js('misc/farbtastic/farbtastic.js');


  // Add custom CSS/JS
  drupal_add_css($base .'/color_mine.css', 'module', 'all', FALSE);
  drupal_add_js($base .'/color_mine.js');
  drupal_add_js(array('color' => array(
    'reference' => color_mine_get_palette()
  )), 'setting');

  // See if we're using a predefined scheme
  //$current = implode(',', variable_get('color_'. $theme .'_palette', array()));
  // Note: we use the original theme when the default scheme is chosen.
  //$current = isset($info['schemes'][$current]) ? $current : ($current == '' ? reset($info['schemes']) : '');
  //echo 'current';
//print_r($current);



  // Add scheme selector
  $info['schemes'][''] = t('Custom');
  $form['scheme'] = array(
    '#type' => 'select',
    '#title' => t('Color set'),
    '#options' => $info['schemes'],
    '#default_value' => $current,
  );

  // Add palette fields
  $palette = color_mine_get_palette();
  $names = array(
    'base' => t('Base color'),
    'link' => t('Link color'),
    'top' => t('Header top'),
    'bottom' => t('Header bottom'),
    'text' => t('Text color')
  );
  $form['palette']['#tree'] = true;
  foreach ($palette as $name => $value) {
    $form['palette'][$name] = array(
      '#type' => 'textfield',
      '#title' => $names[$name],
      '#default_value' => $value,
      '#size' => 8,
    );
  }
 // $form['theme'] = array('#type' => 'value', '#value' => $theme);
  $form['info'] = array('#type' => 'value', '#value' => $info);

  return $form;
}

function color_mine_get_palette() {
  // Fetch and expand default palette
  $fields = array('base', 'link', 'top', 'bottom', 'text');
  $settings = color_mine_settings();
  $palette = $settings['palette'];
  if(!$settings['palette'])
  {
    $info = color_get_info(variable_get('color_mine_themeid', 'garland'));
    $keys = array_keys($info['schemes']);
    foreach (explode(',', array_shift($keys)) as $k => $scheme) {
      $palette[$fields[$k]] = $scheme;
    }
  }  
  return $palette ;
}

function theme_color_mine_scheme_form($form) {
   //print_r($form);echo 'asdf';
  // Include stylesheet
  $theme = variable_get('color_mine_themeid', '');
  $info = $form['info']['#value'];
  $path = drupal_get_path('theme', $theme) .'/';
  drupal_add_css($path . $info['preview_css']);
  $output = '';
  // Wrapper
  $output .= '<div class="color-form clear-block">';

  // Color schemes
  $output .= drupal_render($form['scheme']);

  // Palette
  $output .= '<div id="palette" class="clear-block">';
  foreach (element_children($form['palette']) as $name) {
    $output .= drupal_render($form['palette'][$name]);
  }
  $output .= '</div>';

  // Preview
  $output .= drupal_render($form);
  $output .= '<h2>'. t('Preview') .'</h2>';
  $output .= '<div id="preview"><div id="text"><h2>Lorem ipsum dolor</h2><p>Sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud <a href="#">exercitation ullamco</a> laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p></div><div id="img" style="background-image: url('. base_path() . $path . $info['preview_image'] .')"></div></div>';

  // Close wrapper
  $output .= '</div>';

  return $output;
}

