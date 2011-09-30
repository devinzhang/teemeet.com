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

/**
 * Group dues setting page.
 * 
 * @param  $gid group id
 * @return $output
 * @author nemo
 */
function groupextension_tools_dues($gid){
	// .D_box 
    $output = '<div class="D_box"><div class="D_boxbody">';
    
    // descripion
    $output .= '<div class="D_boxhead">' .
	    		'<div class="D_backTo">' . l("Back to group settings", 'groupextension/' . $gid . '/manage') . '</div>' .
	    		'<h1>' . t('Membership Dues') . '</h1>' .
	    		'<p>Collect membership dues from your members. Set up your payment preferences here. <a class="compare_pop" target="_blank" href="http://www.meetup.com/help/about_dues/?paypal=true"><strong>Learn more!</strong></a></p><p class="D_less"><span class="requiredMark">*</span> indicates a required field</p>' .
    		   '</div>';
    		   
    // form body
    drupal_add_js(drupal_get_path('module', 'group_extensions') . '/js/group_extensions.js');
    $output .= '<div class="D_boxsection isNotDivided ">';
    $output .= drupal_get_form('_groupextension_tools_group_dues_form', $gid);
    $output .= '</div>';
	
	// .D_box end
    $output .= '</div></div>';
    
	return $output;
}

/**
 * Group dues setting form.
 * 
 * @param  $gid group id
 * @return $form
 * @author nemo
 */
function _groupextension_tools_group_dues_form(&$form_state, $gid) { 
	//setting default values
	$dues_values = db_fetch_array(db_query('select * from {og_dues} where gid = %d', $gid));
	if ($dues_values) {
		$dues_gid = $dues_values['gid'];
		$dues_payment = explode(',', $dues_values['payment']);
		$dues_cost = $dues_values['dues'];
		$dues_cover = $dues_values['cover'];
		$refunds_policy = $dues_values['policy'];
		$refunds_reason = explode(',', $dues_values['reason']);
		$refunds_reason_1 = $dues_values['reason_1'];
	}
	$form = array();  
	
	$form['form-prefix'] = array(    
    	'#value' => '<div class="D_form D_form_dues">', 
	);	
	
	//dues
	$form['dues_title'] = array(
		'#prefix' => '<div class="elementGroup"><h3>',
		'#value' => t('Membership Dues'),
		'#suffix' => '</h3>',
	);

	
	$form['dues_payment-prefix'] = array(    
    	'#value' => '<div class="element">', 
	);
	$form['dues_payment'] = array(
		'#type' => 'checkboxes',
		'#required' => TRUE,
		'#title' => t('How do you want to collect payment'),
		'#options' => array(
	    	'1' => t('Accept payment online with alipay'),
  		),
		'#default_value' => isset($dues_payment) ? $dues_payment : array(),
	);	
	$form['dues_payment-suffix'] = array(    
    	'#value' => '</div>', 
	);
	
	$form['dues_cost-prefix'] = array(    
    	'#value' => '<div class="element">', 
	);
	$form['dues_cost'] = array(
		'#required' => TRUE,
		'#type' => 'textfield',
  		'#title' => t('How much are your Meetup Group\'s dues?'),	
  		'#size' =>12,
  		'#field_prefix' => t('Membership Dues of '),
  		'#field_suffix' => t('￥'),
		'#element_validate' => array('dues_cost_validate'),
		'#default_value' => $dues_cost,
	);	
	$form['dues_cost-suffix'] = array(    
    	'#value' => '</div>', 
	);
	
	$form['dues_cover-prefix'] = array(    
    	'#value' => '<div class="element">', 
	);
	$form['dues_cover'] = array(
		'#type' => 'textfield',
  		'#title' => t('What do your dues cover?'),	
  		'#size' =>80,
		'#default_value' => $dues_cover,
	);	
	$form['dues_cover-suffix'] = array(    
    	'#value' => '</div></div>', 
	);
	
	
	//refunds
	$form['refunds_begin'] = array(
		'#value' => '<div class="elementGroup">',
	);
	
	$form['refunds_title'] = array(
		'#prefix' => '<h3>',
		'#value' => t('Refunds'),
		'#suffix' => '</h3><div class="element">',
	);
		
	$form['refunds_policy'] = array(
		'#type' => 'radios',
		'#required' => TRUE,
  		'#title' => t('Refund policy'),	
		'#default_value' => '1',
		'#options' => array(
			0 => t('No refunds are offered'), 
			1 => t('I will refund members if…')
		),
		'#default_value' => isset($refunds_policy) ? $refunds_policy : 1,
	);	
	
	$form['refunds_reason-prefix'] = array(    
    	'#value' => '<div class="sub_element">', 
	);
	$form['refunds_reason'] = array(
		'#type' => 'checkboxes',
		'#options' => array(
	    	'1' => t('I close my Meetup Group'),
	    	'2' => t('The member leaves my Group'),
	    	'3' => t('I remove or ban the member from my Group'),
	    	'4' => t('Custom refund policy'),
  		),	
		'#default_value' => isset($refunds_reason) ? $refunds_reason : array(),
	);	
	$form['refunds_reason_1'] = array(
		'#type' => 'textarea',
		'#default_value' => $refunds_reason_1,
	);	
	$form['refunds_reason-suffix'] = array(    
    	'#value' => '</div>', 
	);
	
	$form['refunds_end'] = array(
		'#value' => '</div></div>',
	);
	
	$form['submit-prefix'] = array(    
    	'#value' => '<div class="footElement">', 
	);
	$form['submit'] = array(
		'#type' => 'submit', 
		'#value' => t('submit'),
		'#attributes' => array('class' => 'D_submit'),
	);
	$form['submit-suffix'] = array(    
    	'#value' => '</div>', 
	);
	
	$form['dues_gid'] = array(
		'#type' => 'hidden', 
		'#value' => $gid, 
    );
	
	$form['form-suffix'] = array(    
    	'#value' => '</div>', 
	);
	
	return $form;
}

