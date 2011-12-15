<?php



/**
 * @file
 * Code related to teemeet_event menu callbacks
 */

/**
 * Did this user actually attend the node they signed up for?
 */
function teemeet_event_checkout_list($nid) {
	$node = node_load($nid);
	drupal_set_title('');
	$header = array(
        array('data' => t(''), 'class' => 'user-header-avator'),
        array('data' => t('姓名'), 'class' => 'user-header-name'),
        array('data' => t('报名时间'), 'class' => 'user-header-rsvp'),
		array('data' => t('是否参加？'), 'class' => 'if-attend'),
       );
	//$gid=array_shift($node->og_groups);
	
	$is_admin =  og_is_group_admin($GLOBALS['current_group']);
	if($is_admin){
		$header[]= array('data' => t('操作'), 'class' => 'user-header-op');
	}
	
	$output = '<div class="D_box" id="attendee-list">';
		$output .=' <div class="D_boxbody">';
			$output .= '<div class="D_boxhead">';
				$output .= '<div class="D_backTo">'.l('返回到小组活动：'.$node->title,$GLOBALS['current_group']->path.'/node/'.$nid).'</div>';
				$output .= '<h2>'.$node->title.t(' 活动出勤表').'</h2>';
			$output .= '</div>';
			
			$output .= '<div class="D_boxsection">';
			$query = "SELECT sid, uid,signup_time,attended FROM {signup_log} WHERE nid = $nid";
			$count_query = "SELECT COUNT(*) FROM {signup_log} WHERE nid = $nid";
			$sql_result = pager_query($query, 10, 0, $count_query);
			$rows = array();
			global $base_url; 
			while($u = db_fetch_object($sql_result )){
				$usr = user_load($u->uid);
				if($usr->picture == ''){
					$avator = $base_url.'/sites/all/modules/customized/usercenter/images/default_avator.png'; 
				} else {
					$avator = $base_url.'/'.$usr->picture;
				}
		
				if($u->attended) {
				$status_txt= t('已参加');
				$op_url = l('未参加','teemeet/set/'.$nid.'/'.$u->sid.'/0',array('query' => array('gpath'=>$GLOBALS['current_group']->path)));
				
				}else{
				$status_txt=t('报名但未参加'); 
				$op_url = l('参加过','teemeet/set/'.$nid.'/'.$u->sid.'/1',array('query' =>  array('gpath'=>$GLOBALS['current_group']->path)));
				}
				$result = array(
                array('data' => '<img style="width: 50px; height:50px;" src='.$avator.'>', 'class' => 'header-avator'),
				array('data' => $usr->name, 'class' => 'header-author'),
                array('data' => format_date($u->signup_time, 'custom', 'Y-m-d'), 'class' => 'header-date'),
                array('data' => $status_txt, 'class' => ''),       
				);
				if($is_admin){
					$result[]= array('data' => $op_url, 'class' => '');
				}
	
				$rows[] = array('data' => $result);
			}
			if (!empty($rows)) {
				$output .= theme('table', $header, $rows);
				$output .= theme('pager', NULL, 10, 0);
			}
	
			
			
			$output .= '</div>';
		
		$output .= '</div>';
	$output .= '</div>';
	return $output; 
}
/*menu callback
**@param $sid, the signup id
**@param $flag, 1 for attendence, 0 for not
*/

function teemeet_event_set_attendance($nid, $sid, $flag){
	db_query("UPDATE {signup_log} SET attended = %d WHERE sid = %d", $flag, $sid);
	drupal_goto($_GET['gpath'].'/teemeet/checkout/'.$nid);
}


/**menu call back
**
*/

