<?php

/**
 * @author devin.zhang, 1392137041@qq.com
 * @copyright 2011
 */
 
/* menu call back, group admin functions
** it's group tools menu 
** for send email, this function depend on mime email module , we don't use the simplenews module
*/

function groupextension_tools_send_messages($gid){
    $output = '';
    $output .='<div class="D_box">
                    <div class="D_boxbody">
                        <div class="D_boxhead">
                            <h1>'.t('Email members').'</h1>
                        </div>';
         $output .='<div class="D_boxsection ">';  
         $output .= drupal_get_form('_groupextension_tools_send_message_form', $gid);
         $output .='</div>';     
    $output .='</div>';     
    return $output;
}

function _groupextension_tools_send_message_form(&$form_state, $gid) {
 $form=array();  
 $select_options = array(
    t('All members of this Meetup Group'), 
    t('A custom list'),
    t('Members active within the last'),
    t('Members inactive for'),
    t('The Leadership Team'),
    t('Related to a specific Meetup event')
    
); 
global $user; 

$form['email_sender'] = array(
    '#prefix' => '<div class="label">'.t('From').'</div>', 
    '#value' => $user->name . '<span id="memberEmail" style="display: inline;">(<em>'.$user->mail.'</em>)</span>',
);
$form['email_sender_uid'] = array(
    '#type' => 'hidden', 
    '#value' => $user->uid,
    
  );
 

 $form['message_receiver'] = array(
  '#type' => 'radios',
  '#title' => t('Send this message to'),
  '#default_value' => 0,
  '#options' => $select_options,
  );
  
  $form['message_subject'] = array(
  '#type' => 'textfield',
  '#title' => t('Subject'),
  '#default_value' =>'' ,
  '#prefix' => '<div class="message-subject">',
  '#suffix' => '</div>',
  '#size' => 60,
  '#maxlength' => 128,
  '#required' => false,
);
 $form['message_body'] = array(
  '#type' => 'textarea', 
  '#title' => t('Message'), 
  '#default_value' => '', 
  '#required' => TRUE
);

$form['hidemyaddress'] = array(
  '#type' => 'checkbox', 
  '#title' => t('Hide my email address on this message'),
);

$form['posttoforum'] = array(
  '#type' => 'checkbox', 
  '#title' => t('Also post message on this Meetup Group\'s message board'),
);

  
 $form['gid'] = array(
    '#type' => 'hidden', 
    '#value' => $gid
    
  );
  
$form['message_submit'] = array(
    '#type' => 'submit', 
    '#value' => t('Submit'),
);

$form['message_preview'] = array(
    '#type' => 'submit', 
    '#value' => t('Preview'),
);

  return $form;
}


function _groupextension_tools_send_message_form_submit($form, &$form_state) {
    $values = $form_state['values'];
    $sender_uid = $values['email_sender_uid'];
    
    $sender =user_load($sender_uid);
    $subject = $values['message_subject'];
    $body = $values['message_body'];
    $plaintext=FALSE;
     
    $group = node_load($values['gid']); 
    $output ='';
    $members = array();
    $sql = og_list_users_sql(1, 0, NULL);
    $res = db_query($sql, $values['gid']);
    while ($row = db_fetch_object($res)) {        
            $recipient = user_load($row->uid);
            $result = mimemail($sender, $recipient, $subject, $body, $plaintext);           
    }    
    $form_state['redirect'] = $group->path;
}




function groupextension_tools_manage($gid){
    $output = '';
    $output .='manage';
return $output;
}


function groupextension_tools_money($gid){
    $output = '';
    $output .='Money';
return $output;
}


function groupextension_tools_checklist($gid){
    $output = '';
    $output .='cehck list';
return $output;
}