/**
 * dues_cost field validation.
 * 
 * @param  $element field value
 * @param  $form_state
 * @author nemo
 */
function dues_cost_validate($element, &$form_state) {
   if (!is_numeric($element['#value'])) {
     form_error($element, t('How much are your Meetup Group\'s dues? field is illegal.'));
   }
}

function _groupextension_tools_group_dues_form_submit($form, &$form_state) {
	$values = $form_state['values'];
	
	$checked_refunds_reason = array_filter($values['refunds_reason']);
	$str_refunds_reason = implode(',', $checked_refunds_reason);
	
	$checked_dues_payment = array_filter($values['dues_payment']);
	$str_dues_payment = implode(',', $checked_dues_payment);
	
	if (!$values['refunds_policy']) {
		unset($str_refunds_reason, $values['refunds_reason_1']);
	}
	
	$exist_gid = db_result(db_query('select gid from {og_dues} where gid = %d', $values['dues_gid'])) ;
	
	if($exist_gid) {
		db_query("update {og_dues} set 
			payment = '%s',
			dues = '%s',
			cover = '%s',
			policy = %d,
			reason = '%s',
			reason_1 = '%s'
			where gid = %d", 	
			$str_dues_payment, 
			$values['dues_cost'], 
			$values['dues_cover'], 
			$values['refunds_policy'], 
			$str_refunds_reason, 
			$values['refunds_reason_1'],
			$values['dues_gid'] 
		);

	}else{	
		db_query("insert into {og_dues} (gid, payment, dues, cover, policy, reason, reason_1) 
				VALUES (%d, '%s', '%s', '%s', %d, '%s', '%s')", 
				$values['dues_gid'], $str_dues_payment, $values['dues_cost'], $values['dues_cover'], $values['refunds_policy'], $str_refunds_reason, $values['refunds_reason_1']);
	}

}