function teemeet_event_upcoming_list($gid){
	$output = '';
	
	$output = '<div class="D_box" id="attendee-list">';   
	$output .=' <div class="D_boxbody">';
			$output .= '<div class="D_boxhead">';
				$output .= '<div class="D_backTo">'.l('返回到小组主页',$GLOBALS['current_group']->path).'</div>';
				$output .= '<h2>'.t('Upcoming Events').'</h2>';
			$output .= '</div>';
			
			$output .= '<div class="D_boxsection">';
			$output .= '<ul id="ajax-container" class="resetList event-list clearfix">';
			
			$query = "SELECT node.nid
							FROM node node  
							LEFT JOIN og_ancestry og_ancestry ON node.nid = og_ancestry.nid 
							LEFT JOIN node node_og_ancestry ON og_ancestry.group_nid = node_og_ancestry.nid 
							LEFT JOIN event event ON node.nid = event.nid 
							WHERE (node.type in ('event')) AND (event.unix_event_start < UNIX_TIMESTAMP()) AND (node_og_ancestry.nid = $gid)";
			$count_query = "SELECT count(node.nid )
							FROM node node  
							LEFT JOIN og_ancestry og_ancestry ON node.nid = og_ancestry.nid 
							LEFT JOIN node node_og_ancestry ON og_ancestry.group_nid = node_og_ancestry.nid 
							LEFT JOIN event event ON node.nid = event.nid 
							WHERE (node.type in ('event')) AND (event.unix_event_start < UNIX_TIMESTAMP()) AND (node_og_ancestry.nid = $gid)";
			$sql_result = pager_query($query, 10, 0, $count_query);
			
			$rows = array();
			global $base_url; 
			while($e = db_fetch_object($sql_result )){
				$ev = node_load($e->nid);
				
				$output .='<li class="past line event-item past hide-tools">';
					$output .= _output_pass_event($ev);
					$output .='</li>';
			}
			
			$output .= theme('pager', NULL, 10, 0);
					
				$output .= '</ul>';			
			$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	
	return $output; 
}

/**menu call back
**
*/

function teemeet_event_past_list($gid){
	$output = '';
	
	$output = '<div class="D_box" id="attendee-list">';   
	$output .=' <div class="D_boxbody">';
			$output .= '<div class="D_boxhead">';
				$output .= '<div class="D_backTo">'.l('返回到小组主页',$GLOBALS['current_group']->path).'</div>';
				$output .= '<h2>'.t('Past Events').'</h2>';
			$output .= '</div>';
			
			$output .= '<div class="D_boxsection">';
			$output .= '<ul id="ajax-container" class="resetList event-list clearfix">';
			
			$query = "SELECT sp.nid, sp.status FROM {signup} as sp left join {og_ancestry} as oa on sp.nid=oa.nid WHERE sp.status = 0 and oa.group_nid=$gid";
			$count_query = "SELECT count(*) FROM {signup} as sp left join {og_ancestry} as oa on sp.nid=oa.nid WHERE sp.status = 0 and oa.group_nid=$gid";
			$sql_result = pager_query($query, 10, 0, $count_query);
			
			$rows = array();
			global $base_url; 
			while($e = db_fetch_object($sql_result )){
				$ev = node_load($e->nid);
				
				$output .='<li class="past line event-item past hide-tools">';
					$output .= _output_pass_event($ev);
					$output .='</li>';
			}
			
			$output .= theme('pager', NULL, 10, 0);
					
				$output .= '</ul>';			
			$output .= '</div>';
		$output .= '</div>';
		$output .= '</div>';
	
	return $output; 
}

function _output_pass_event($event){
	$output = '';
	$gpath = array_shift($event->og_groups_both);
	$gid = array_shift($event->og_groups);
	$output .='<p class="event-attended">'.format_date($event->created, 'custom', 'Y-m-d').', '.$event->signup_effective_total.t(' members attended').'</p>';
	$output .= '<a href="'.url($gpath.'/node/'.$event->nid).'" class="event-title">'.$event->title.'</a>';
	$output .= '<ul class="resetList event-rsvpPhotos ">';
	
	$sql_result = db_query("SELECT uid FROM {signup_log} WHERE nid = %d and attended = 1", $event->nid);
		
		$list = ''; 
		global $base_url; 
		$default_avator = variable_get('user_picture_default', 'sites/all/modules/customized/usercenter/images/default_avator.png');
		while($item=db_fetch_object($sql_result)) {
			$usr = user_load($item->uid);
			if($usr->picture == ''){
					$avator = $base_url.'/sites/all/modules/customized/usercenter/images/default_avator.png'; 
				} else {
					$avator = $base_url.'/'.$usr->picture;
			}
				
			$output .='<li>';
			$output .='<a href="'.url($gpath.'/member/'.$item->uid.'/ingroup/'.$gid).'" class="thumb30 memberinfo-widget" title="'.$usr->name.'" data-memberid="'.$item->uid.'">';
			$output .='<img src="'.$avator.'" data-src="'.$avator.'" style="display: inline; "/>';
			$output .='</a>';
			$output .='</li>';
		}
	$output .='</ul>';
	$output .= '<div class="event-desc">';
	$output .= $event->body.'...';
	$output .= '<a href="'.url($gpath.'/node/'.$event->nid).'" style="text-transform: uppercase; font-size: 9px; ">'.t('Learn more').'</a>';
	$output .= '</div>';
	
	return $output; 
}