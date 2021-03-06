<?php

/**
 * @author devin.zhang, 1392137041@qq.com
 * @copyright 2011
 */
 
 /* menu callback to list a groups comments
  *
  *
  */
  
 function group_extensions_comments_list($gid){
    drupal_set_title(t('All Group Reviews'));
    global $user; 
    drupal_add_css(drupal_get_path('module','group_extensions').'/css/group_extensions.css');
    $output = '';
    $output .= '<div class="D_boxhead"><h1>'.t('All Group Reviews').'</h1></div>';

    $has_comment = group_extensions_get_my_group_review($gid, $user->uid); 
    
    if(!$has_comment && og_is_group_member($gid)) {
    $output .= drupal_get_form('group_extensions_comment_form',$gid);
    }
    $output .= _group_extensions_get_group_comments($gid);
    return $output;
 }
 
 
function group_extensions_save_comment($comment,$nid){
	global $user;
	$forum_comment_fields = array();
	$forum_comment_fields['values']['author'] = $user->name;
	$forum_comment_fields['values']['subject'] = '';
	$forum_comment_fields['values']['comment'] = $comment;
	$forum_comment_fields['values']['op'] = t('Save');
    $forum_comment_fields['values']['name'] = $user->name;
	$forum_comment_fields['values']['nid'] = $nid;
	comment_form_submit("comment_form", $forum_comment_fields);

	watchdog('group_extensions','submit a comment for nid='.$nid.'comment=' . $comment);
    
}

function group_extensions_ajax_postcomment() {
	$nid=$_POST['nid'];
	$micro_comment = $_POST['comment'];
	group_extensions_save_comment($micro_comment, $nid);
    $comment_number = comment_num_all($nid);
    
	dynamic_products_json(array('status' => true, 'resp'=>'post comment successfully','counter'=>$comment_number));
	
}

/*menu callback for set a comments as featured
**@param $gid, the group nid
**@param $cid, the unique comment id
**@param, $op, $op=1 to set a featured, $op=0 remove the featured 
** @param $ajax , bool, true for ajax return,  false for general output. 
*/
function group_extensions_ajax_featured_comment($gid, $cid, $op, $ajax=FALSE ) {
    $group_node = node_load($gid); 
    if($op) { //this is a set
      db_query("INSERT INTO {featuredcomments} (gid, cid) VALUES (%d, %d)", $gid, $cid);
    } else { // try to remove the featured character 
      db_query("delete from {featuredcomments} where cid=%d", $cid);
    }
    drupal_goto($group_node->path.'/group/'.$gid.'/comments');
}

/* if a comment was a featured comment
**
**
*/
function group_extensions_is_featured_comment($cid) {
    
    return db_result(db_query('select cid from {featuredcomments} where cid=%d',$cid));    

}

/* Get all the group comments and dispaly them all
 *
 */
function _group_extensions_get_group_comments($gid){
	$output = '';
    global $user; 
    $group_node = node_load($gid); 
	if (user_access('access comments')) {
		// Pre-process variables.
		$nid = $gid;
		if (empty($nid)) {
			$nid = 0;
		}

		$query_count = 'SELECT COUNT(*) FROM {comments} c WHERE c.nid = %d';
		$query = 'SELECT c.cid as cid, c.pid, c.nid, c.subject, c.comment, c.format, c.timestamp, c.name, c.mail, c.homepage, u.uid, u.name AS registered_name, u.signature, u.signature_format, u.picture, u.data, c.thread, c.status FROM {comments} c INNER JOIN {users} u ON c.uid = u.uid WHERE c.nid = %d';

		$query_args = array($nid);
		if (!user_access('administer comments')) {
			$query .= ' AND c.status = %d';
			$query_args[] = COMMENT_PUBLISHED;
		}


		$query .= ' ORDER BY c.cid DESC';

		$query = db_rewrite_sql($query, 'c', 'cid');


		// Start a form, for use with comment control.
		$result = db_query($query,$nid);

		$divs = 0;
		$num_rows = FALSE;
		$comments = '';
		global $base_path;
		//   drupal_add_css(drupal_get_path('module', 'comment') .'/comment.css');
		$i = 0;
        $output .= '<ul class="group-reviews">';
        global $base_url; 
		while ($comment = db_fetch_object($result)) {
			$i++;
			$comment = drupal_unpack($comment);
			$comment->name = $comment->uid ? l($comment->registered_name,'user/'.$comment->uid) : $comment->name;

			$created = t('(%time ago)', array('%time' => format_interval(time() - $comment->timestamp,1)));			
            
			$comments .= '<li id='.$comment->cid.' class="D_item D_narrow testimonials">';
            
			$comments .= '<div class="D_image"><img src="'.$base_url.'/'.$comment->picture.'"></div>';
            $comments .= '<div class="D_info comment hReview">';
            $comments .= '<span class="displaynone item">';
                $comments .= '<span class="fn">Beijing Soccer Lovers</span>';
            $comments .= '</span>';
            $comments .= '<p class="txtMember summary">
                            <span class="D_quot">“</span>';
                    $comments .= '&nbsp'.$comment->comment.'&nbsp';
              $comments .= '<span class="D_quot">”</span>';
             $comments .= '</p>';
             $comments .= '<p class="credit last">&mdash;';
            $comments .= $comment->name;
            $comments .= '<span class="nobr D_less dtreviewed"> '.$created.'</span>';
            $comments .= '</p>';
            
            if(og_is_group_admin($group_node)){ 
            
             $comments .= '<div class="vote"><ul class="D_actions">';
                if(group_extensions_is_featured_comment($comment->cid)) {
                $comments .= '<li class="canDo"><a href="'.url('group/'.$gid.'/comments/featuredcomment/'.$comment->cid.'/0').'" class="">'.t('Remove from featured group reviews').'</a></li>';
                } else {
                $comments .= '<li class="canDo"><a href="'.url('group/'.$gid.'/comments/featuredcomment/'.$comment->cid.'/1').'" class="">'.t('Set as  featured group review').'</a></li>';
               }
            $comments .= '</ul></div>';
            }
            $comments .= '</div>';


			$num_rows = TRUE;
		}

		if($num_rows) {
			$output .=$comments;
		} else {
			$output = t('Nobody reply it');
		}
	} else {
		$output = t('Sorry, you don\'t have permission to view the comments!');
	}
    $output .= '</ul>';
	return $output;
}


/* define a form to allow the user input the comment
 ** @param $gid, the group node nid
 **
 */
function group_extensions_comment_form(&$form_state,$gid) {

$node = node_load($gid);

$title = t('Review the Meetup Group. What do you think of @groupname', array('@groupname'=>$node->title) );

$form['micro_comment'] = array(
'#type' => 'textarea',
'#title' => $title,
'#default_value' => '',
'#size' => 50,
'#maxlength' => 128,
'#required' => TRUE,
);

$form['gid'] = array(
'#type' => 'hidden',
'#value' => $gid,
);

$form['group_extensions_comment_submit'] = array(
'#type' => 'submit',
'#value' => t('Submit'),
'#weight' => 4,
);
return $form;
}


function group_extensions_comment_form_submit($form, &$form_state) {
    $values = $form_state['values'];
   
	$nid=$values['gid'];
	$micro_comment = $values['micro_comment'];
	group_extensions_save_comment($micro_comment, $nid);    
    $cid = $form_state['values']['cid'] ;
    drupal_goto($GLOBALS['current_group']->path.'/group/'.$nid.'/comments'); 
}