function _groupextension_tools_manage_output(){
    $output='';
    $current_group = $GLOBALS['current_group'];
    $member_link = l(t('Your Memebers'),$current_group->path.'/grouptool/'.$current_group->nid.'/manage/settings/members');
    $theme_link = url($current_group->path.'/admin/build/themes/settings/fusion_teemeet');
	$tags_link = l(t('Topics'), $current_group->path.'/groupextension/'.$current_group->nid.'/tags');
    $group_due_link = l('Membership Dues',$current_group->path.'/groupextension/'.$current_group->nid.'/dues');
	$sponsors_list_link = l('Sponsors and Perks',$current_group->path.'/sponsor/'.$current_group->nid.'/list');
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
						<div class="D_name">$tags_link</div>
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
<div class="D_boxsection ">	
<h3>Money</h3>
<div class="D_boxcols divby3">
<div class="D_col first">
	<div class="D_colbody">
<ul class="D_list">
<li class="D_category">
<div class="D_name">$group_due_link</div>
<ul class="D_bullet">
<li>Manage how you collect dues</li>
<li>Set your refund policy</li>
</ul>
</li>
</ul>
	</div>
</div>
<div class="D_col last">
	<div class="D_colbody">
		
<ul class="D_list">
<li class="D_category">
<div class="D_name">$sponsors_list_link</div>
<ul class="D_bullet">
<li>Manage who can send you Sponsor offers</li>
<li>Manage Perks, Sponsors and Offers</li>
<li>Add your own Sponsor</li>
</ul>
</li>
</ul>
	</div>
</div>
</div>
</div>
 
EOF;

return $output; 
}


