<?php

/* function for sponsor related 
** here you must configue a new cck content type named 'sponsor'
* we will load the sponsor create form.
*/

function sponsor_sponsorships_page(){
    $output = '';
    drupal_add_css(drupal_get_path('module','sponsor').'/css/sponsorship.css');
    
    global $user; 
    
    drupal_set_title(t('Sponsor local Meetup Groups'));
    $promote_sponsors = array();
    $my_sponsor = node_load(array('uid'=>$user->uid, 'type'=>'sponsor'));
    $output .= theme('sponsor_sponsorship_landing', $promote_sponsors, $my_sponsor);
    
    
    return $output; 
}

/*menu call back */
function sponsor_create_sponsor(){
    drupal_set_title(t('Offer a Meetup Perk'));
    drupal_add_css(drupal_get_path('module','sponsor').'/css/sponsorship.css');
    global $user; 
    $output = '';
    $output .= _sponsor_output_step_indicator(1);
    
    $output .= '<div class="D_form " style="">';
        if(!$user->uid){
        $output .= t('<p style="padding: 8px 12px; font-size: 12px; margin-bottom: 0pt; background: none repeat scroll 0% 0% rgb(237, 245, 254);">
            '.t('Already have an account?').'<a class="J_loginLink J_onClick" href="'.url('user/login').'/">' . t('Login') . '</a>
            </p>');
        }
    
    module_load_include('inc', 'node', 'node.pages');  
    $form_state = array();   
    $nodeType = 'sponsor';
    // create a string of the $form_id
    $form_id = $nodeType . '_node_form';
    // create a basic $node array
    $node = array('type' => $nodeType, 'uid' => $GLOBALS['user']->uid, 'name' => $GLOBALS['user']->name);
    $output .= drupal_get_form($form_id, $node);

   
    $output .= '</div>';


    
    return $output;
}

/* here we hook the _form_alter to add new fields */

function sponsor_form_alter(&$form, $form_state, $form_id)
{   
    
    if($form_id == 'sponsor_node_form') {
        global $user; 
            
       
        if(!$user->uid){
        $form['user_mail'] = array('#type' => 'textfield',
            '#title' => t('Your E-mail'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => TRUE,
            '#weight' => -12,
        );
        
        $form['user_pass'] = array(
            '#type' => 'password', 
            '#title' => t('Create a password'), 
            '#maxlength' => EMAIL_MAX_LENGTH, 
            '#weight' => -11,
        );
        $form['user_name'] = array('#type' => 'textfield',
            '#title' => t('Your Name'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => TRUE,
            '#weight' => -10,
        );
    }
   
   
    }
 
 }


/*menu callback to creat a perk 
**
**
*/
function sponsor_create_perk(){
    drupal_set_title(t('Offer a Meetup Perk'));
    drupal_add_css(drupal_get_path('module','usercenter').'/css/sponsorship.css');
    global $user; 
    $output = '';
    $output .= _usercenter_output_step_indicator(2);
    
    
    module_load_include('inc', 'node', 'node.pages');  
    $form_state = array();   
    $nodeType = 'perk';
    // create a string of the $form_id
    $form_id = $nodeType . '_node_form';
    // create a basic $node array
    $node = array('type' => $nodeType, 'uid' => $GLOBALS['user']->uid, 'name' => $GLOBALS['user']->name);
    $output .= drupal_get_form($form_id, $node);
   $output .= '</div>';


    
    return $output;
}

function _sponsor_output_step_indicator($step) {
    $output = '';
    $output .= '<ul id="perks-breadcrumb">'; // output the step
    $step_class = array('','','','');
    $step_class[$step-1] = 'D_selectedStep';
    $output .= '<li class="D_step '.$step_class[0].'"><span class="step-num">1</span> ' . t('Register') . '</li>';
    $output .= '<li class="D_step '.$step_class[1].'"><span class="step-num">2</span> ' . t('Create your Perk') . '</li>';
    $output .= '<li class="D_step '.$step_class[2].'"><span class="step-num">3</span> ' . t('Add payment info') . '</li>';
    $output .= '<li class="D_step '.$step_class[3].'"><span class="step-num">4</span> ' . t('Manage your Perk') . '</li>';
    $output .= '</ul>';
    
    return $output; 
}

/* create sponsor form */
function usercenter_sponsor_create_form(&$form_state, $uid) {
    $form = array();
    
    if(!$uid){
        $form['mail'] = array('#type' => 'textfield',
            '#title' => t('Your E-mail'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => TRUE,
        );
        
        $form['pass'] = array(
            '#type' => 'password', 
            '#title' => t('Create a password'), 
            '#maxlength' => EMAIL_MAX_LENGTH, 
        );
        $form['name'] = array('#type' => 'textfield',
            '#title' => t('Your Name'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => TRUE,
        );
    }
   
	$form['business'] = array('#type' => 'textfield',
            '#title' => t('Your business or organization'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => TRUE,
			);    
  
  $form['street'] = array('#type' => 'textfield',
            '#title' => t('Street'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => FALSE,
  );
   addresses_user_form_user_profile_form_alter($form, $form_state, TRUE);
   $form['phone'] = array('#type' => 'textfield',
            '#title' => t('Phone'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => FALSE,
  );
   
$form['website'] = array('#type' => 'textfield',
            '#title' => t('Website'),
            '#default_value' =>'',
            '#maxlength' => EMAIL_MAX_LENGTH,   
            '#required' => FALSE,
  );
 
 $form['image'] = array(
    '#type' => 'image_upload_element',
    '#title' => t('Photo or Logo'),
    '#description' => t('You can upload a .jpg, .gif, or .png file. File size limit is 10 MB.For best results make your photo 120 x 90.'),
    '#default_value' => '', // {files} object
    '#image_preview_size' => '200x200',
    '#file_validators' => array(         
          'file_validate_extensions' => array('txt gif jpg jpeg'),
        ),
  );
  
$form['uid'] = array('#type' => 'hidden', '#value' => $uid);

 
 $form['submit'] = array('#type' => 'submit', '#value' => t('Register'));

   
    return $form; 
}

function usercenter_sponsor_create_form_validate($form, &$form_state) {
/*if ( $form_state['values']['mail'] == '')
{
form_set_error('mail', t('Email must be valid format if entered.'));

}
*/
}

function usercenter_sponsor_create_form_submit($form, &$form_state) {
    $values = $form_state['values'];
    $uid= $form_state['values']['uid'];
    if($uid > 0) { //if the user have already been a member, then just need to add the 'sponsor' role and create a new node for her/him
        $user= user_load($uid);
        $myuserroles = $user->roles; 
        
        $roles = user_roles(TRUE);
        foreach ($roles as $rid => $name){
            if($name =='sponsor'){
            $myuserroles[$rid] = $name; 
            }
        }
    
    
    user_save($user, array('roles' => $myuserroles)); 

    }else{
    
    }
}

/* menu callback */
function sponsor_find_group(){
    $output = '';
    
    $query = 'select nid from {node} where type="'.GROUP_NODE_TYPE.'" and status=1 order by created DESC';
    $query_count = 'SELECT COUNT(*) from {node} where type="'.GROUP_NODE_TYPE.'" and status=1 ';
    $groups_per_page = 10;
    
    $output .='<div id="groupListContainer" class="D_groupList_large">';
    $output .='<ul class="D_summaryList">';
     $result = pager_query($query, $groups_per_page, 0, $query_count);
     $i = 1; 
     while ($gid = db_fetch_object($result)) {
        $group = node_load($gid->nid);
        
        $output .= '<li class="D_group J_groupHover position_'.$i.' first">';
        $output .= _sponsor_output_group_teaser($group);
        $output .= '</li>';
        
        $i ++;
     }
     $output .='</ul>';
    $output .='</div>';
    return $output; 
}

function _sponsor_output_group_teaser($group){
    $output = '';
   
    $group_path = url($group->path); 
    $group_member = $group->og_member_count;
    $group_title = $group->field_site_title[0]['value']; 
    global $user; 
  //  print_r($user); 
  //  if(in_array($group->nid, array_values($user->sponsorgroups)))
    $status = db_result(db_query('select status from {'.SPONSORSHIPS_TABLE.'} where uid=%d and gid=%d', $user->uid, $group->nid));
    if(!$status) { //if there is no sponsorships record, then mean didn't sponsor group
        $ask_sponsor = l(t('Sponsor this group'), 'sponsor/sponsorgroup/'.$group->nid);
    } else {
        switch($status){
            case SPONSORSHIPS_STATUS_EXPIRE :
             $ask_sponsor = l(t('You once Sponsored this group, re-sponsor again'), 'sponsor/sponsorgroup/'.$group->nid);
            break;
            case SPONSORSHIPS_STATUS_OK :
             $ask_sponsor = '<span>'.t('You have sponsored this group').'</span>';
            break;
            case SPONSORSHIPS_STATUS_PENDDING :
                $ask_sponsor = '<span>'.t('Your sponsor request is in progress').'</span>';
            break;
    
        }
    }
    
    
    $output.= <<<EOF
    <div style="font-size: 0.9em;" class="D_image">
		<a class="omnCamp omngj_sj6b" href="http://www.midatlantichiking.com/">
							<img data-src="http://photos3.meetupstatic.com/photos/event/7/6/8/f/global_22170351.jpeg" src="http://photos3.meetupstatic.com/photos/event/7/6/8/f/global_22170351.jpeg" alt="" style="display: block;">
        </a>
		<div style="margin-top: 0.5em;" class="D_distance">
            <strong>14 miles away</strong> <span class="D_nobr">in Washington, DC</span>
        </div>		
		<div style="margin-top: 0.5em;" class="D_members">
		<strong>$group_member</strong>
            mebers in this group			
		</div>
	</div>
    <div class="D_info">
        <div style="width: auto; margin-right: 18.4em;" class="D_name J_help">
			<a class="omnCamp omngj_sj6b" href=" $group_path"> $group_title</a>
		</div>
        <div style="width: 22em;" class="D_secondary">
        $ask_sponsor
        </div>
        <div style="margin-right: 23em;" class="D_primary">
            <div class="D_description J_help">
                description
            </div>
        </div>
        
        
    </div>
EOF;
    return $output; 
}
/*menu callback
**
*/
function sponsor_ask_sponsor_the_group($gid){
    $output ='';
    $output .= drupal_get_form('sponsor_ask_sponsor_group_form', $gid);
    return $output;
}

function sponsor_ask_sponsor_group_form($form_state, $gid){
    $form['morewords'] = array(
      '#type' => 'textarea', 
      '#title' => t('What do you want to speak to the group orgnazor?'), 
      '#default_value' =>'',      
      '#required' => FALSE,
      
  );
  
  $form['gid'] = array(
      '#type' => 'hidden', 
      '#value' => $gid,
  );
  
 
  
  $form['submit'] = array(
    '#type' => 'submit',
    '#value' => t('Submit'),
    '#submit' => array('sponsor_ask_sponsor_group_form_submit'),
    '#weight' => 15,
);
return $form; 
}

function sponsor_ask_sponsor_group_form_submit($form, &$form_state) {
    global $user; 
    $gid = $form_state['values']['gid'];
    $message = $form_state['values']['morewords'];
    $sponsor_node_nid = db_result(db_query('select nid from {node} where uid=%d and type="sponsor"', $user->uid));
    $now = time(); 
	db_query("INSERT INTO {".SPONSORSHIPS_TABLE."} (uid, nid, message, gid, approver, status, created)
	 VALUES(%d, %d, '%s', %d, %d, %d, %d)", $user->uid, $sponsor_node_nid , $message, $gid, 0, SPONSORSHIPS_STATUS_PENDDING,  $now);    
    drupal_set_message(t('Your message have been sent to the group organizor.'));
    drupal_goto('sponsor/findgroup');
}

/*menu callback
** @param, $sid, the sponsorship id
** [field_sponsor_list] => Array
        (
            [0] => Array
                (
                    [nid] => 166
                    [safe] => Array
                        (
                            [nid] => 166
                            [title] => devin business technologies
                            [status] => 1
                        )

                )

        )
*/

/*menu callback
**
*/
function sponsor_sponsorship_list($gid){
	$output = '';
	$sponsor_list = sponsor_get_group_sponsors($gid);
	$sponsors = array();
	foreach($sponsor_list as $sponsor){
		$sponsor_node = node_load($sponsor['nid']); 
		$sponsors[] = array(
			'sid'=>$sponsor['sid'],
			'name'=>$sponsor_node->title,
			'nid'=>$sponsor['nid'],
			);
	}
	$output .= theme('sponsor_sponsorship_list',$sponsors);
	return  $output;

}
function sponsor_approve_sponsor_the_group($sid){
    global $user; 
    db_query('update {'.SPONSORSHIPS_TABLE.'} set status=%d , approver=%d where sid=%d', SPONSORSHIPS_STATUS_OK, $user->uid, $sid);
    $dest = $_GET['destination'];
    $item = db_fetch_array(db_query('select * from {'.SPONSORSHIPS_TABLE.'} where sid=%d', $sid));
	$sponsor_node = node_load($item['nid']);
	$existing_group_node = node_load($item['gid'] );
	
	
    $existing_group_node->field_sponsor_list[]['nid'] =$item['nid'];
    
    $existing_group_node = node_submit($existing_group_node);
	content_presave($existing_group_node);
	node_save($existing_group_node);
	content_insert($existing_group_node);

    
    drupal_goto($dest);
    
}

function sponsor_remove_sponsor_the_group($sid){
    
    db_query('delete from {'.SPONSORSHIPS_TABLE.'}  where sid=%d',  $sid);
    
    
}
