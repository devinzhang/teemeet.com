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
    drupal_add_css(drupal_get_path('module','group_extensions').'/css/group_extensions_tools.css');
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

$form['form-prefix'] = array(    
    '#value' => '<div id="editMessage" class="D_form">', 
);


$form['email_sender-prefix'] = array(    
    '#value' => '<div class="element">', 
);

$form['email_sender'] = array(
    '#prefix' => '<div class="label">'.t('From').'</div>', 
    '#value' => $user->name . '<span id="memberEmail" style="display: inline;">(<em>'.$user->mail.'</em>)</span>',
);
$form['email_sender_uid'] = array(
    '#type' => 'hidden', 
    '#value' => $user->uid,
    
  );
$form['email_sender-suffix'] = array(    
    '#value' => '</div>', 
);
 

$form['message_receiver-prefix'] = array(    
    '#value' => '<div class="element">', 
);

 $form['message_receiver'] = array(
  '#type' => 'radios',
  '#title' => t('Send this message to'),
  '#default_value' => 0,
  '#options' => $select_options,
  );
$form['message_receiver-suffix'] = array(    
    '#value' => '</div>', 
);
  
  
$form['message_subject-prefix'] = array(    
    '#value' => '<div class="element">', 
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

$form['message_subject-suffix'] = array(    
    '#value' => '</div>', 
);

$form['message_body-prefix'] = array(    
    '#value' => '<div class="element">', 
);

 $form['message_body'] = array(
  '#type' => 'textarea', 
  '#title' => t('Message'), 
  '#default_value' => '', 
  '#required' => TRUE
);

$form['message_body-suffix'] = array(    
    '#value' => '</div>', 
);


$form['hidemyaddress'] = array(
  '#type' => 'checkbox', 
  '#prefix' => '<div class="element">',
  '#suffix' => '</div>', 
  '#title' => t('Hide my email address on this message'),
);

$form['posttoforum'] = array(
  '#type' => 'checkbox', 
  '#prefix' => '<div class="element">',
  '#suffix' => '</div>',
  '#title' => t('Also post message on this Meetup Group\'s message board'),
);

  
 $form['gid'] = array(
    '#type' => 'hidden', 
    '#value' => $gid
    
  );
  
$form['message_submit'] = array(
    '#type' => 'submit', 
    '#prefix' => '<div class="element">',
   
    '#value' => t('Submit'),
);

$form['message_preview'] = array(
    '#type' => 'submit', 
    '#suffix' => '</div>',
    '#value' => t('Preview'),
);
$form['form-suffix'] = array(    
    '#value' => '</div>', 
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
    switch($values['message_receiver']){
        case 0:
        break;
        case 1;
        break;

    }    
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
     $output .='<div class="D_box">
                    <div class="D_boxbody">
                        <div class="D_boxhead">
                            <h1>'.t('Group settings').'</h1>
                        </div>';
         $output .='<div class="D_boxsection ">';  
         $output .= _groupextension_tools_manage_output();
         $output .='</div>';     
    $output .='</div>';     
   
return $output;
}

function _groupextension_tools_manage_output(){
    $output='';
    $current_group = $GLOBALS['current_group'];
    $member_link = l(t('Your Memebers'),$current_group->path.'/grouptool/'.$current_group->nid.'/manage/settings/members');
    $theme_link = url($current_group->path.'/admin/build/themes/settings/fusion_teemeet');
    $output.= <<<EOF
   <h3>General info</h3>
<div class="D_boxcols divby3">
<div class="D_col first">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
						<div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/basic/">Basics</a></div>
						<ul class="D_bullet">
							<li>Meetup Group name</li>
							<li>Meetup Group headline</li>
							<li>Meetup Group description</li>
							<li>What are members called?</li>
							<li>Location</li>
							<li>Web address</li>
							<li>Adding Meetups <span class="D_new">New!</span></li>
							<li>Meetup Group photo</li>
						</ul>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
                    <div class="D_name">$member_link</div>
						<ul class="D_bullet">
							<li>Profile questions</li>
							<li>Membership to the group</li>
							<li>New Member Profile Requirements</li>
							<li>Welcome message to new members</li>
						</ul>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col last">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
						<div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/topics/">Topics</a></div>
						<p>Choose the right topics so the right people can find your Meetup Group.</p>
					</li>
				</ul>
			
	</div>
</div>		
</div>
<div class="D_boxcols divby3">
<div class="D_col first">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
                    <div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/privacy/">Privacy</a></div>
						<ul class="D_bullet">
							<li>Make Meetup Group pages private</li>
							
							<li>Who can create new Pages?</li>
						</ul>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
					<div class="D_name"><a href="$theme_link">Appearance</a></div>
						<ul class="D_bullet">
							<li>Personalize your group's colors and fonts</li>
							<li>Select from pre-made themes</li>
							<li>Make your own theme</li>
						</ul>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col last">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
                    <div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/venues/">Your Venues</a></div>
						<ul class="D_bullet">
							<li>Edit and manage your Venues</li>
							<li>Share your Venues</li>
							<li>Add a Venue</li>
						</ul>
					</li>
				</ul>
			
	</div>
</div>
</div>
<div class="D_boxcols divby3">
<div class="D_col first">
	<div class="D_colbody">
		
				<ul class="D_list">
					<li class="D_category">
						<div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/domain/">Manage Custom Domains</a></div>
						<p>Link your group to a domain you own</p>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col">
	<div class="D_colbody">
		
					<ul class="D_list">
					<li class="D_category">
						<div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/optional/">Optional features</a></div>
						<ul class="D_bullet">
							<li>Meetup Venues</li>
							<li>Mailing lists and message boards</li>
							
							<li>Set your default currency</li>
							
							<li>Track web stats using Google Analytics</li>
							
							
							<li>Follow us on</li>

						</ul>
					</li>
				</ul>
			
	</div>
</div>
<div class="D_col last">
	<div class="D_colbody">
		
				<ul class="D_list">
				<li class="D_category">
					<div class="D_name"><a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/roles/">Member roles</a></div>
					<p>Manage roles and customize which members can help run the Meetup Group</p>
				</li>
				</ul>
			
	</div>
</div>

		
</div>

 
EOF;

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