function groupextension_tools_money($gid){
	$group = node_load($gid);
	$group_alias = drupal_get_path_alias('node/' . $gid);
	//drupal_add_js(drupal_get_path('module', 'group_extensions') . '/js/Meetup.Base.js');
	drupal_add_js(drupal_get_path('module', 'group_extensions') . '/js/group_extensions.js');
	
	
	$_dues = number_format(group_extensions_get_money_by_group($gid), 2);
	$_event = number_format(group_extensions_get_money_by_group($gid, 'event_payment'), 2);
	$_sponsor = number_format(group_extensions_get_money_by_group($gid, 'sponsor_payment'), 2);
	$_other = number_format(group_extensions_get_money_by_group($gid, 'other_payment'), 2);
	
	$_gain_raws = group_extensions_get_money_by_group($gid) + 
			group_extensions_get_money_by_group($gid, 'event_payment') +
			group_extensions_get_money_by_group($gid, 'sponsor_payment') +
			group_extensions_get_money_by_group($gid, 'other_payment');
	$_gain = number_format($_gain_raws, 2);
	
	$_expense = number_format(group_extensions_get_money_by_group($gid, 'expense'), 2);
	
	$_total = 	$_gain_raws - group_extensions_get_money_by_group($gid, 'expense');
	$_total =  number_format($_total, 2);

	
	// .money
    $output = '<div class="money">';
	
	// .D_box
	$output .= '<div class="D_box"><div class="D_boxbody">';	
	// .D_boxhead
	$output .= '<div class="D_boxhead">
					<h1>' . $group->title . '</h1>
					<p class="D_less">' .
					t('Manage your group\'s money. Keep track of the money coming in to your Meetup Group &mdash; Meetup event payments, Dues and Sponsorships &mdash; as well as all the Expenses going out. Filter by date and transaction type, export transactions and more.') . ' 
					</p>
					<ul class="D_actions hasIcons">
						<li id="shareaction" class="canDo shareaction">
							<form name="shareForm" id="shareForm" method="post" action="">
							<a class="share sprite sprite_action book_open_icon" id="sharing" href="http://www.meetup.com/Beijing-Soccer-Lovers/money/?op=public_ledger&amp;public=yes">Make public to members</a> 
							<span id="whatsThisSharing" class="D_less">(<a id="wsAction" href="javascript:void(0);">what\'s this?</a>)</span>
							</form>
						</li>
						<li class="canDo">
							<a class="share sprite sprite_action page_delete_icon" id="sharing" href="http://www.meetup.com/Beijing-Soccer-Lovers/money/?op=hide_before_today">Hide transactions prior to today</a>
						</li>
					</ul>
				</div>' ;
	
	// D_boxsection
	$output .= '<div class="D_boxsection "><div class="storytime cashflow">';
	$output .= '<div class="D_boxhead"><h3>' . t('Your Meetup Group\'s Summary') . '</h3></div>';
	$output .= '<div class="D_boxsection divby2 ">
				<div class="D_col first"><div class="D_colbody"><div id="upsell">
					<div style="text-align:center; display:none;" id="charts"><img style="margin-bottom: 10px;border: 1px solid #ccc" src="http://chart.apis.google.com/chart?cht=bvs&amp;chs=300x150&amp;chxt=x,y&amp;chd=s:AA,AA,AA,AA&amp;chxl=0:|Cash+In|Expenses|1:||$1&amp;chtt=Cash+In+vs.+Expenses&amp;chco=866D1D|AD0014,F39039|AD0014,5A9B2C|AD0014,1F3884&amp;chbh=85"></div>
					<p class="D_less" id="upsellCopy">It\'s easier than ever to get help with the financial side of organizing your Meetup. You can manage your group\'s money as well as:</p>
					<ul class="D_actions hasIcons">
						<li class="canDo D_less">' . l('Set up Membership dues', $group_alias . '/groupextension/' . $gid . '/dues') . '
						<p class="sprite_action">
						If you want members to pay for group membership.<br>
						</p>
						</li>
						<li class="canDo D_less">
						<li class="canDo D_less">' . l('Schedule paid Meetup Events','') . '
						<p class="sprite_action">If you need members to pay for a one-off Meetup Event.</p>
						</li>
						<li class="canDo D_less">' . l('Manage your Sponsors','') . '
						<p class="sprite_action">Promote your Sponsor or get help finding one.</p>
						</li>
					</ul>
				</div></div></div>

				<div class="D_col last"><div class="D_colbody"><div id="rollup">
					<ul>
						<li class="borderBottom"><p style="margin:0 0.5em;font-weight:bold;" class="moneyIn">Cash In</p></li>
						<li>
						<ul class="allcash">
							<li><p class="label"><span>Membership dues</span></p><p class="total"><span id="duesTotal">￥ ' .  $_dues  . '</span></p></li>
							<li><p class="label"><span>Meetup Events</span></p><p class="total"><span id="eventTotal">￥ ' .  $_event  . '</span></p></li>
							<li><p class="label"><span>Sponsor payments</span></p><p class="total"><span id="sponsorTotal">￥ ' .  $_sponsor  . '</span></p></li>
							<li><p class="label"><span>Other Income</span></p><p class="total"><span id="otherTotal">￥ ' . $_other  . '</span></p></li>
						</ul>
						</li>
						<li><p class="moneyIn label">Total Cash In</p><p id="cashInTotal" class="moneyIn total">￥ ' . $_gain . '</p></li>
						<li class="borderTop"><p class="moneyOut label">Expenses</p><p id="expenseTotal" class="moneyOut total">￥ ' . $_expense . '</p></li>
						<li class="borderTopDouble"><p class="label" id="netLabel">Net</p><p id="netTotal" class="total">￥ ' . $_total . '</p></li>
					</ul>
					<div style="margin-top:0.5em"></div>
				</div></div></div>
				
				</div>';// .D_boxsection end
	
	// D_boxsection end
	$output .= '</div></div>';
	
	// .D_box end
    $output .='</div></div>';
	
	// .transBox
	$output .= '<div class="transBox"><div class="D_box"><div class="D_boxbody"><div class="D_boxsection ">';
	
	// .D_filterHead
	$output .= '<div class="D_filterHead clr"><ul class="D_actions hasIcons">';
	$output .= '<li id="addActions" class="canDo isdropDown"><a class="addPayments dropDown sprite sprite_action add_icon" id="adder" href="javascript:void(0);" style="display: block;">Record a transaction</a><div class="dd D_less" id="addMenu" style="display: none;">
					<ul>
						<li><a class="D_signal D_signal_appear_to_setupDuesDialog sprite sprite_action money_add_icon colorbox-load" href="' . url('colorbox/form/dues_form/' . $gid, array('query' => 'width=500&height=300')) . '">Record Membership dues Received</a></li>
						<li><a class="addable sprite sprite_action money_add_icon colorbox-load" href="' . url('colorbox/form/event_payment_form/' . $gid, array('query' => 'width=500&height=500')) . '">Record Event Payment Received</a></li>
						<li><a class="addable sprite sprite_action money_add_icon colorbox-load" href="' . url('colorbox/form/sponsor_payment_form/' . $gid, array('query' => 'width=500&height=400')) . '">Record Sponsor Payment Received</a></li>
						<li><a class="addable sprite sprite_action money_add_icon colorbox-load" href="' . url('colorbox/form/other_payment_form/' . $gid, array('query' => 'width=500&height=400')) . '">Record Other Income Received</a></li>
						<li><a class="addable sprite sprite_action money_delete_icon colorbox-load" href="' . url('colorbox/form/expense_form/' . $gid, array('query' => 'width=500&height=400')) . '">Record an Expense Paid</a></li>
					</ul>
				</div></li>';
	$output .= '<li class="canDo isdropDown disabled" id="filterAction"><a class="dropDown sprite sprite_action page_find_icon" id="filterItem" href="javascript:void(0);">Filter Transactions</a></li>';
	$output .= '<li class="canDo isdropDown disabled" id="exportActions"><a class="dropDown sprite sprite_action disk_icon" id="exporter" href="javascript:void(0);">Export all transactions</a></li>';
	// .D_filterHead end
	$output .= '</ul></div>';
	
	//table
	$transactions = group_extensions_get_transactions_by_group($gid);
	$output .= '<table class="D_ledger">
		<thead>
			<tr>
				<th class="ledgerDate">Date</th>
				<th>Transaction</th>
				<th class="ledgerAmount">Amount</th>
				<th class="">Actions</th>
			</tr>
		</thead>
		<tbody id="ledger_body">';
	if(empty($output)) {
	$output .=	'<tr id="emptytrans">
				<td style="margin-top: 1em; text-align: center;" colspan="4">
				<p>There are no transactions. <br><br>Click "<a style="font-weight:bold;" onclick="" href="javascript:void(0);">Record a transaction</a>" above to keep track of all the money coming in and out of your Meetup Group.</p>
				</td>
			</tr>';
	}else{
		foreach($transactions as $t) {
			switch($t['type']) {
				case 'event_payment' : 
					$t['type_lable'] = t('Event Payment');
					break;
				case 'sponsor_payment' : 
					$t['type_lable'] = t('Sponsor Payment');
					break;
				case 'other_payment' : 
					$t['type_lable'] = t('Other Income');
					break;
				case 'expense' : 
					$t['type_lable'] = t('Expense');
					break;
				case 'dues' : 
					$t['type_lable'] = t('Membership dues');
					break;
			}
			
			$output .= '<tr>
					<td class="ledgerDate">' . date('d/m/Y', $t['date']). '</td>
					<td>' . $t['type_lable'] . '</td>
					<td class="ledgerAmount">' . $t['amount'] . ' ￥</td>
					<td class="">delete</td>
				</tr>';
		}
	}
	
	$output .=	'</tbody></table>';
	
	// .transBox end
	$output .= '</div></div></div></div>';
	
	// .money end
    $output .='</div>';
	
	return $output;
}


function groupextension_tools_checklist($gid){
    $output = '';
    $output .='cehck list';
return $output;
}

