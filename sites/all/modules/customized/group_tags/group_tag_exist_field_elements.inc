<?php
/* handle the new form type group tag



/**
 * Theme function to format the discrete version.
 *
 * We use the container-inline class so that all three of the HTML elements
 * are placed next to each other, rather than on separate lines.
 */
function theme_group_tag_exist_field($element) {
  // #children represents all the sublevels elements already rendered in HTML.
  // Here it contains the three parts of the 'phonenumber' element type ('areacode', 'prefix' and 'extension').
  
  return theme('form_element', $element, '<div class="tag-list">' . $element['#children'] . '</div>');
}


/**
 * Process callback for the interest_field.
 */
function group_tag_exist_field_process($element, $edit, &$form_state, $complete_form) {
  // #tree = TRUE means that the values in $form_state['values'] will be stored
  // hierarchically. In this case, the parts of the element will appear in
  // $form_state['values'] as
  // $form_state['values']['<element_name>']['brand'],
  // $form_state['values']['<element_name>']['questions'],
  // etc. This technique is preferred when an element has member form
  // elements.
  $element['#tree'] = TRUE;

  // Normal FAPI field definitions, except that #value is defined.
	
  $element['tag_name'] = array(
		'#type' => 'item', 
		'#title' => '', 		
		'#value' => $element['#value']['tag_name'],		
  );
  $element['tag_tid'] =  array(
   '#type' => 'hidden', 
	
    '#value' => $element['#value']['tag_tid'],
  );
  $element['tag_node_counter'] =  array(
    '#type' => 'hidden', 
	  
    '#value' => $element['#value']['tag_node_counter'],
  );

  return $element;
}

/**
 * Validation handler for the interest_cck.
 *


 *
 * Any problems are shown on the form element using form_error().
 */
function group_tag_exist_field_validate($element, &$form_state) {
  if (!isset($element['#value']['tag_name'])) {
    
      form_error($element['tag_name'], t('should not empty.'));
    
  }
  
  return $element;
}

