<?php

function color_mine_admin_form(&$form_state)
{
    $form['themeid'] = array
    (
        '#title' => 'Theme id',
        '#type' => 'textfield', //token
        '#default_value' => variable_get('color_mine_themeid', '')
    );
    
   /* $form['styleid'] = array
    (
        '#title' => 'Default path to save the style',
        '#type' => 'textfield', //token
        '#default_value' => variable_get('color_mine_styleid', '')
    );  */ 
     
    $form['submit'] = array
    (
        '#type' => 'submit',
        '#value' => t('Save')
    );
    
    return $form;
}

function color_mine_admin_form_submit($form, &$form_state)
{
    variable_set('color_mine_themeid', $form_state['values']['themeid']);
    variable_set('color_mine_styleid', $form_state['values']['styleid']);
    drupal_set_message(t('Setting saved.'));
}