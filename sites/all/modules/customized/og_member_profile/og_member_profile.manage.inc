<?
/*
 ** This file handle the group manage function
 **
 */

 /*menu call back
  ** manage the profile questions
 **
 */
function og_member_profile_setting_member($gid){
    drupal_set_title(t('Your members'));
    $output = '';
     $output .='<div class="D_box">
                    <div class="D_boxbody">
                        <div class="D_boxhead">
                            <h1>'.t('Your members').'</h1>
                        </div>';
         $output .='<div class="D_boxsection ">';  
          $output .= drupal_get_form('og_member_profile_setting_member_form', $gid); 
         $output .='</div>';     
    $output .='</div>';     
   
   
    return $output;
}

function og_member_profile_setting_member_form(&$form_state, $gid) {
 $form=array();
 
 $questons = og_member_profile_get_questions($gid,TRUE);
 
 $form['member_profiles'] = array(
      '#type' => 'fieldset',
      '#title' => t('Member profiles'),
      '#weight' => 5,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
    $form['member_profiles']['pq'] = array(
      '#type' => 'markup', 
       '#prefix' => '<div><h3>'.t('Profile questions').'</h3>',       
      '#value' => t('When members join this Meetup Group, they\'ll be asked these questions. The answers will appear on their profile. You can have up to 5 profile questions. Learn more'),
      '#suffix' => '</div>',
      '#weight' => 6,
    );    
    
    $form['member_profiles']['q1'] = array(
      '#type' => 'textfield', 
      '#title' => t('Question #1'), 
      '#default_value' =>isset($questons[1]) ? $questons[1] : '',
      '#size' => 60, 
      '#maxlength' => 128, 
      '#required' => FALSE,
      '#weight' => 7,
    );
    
    $form['member_profiles']['q2'] = array(
      '#type' => 'textfield', 
      '#title' => t('Question #2'), 
        '#default_value' =>isset($questons[2]) ? $questons[2]:'',
      '#size' => 60, 
      '#maxlength' => 128, 
      '#required' => FALSE,
      '#weight' => 8,
    );
    $form['member_profiles']['q3'] = array(
      '#type' => 'textfield', 
      '#title' => t('Question #3'), 
        '#default_value' =>isset($questons[3]) ? $questons[3]:'',
      '#size' => 60, 
      '#maxlength' => 128, 
      '#required' => FALSE,
      '#weight' => 9,
    );
    $form['member_profiles']['q4'] = array(
      '#type' => 'textfield', 
      '#title' => t('Question #4'), 
       '#default_value' =>isset($questons[4]) ? $questons[4]:'',
      '#size' => 60, 
      '#maxlength' => 128, 
      '#required' => FALSE,
      '#weight' => 10,
    );
    $form['member_profiles']['q5'] = array(
      '#type' => 'textfield', 
      '#title' => t('Question #5'), 
        '#default_value' =>isset($questons[5]) ? $questons[5]:'',
      '#size' => 60, 
      '#maxlength' => 128, 
      '#required' => FALSE,
      '#weight' => 11,
    );

 $form['member_join'] = array(
      '#type' => 'fieldset',
      '#title' => t('How members join this group'),
      '#weight' => 20,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
     
  $form['member_join']['profile_requirement'] = array( 
        '#type' => 'checkboxes', 
        '#title' => t('Profile requirements for new members'), 
        '#default_value' =>array(
            variable_get('group_'.$gid.'_profile_requrement_introduction','introduction'),
            variable_get('group_'.$gid.'_profile_requrement_photo','photo'),
            variable_get('group_'.$gid.'_profile_requrement_question',0),
            ),
        '#options' => array(
            'introduction' => t('Introduction'), 
            'photo' => t('Photo'), 
            'question' => t('Profile questions'),            
            ),   
      '#description' => t('Require members to add the following before they can join this Meetup Group: Learn more.'),
    );
    
  $form['member_email'] = array(
      '#type' => 'fieldset',
      '#title' => t('New member emails'),
      '#weight' => 30,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
    );
  
    $email_body = db_result(db_query("select message from {og_member_profile_email} where gid=%d", $gid));
    $form['member_email']['email_body'] = array(
      '#type' => 'textarea', 
      '#title' => t('Welcome message to new members'), 
      '#default_value' =>$email_body, 
      '#required' => false,
       '#description' => t('New members receive an automatic email confirmation when they join this Meetup. You can add your own message to introduce yourself and encourage new members to RSVP for your next Meetup or fill out their profile.'),
    );
      

  $form['gid'] = array(
    '#type' => 'hidden',
    '#value' => $gid

  );

 

$form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
    '#weight' => 40,
);

  return $form;
}

function og_member_profile_setting_member_form_submit($form, &$form_state) {
    $value = $form_state['values'];
    $gid = $value['gid']; 
    
    for($j=1;$j< 6;$j ++) {
        $field = 'q'.$j;
        if($value[$field] != '') { // if not empty, then insert it into the db
            $exist = db_result(db_query("select gid from {og_member_profile_question} where gid=%d and weight=%d",$gid,$j));
            if($exist) {//update
                db_query("update {og_member_profile_question} set title='%s' where gid=%d and weight=%d",$value[$field] , $gid,$j);
            } else {
                db_query("INSERT INTO {og_member_profile_question} (gid, title, weight) VALUES (%d, '%s', %d)", $gid,$value[$field],$j);
            }        
        }
    }
   
    variable_set('group_'.$gid.'_profile_requrement_introduction',$value['profile_requirement']['introduction']);
    variable_set('group_'.$gid.'_profile_requrement_photo',$value['profile_requirement']['photo']);
    variable_set('group_'.$gid.'_profile_requrement_question',$value['profile_requirement']['question']);
	
	// 邮件
	$exist = db_result(db_query("select gid from {og_member_profile_email} where gid=%d", $gid));
	if($exist) {//update
		db_query("update {og_member_profile_email} set message ='%s' where gid = %d", $value['email_body'] , $gid);
	} else {
		db_query("INSERT INTO {og_member_profile_email} (gid, message) VALUES (%d, '%s')", $gid ,$value['email_body']);
	}   
	
	$group_alias = drupal_get_path_alias('node/' . $gid);
	drupal_goto($group_alias . '/grouptool/' . $gid . '/manage/settings/members');
}


/*menu callback to edit the group profile 
** @param ,$uid, the account uid
** @param , $gid, the group nid; 
**
*/
function og_member_profile_edit($uid, $gid){
    $output = '';
    $output .= drupal_get_form('og_member_profile_edit_form',$uid, $gid); 
    return $output; 
}

function og_member_profile_edit_form(&$form_state, $uid, $gid) {
  $form=array();
  $answers = og_member_profile_get_answers($gid, $uid);
  $profile = og_member_profile_get_profile($gid, $uid);
  
  $form['introduce'] = array(
      '#type' => 'fieldset',
      '#title' => t('Introduce yourself'),
      '#weight' => 5,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );
  $form['introduce']['request'] = array(
            '#type' => 'textarea', 
            '#title' => t('Introduction'), 
            '#default_value' => $profile->introduction,
            '#required' => false,           
  ); 
  $form['introduce']['image'] = array(
            '#type' => 'image_upload_element',
            '#title' => t('Add profile photo'),
            '#description' => _profile_form_explanation($field),
            '#default_value' => '', // {files} object
            '#image_preview_size' => '200x200',
            '#file_validators' => array(         
                  'file_validate_extensions' => array('txt gif jpg jpeg'),
                ),
  );
  /* questions */
   $request_questons = variable_get('group_'.$gid.'_profile_requrement_question',0);
     if($request_questons){       
        $questons = og_member_profile_get_questions($gid);       
        if(!empty($questons)){
            $form['questions'] = array(
              '#type' => 'fieldset',
              '#title' => t('Profile questions'),
              '#weight' => 7,
              '#collapsible' => TRUE,
              '#collapsed' => FALSE,
            );
    
    
            foreach($questons as $qid=>$question ){
            $form['questions']['field_question_'.$qid] = array(
              '#type' => 'textfield', 
              '#title' => $question->title, 
              '#default_value' =>$answers[$qid]->answer,
              '#size' => 60, 
              '#maxlength' => 128, 
              '#required' => true,
              '#weight' => $question->weight,
            );
            }
        }        
     }
     
  /*extra */
   $form['extras'] = array(
      '#type' => 'fieldset',
      '#title' => t('Extras'),
      '#weight' => 10,
      '#collapsible' => TRUE,
      '#collapsed' => FALSE,
  );
   $form['extras']['website'] = array(
      '#type' => 'markup', 
       '#prefix' => '<div><h3>'.t('Your website').'</h3>',   
     
      '#suffix' => '</div>',
      '#weight' => 6,
    );    
    
   $form['extras']['websiteurl'] = array(
              '#type' => 'textfield', 
              '#title' => t('URL'), 
              '#default_value' =>$profile->websiteurl,
              '#size' => 60, 
              '#maxlength' => 128, 
              '#required' => false,
              '#weight' => 8,
          );
    $form['extras']['websitename'] = array(
              '#type' => 'textfield', 
              '#title' => t('Website name'), 
              '#default_value' =>$profile->websitename,
              '#size' => 60, 
              '#maxlength' => 128, 
              '#required' => false,
              '#weight' => 9,
          );
          
  $form['extras']['additional'] = array(
            '#type' => 'textarea', 
            '#title' => t('Additional Information'), 
            '#default_value' =>$profile->additional,
            '#required' => FALSE,    
            '#weight' => 10,            
  ); 
  
   
 /* follow */
 
 /* hidden data */
 $form['uid'] = array('#type' => 'hidden', '#value' => $uid);
 $form['gid'] = array('#type' => 'hidden', '#value' => $gid);
            
  /*submit */
  
$form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
    '#weight' => 40,
);
  return $form;     
}

