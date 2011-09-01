<?php
/* handle the greeting part */
 /**
 * Form builder function for guestbook post form.
 */
function usercenter_greeting_form(&$form_state, $uid) {
	global $user;

	$form = array();
	$form['recipient'] = array(
    '#type' => 'value',
    '#value' => $uid,
	);

	$form['author'] = array(
    '#type' => 'value',
    '#value' => $user->uid,
	);


	$form['message'] = array(
	    '#type' => 'textarea',
	    '#title' => t('Message'),
	    '#cols' => 32,
	    '#rows' => 5,
	    '#required' => TRUE,
	    '#default_value' => '',
	);
	$form['submit'] = array(
	    '#type' => 'submit',
	    '#value' => t('Send'),
	);
	return $form;
}
/**
 * Form validation function for guestbook_form_entry_form.
 */
function usercenter_greeting_form_validate($form, &$form_state) {
	// Check whether name of anonymous user is an registered user's name.
	if ($form_state['values']['message'] == '') {
		form_set_error('message', t('message should not be empty'));
	}
}

function usercenter_greeting_form_submit($form, &$form_state) {
	global $user;

	 $recipient = $form_state['values']['recipient'];
	 $author = $form_state['values']['author'];
	 $message = $form_state['values']['message'];
     $now = time(); 
	 db_query("INSERT INTO {greetings} (recipient, message, author, created)
	 VALUES(%d, '%s', %d, %d)", $recipient, $message, $author, $now);     
    $account = user_load($author); 
        $entry = new stdClass();
        $entry->recipient = $recipient;
        $entry->author = $author; 
        $entry ->picture = $account->picture;
        $entry->message = $message ;        
        $entry->created = $now; 
     
      module_invoke_all('greeting_insert', $entry);

      
}

/* get all the greetings for an user
 ** @param $uid, the recipient user uid
 ** @return, an array, keyed by id of an message
 */
function usercenter_greeting_fetch_greetings($uid) {
	$limit = 20;
	$sql = "SELECT g.*,  u1.name, u1.data, u1.picture
    FROM {greetings} g
    LEFT JOIN {users} u1 ON g.author = u1.uid
    WHERE g.recipient = %d
    ORDER BY g.created DESC";


	$result = pager_query($sql, $limit, 0, "SELECT COUNT(*) FROM {greetings} WHERE recipient = %d", $uid,$uid);

	$entries = array();
	while ($entry = db_fetch_array($result)) {
		$entries[] = $entry;
	}

	return theme('greetings', $uid, $entries,  $limit);
}


/**
 * Render a greetings pages.
 */
function theme_greetings($uid, $entries, $limit = 20) {

	$i = 0;
	$has_entry = FALSE;
	foreach ($entries as $entry) {
		$zebra = ($i % 2) ? 'odd' : 'even';
		$output .= theme('greeting_entry', $uid, $entry, $zebra);
		$i++;
		$has_entry = TRUE;
	}

	// Form and pager below entries.
	$output .= theme('pager', NULL, $limit, 0);

	if (!$has_entry) {
		$output = '<li> <div class="greeting-empty">'. t('Nobody has signed this greeting yet.') .'</div></li>';
	}

	return '<ul class="D_summaryList">'. $output ."</ul>" .'<div style="display:none;" id="dialog" title="'.t('Confirmation Required').'">'.t('Are you sure delete this?').'</div>';
}


function theme_greeting_entry($uid, $entry, $zebra, $confirm_delete = false) {
	global $user;
	$output = '';
	$author = user_load($entry['author']);
	global $base_url;
	$output .= '<li class="D_yell" id="greeting-entry-'.$entry['id'].'">';
	$output .= '<div class="D_image">';
	$output .= '<img src="'.$base_url.'/'.$entry['picture'].'"/>';
	$output .= '</div>';

	$output .= '<div class="D_info">';
	$output .= '<div class="quote">';
	$output .= '<p><span class="D_quot">“</span>&nbsp;'.$entry['message'].'&nbsp;<span class="D_quot">”</span></p> ';
	$output .= '</div>';
	$output .= '<div class="speaker">';
	$output .= '<div class="memName">&mdash; '.l($entry['name'],'user/'.$entry['author']).'<span class="nobr D_less">('.format_date($entry['created']).')</span></div>';
	$output .= '</div>';

	$output .= '<ul class="D_actions">';
	if($user->uid != $entry['author']) {
		$output .= '<li class="canDo">';
		$output .= l(t('Send @name a Greeting', array('@name' => $author->name)),'member/'.$entry['author'].'/ingroup/0/greetings');
		$output .= '</li>';
	}
    
	if(($user->uid == $entry['author']) || ($user->uid == $uid)) {
		$output .= '<li class="canDo">';
		$output .= l(t('Delete this Greeting'),'usercenter/ajax/greeting/'.$entry['id'].'/delete',array( 'attributes'=>array('id'=>$entry['id'], 'class'=>"delete-greeting-link")));
		$output .= '</li>';
	}
/*  // this will be enabled in the future
	$output .= '<li class="canDo">';
	$output .= l(t('Report as spam'),'');
	$output .= '</li>';
	$output .= '</ul>';
*/
	$output .= '</div>';
	$output .= '</li>';
	return $output;

}
/* menu callback to delete a greetings
 ** @param, $id, the greeting entry id
 */

function usercenter_ajax_delete_greetings($id) {
  $entry = db_fetch_object(db_query("select * from {greetings} where id=%d", $id)); 
  db_query("delete from {greetings} where id=%d", $id);  
  module_invoke_all('greeting_delete', $entry);
  drupal_json(array('status'=>1));
}