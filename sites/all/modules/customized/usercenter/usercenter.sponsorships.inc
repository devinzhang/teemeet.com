<?php

/* function for sponsor related 
** here you must configue a new cck content type named 'sponsor'
* we will load the sponsor create form.
*/

function usercenter_sponsorships_page(){
    $output = '';
    drupal_add_css(drupal_get_path('module','usercenter').'/css/sponsorship.css');
    
    global $user; 
    
    drupal_set_title(t('Sponsor local Meetup Groups'));
    $promote_sponsors = array();
    $my_sponsor = node_load(array('uid'=>$user->uid, 'type'=>'sponsor'));
    $output .= theme('usercenter_sponsorship_landing', $promote_sponsors, $my_sponsor);
    
    
    return $output; 
}

/*menu call back */
function usercenter_create_sponsor(){
    drupal_set_title(t('Offer a Meetup Perk'));
    drupal_add_css(drupal_get_path('module','usercenter').'/css/sponsorship.css');
    global $user; 
    $output = '';
    $output .= _usercenter_output_step_indicator(1);
    
    $output .= '<div class="D_form " style="">';
        if(!$user->uid){
        $output .= t('<p style="padding: 8px 12px; font-size: 12px; margin-bottom: 0pt; background: none repeat scroll 0% 0% rgb(237, 245, 254);">
            '.t('Already have an account?').'<a class="J_loginLink J_onClick" href="'.url('user/login').'/">Login</a>
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

function usercenter_form_alter(&$form, $form_state, $form_id)
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

 /* impl , hook_nodeapi 
 **  After the user create a sponsor node,  if the user is anomyous , then create a new user firstly, then 
 **  change the node author before save to the db
 **
 */
function usercenter_nodeapi(&$node, $op, $teaser, $page) 
{
    if($node->type == 'sponsor') {
        switch( $op ) {
            case 'presave':
            
                if($node->uid <1) {
                    
                    // 检查用户名是否存在，若存在，则选择一个新的用户名。
                    $new_name = $node->user_name;
                    $i = 1;
                    while ($uid = db_result(db_query("SELECT uid FROM {users} WHERE name = '%s'", $new_name))) {
                        $new_name = $node->user_name.'_'.$i;
                        ++$i;
                    }

            
                    $newUser = array(
                        'name' => $new_name,
                        'pass' => $node->user_pass, // note: do not md5 the password
                        'mail' => $node->user_mail,
                    
                        'status' => 1,   		
                        );
                        
                    $user=user_save(null, $newUser);
                    if($user->uid > 0){
                    $node->uid = $user->uid; 
                    $node->name = $new_name;
                    } else {
                    exit;
                    }
                }
            break;
    
            case 'validate':
             //   if($node->uid <1) {                    
             //      drupal_set_message($node->user_mail . $node->user_name. $node->user_pass . 'data');         
             //   }    
            break;
            
            case 'insert':
                    if($node->uid > 0) { //if the user have already been a member, then just need to add the 'sponsor' role and create a new node for her/him
                    $user= user_load($uid);
                    $myuserroles = $user->roles; 
                    $roles = user_roles(TRUE);
                    foreach ($roles as $rid => $name){
                            if($name =='sponsor'){
                            $myuserroles[$rid] = $name; 
                    }
                    }
                    user_save($user, array('roles' => $myuserroles)); 
                }
            break;
        
        } 
    }    
}


/*menu callback to creat a perk 
**
**
*/
function usercenter_create_perk(){
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

function _usercenter_output_step_indicator($step) {
    $output = '';
    $output .= '<ul id="perks-breadcrumb">'; // output the step
    $step_class = array('','','','');
    $step_class[$step-1] = 'D_selectedStep';
    $output .= '<li class="D_step '.$step_class[0].'"><span class="step-num">1</span> Register</li>';
    $output .= '<li class="D_step '.$step_class[1].'"><span class="step-num">2</span> Create your Perk</li>';
    $output .= '<li class="D_step '.$step_class[2].'"><span class="step-num">3</span> Add payment info</li>';
    $output .= '<li class="D_step '.$step_class[3].'"><span class="step-num">4</span> Manage your Perk</li>';
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