function og_member_profile_edit_form_submit($form, &$form_state) {
    $values = $form_state['values'];
    $notifyme = $values['notifyme'];
    $introduce = $values['request'];
    $gid = $values['gid'];
    $uid = $values['uid'];
    
    db_query("update ".MEMBER_PROFILE_TBL." set introduction='%s',websiteurl='%s', websitename='%s', additional='%s' where gid=%d and uid=%d",
                $introduce,                 
                $values['websiteurl'],
                $values['websitename'],
                $values['additional'],
                $gid, 
                $uid           
                );
    
    /*insert the answer to the db */
     foreach($values as $key => $value){
        //field_question_2
        if(substr($key,0,15) == 'field_question_' ){
            list($a, $b, $qid) = explode('_', $key);            
            db_query("update ".MEMBER_PROFILE_ANSWERS_TBL." set answer='%s' where qid=%d and uid=%d",$value, $qid, $uid);
        }
    }
    
   drupal_set_message(t("Your profile has been updated"));

}

/*menu call back to update the user group title
** only the group organizor can assign a title to a member
*/
function og_member_profile_edit_title($uid, $gid) {
  // $q_nid = $_POST['element_id'];
   $q_title = $_POST['update_value'];
  db_query("update ".MEMBER_PROFILE_TBL." set membertitle='%s' where gid=%d and uid=%d",
                $q_title,
                $gid, 
                $uid           
                );
    
  
  echo $_POST['update_value'];
}

