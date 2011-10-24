<?php

/**
 * @author devin.zhang, 1392137041@qq.com
 * @copyright 2011
 */
 
/* menu call back, show the group members
** @param $gid, the group nid
*/
function group_extensions_all_group_members($nid) {
    $output = '';
       
    global $user; 
    $arg = 0;
     if(isset($GLOBALS['current_group'])){
        $current_group = $GLOBALS['current_group'];
        $arg = $current_group->nid;         
     }
     $output .= '<ul class="D_actions hasIcons">
                <li class="canDo">
                    <a class="sprite sprite_action user_green_icon" href="'.url($current_group->path.'/member/'.$user->uid.'/ingroup/'.$current_group->nid).'">'.t('View your profile').'</a>
                </li>';
  //   $output .= '<li class="canDo"><a class="sprite sprite_action email_edit_icon" href="">Edit communication settings</a></li>';
      $output .= '</ul>';
      $output.=_group_extensions_members_tabmenu($arg);
     $output .= group_extensions_all_show_members($arg); 
    return '<div class="D_box">' . $output . '</div>'; 
}

/* output the tabed menu
**
*/

function _group_extensions_members_tabmenu($gid){
    $cnt = _group_extensions_get_all_members($gid, TRUE);
    $current_group = $GLOBALS['current_group'];
     
    $output .='<ul class="D_tabs connected">';
    $output .='<li class="select">';
     $output .='<a href="'.url($current_group->path.'/groupextension/allmembers/'.$current_group->nid.'/all').'">'.t('All members ').'<span class="D_count">('. $cnt.')</span></a>';
    $output .='</li>';
     $output .='<li>';
     $output .='<a href="'.url($current_group->path.'/groupextension/allmembers/'.$current_group->nid.'/leadship').'">'.t('The Leadership Team').'<span class="D_count">(1)</span></a>';
    $output .='</li>';
    $output .= '</ul>';
    return $output; 
}

function group_extensions_all_show_members($gid) {
     $output = '';
     $members = _group_extensions_get_all_members($gid);
     
     $output .= '<ul id="list_of_members" class="memlist dues">';    
     
     foreach($members as $user) {
        $uid = $user->uid;
        $output .= '<li id="member_'.$user->uid.'">'.theme('group_extensions_member',$user ).'</li>';  
     }
     $output .= '</ul>';
    return $output;  
}
/* get all the members in array form, without theme
** @param $gid , group nid
** @param $count, if only return a member number, true only number
*/
function _group_extensions_get_all_members($gid, $count=false){
    $view_name = 'og_members_faces';    
    $result = views_get_view_result($view_name,'Page', $gid);  
    if($count){
        return count($result);
    }else{
        return $result; 
    }
}
function group_extensions_allmembers_page_title($gid){
    $cnt = _group_extensions_get_all_members($gid, TRUE);
    return t('All Members (@cnt)',array('@cnt'=>$cnt));
}

function group_extensions_leadship_page_title($gid){
 //   $cnt = _group_extensions_get_all_members($gid, TRUE);
    $cnt = 1; 
    return t('The Leadship Team (@cnt)',array('@cnt'=>$cnt));
}
/* menu callback */
function group_extensions_all_leadship_members($gid){
    global $user; 
    $arg = 0;
     if(isset($GLOBALS['current_group'])){
        $current_group = $GLOBALS['current_group'];
		
        $arg = $current_group->nid;         
     }
     $output .= '<ul class="D_actions hasIcons">
                <li class="canDo">
                    <a class="sprite sprite_action user_green_icon" href="'.url($current_group->path.'/member/'.$user->uid.'/ingroup/'.$current_group->nid).'">'.t('View your profile').'</a>
                </li>
              
                </ul>';
      $output.=_group_extensions_members_tabmenu($arg);
	  $output .= '<ul id="list_of_members" class="memlist dues">';    
     
   
        $uid =  $current_group->uid;
        $output .= '<li id="member_'.$user->uid.'">'.theme('group_extensions_member',$user ).'</li>';  
   
     $output .= '</ul>';
	 
   return '<div class="D_box">' . $output . '</div>'; 
}


/* menu callback for the theme
** @param , the members list
**Array
(
    [0] => stdClass Object
        (
            [uid] => 62
            [users_picture] => sites/default/files/upload_element/13.jpg
            [users_name] => devin
            [users_mail] => devin@a.com
            [og_uid_is_admin] => 1
        )

)
*/
function theme_group_extensions_member($member){
     $output = '';
     $user = user_load($member->uid);
    
     $current_group = $GLOBALS['current_group'];
      $member_profile = $user->og_groups[$current_group->nid]['member_profile'];
     global $base_url; 
     $output .= '<div id="image_'.$member->uid.'" class="profphoto">';
     $output .= '<a href="'.url( $current_group->path.'/member/'.$member->uid.'/ingroup/'.$current_group->nid).'"><img width="80px" height= "80" class="memPhoto" alt="" src="'.$base_url.'/'.$user->picture.'"></a>';
     $output .= '</div>';
     $output .= '<div class="memberItem clearfix">
        <div class="memberActions canOnlyEmail D_dropdown">';
   //  $output .= '   <a title="Send an Email" class="cog emailcog" href="http://www.meetup.com/Beijing-Soccer-Lovers/message/?recipientId=20252341"><span></span></a>';
     $output .= '   </div>
<div class="memberInfo hasOnlyEmail">
<div id="memberInfo_20252341" class="D_title">';
$output .= '<a class="memName" href="'.url( $current_group->path.'/member/'.$member->uid.'/ingroup/'.$current_group->nid).'">'.$user->name.'</a>';
$output .= '<span id="role_20252341" class="memRole">

</span>

<ul class="D_less memStats">';
$output .= '<li><span class="bold">'.t('Joined').'</span>: '.format_date($user->created).'</li>';

$output .= '<li><span class="bold">'.t('Last visited').'</span>:'.format_date($user->login,'small').'</li>';
$output .= '</ul><p class="D_less">"'.$member_profile->introduction.'"</p></div></div></div>';     
     return $output; 
}
