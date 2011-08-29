
<?php
/* menu call back
** this file to handle the member profiles in one group
*/

function usercenter_group_member_intro($uid, $gid){
    $output = '';
    drupal_set_title('');
    
    $account = user_load($uid);   
    $output .= usercenter_profile_header_ingroup();
  
    $group = node_load($gid); 
    $output .= '<div class="member-profile-contents isTabbed ">';
        $output .=_usercenter_group_member_tabs($uid, $gid);
        $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_intro',$account, $group);    

        $output .= '</div>';
    $output .= '</div>';
    return $output;

}


function usercenter_group_member_rsvp($uid,$gid){
    $output = '';
    drupal_set_title('');
     $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $output .=_usercenter_group_member_tabs($uid,$gid);
     $group = node_load($gid);
        $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_rsvp',$account, '', $group);    

        $output .= '</div>';
   
    $output .= '</div>';
    
    return $output;

}


function usercenter_group_member_photos($uid,$gid){
    $output = '';
    drupal_set_title('');
    $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $output .=_usercenter_group_member_tabs($uid,$gid);
     $group = node_load($gid);
         $output .= '<div class="profile-body">';
        //$output .= theme('usercenter_member_photos',$account, '', $group);    
         $output .= multi_avator_member_photos(); 
        $output .= '</div>';
   
    $output .= '</div>';
    
    return $output;

}


function usercenter_group_member_greetings($uid,$gid){
    $output = '';
    drupal_set_title('');
    $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $group = node_load($gid);
    $output .=_usercenter_group_member_tabs($uid,$gid);
        $output .= '<div class="profile-body">';
    //    $output .= theme('usercenter_member_greetings',$account, '', $group);  
    if(module_exists('guestbook')) {
        global $user; 
        if($user->uid != $uid){
            $output .= guestbook_page_form($account);
        }
        $output .= module_invoke('guestbook', 'page', $uid);
    }
    
        $output .= '</div>';
    $output .= '</div>';
    
    return $output;

}

function _usercenter_group_member_tabs($uid,$gid) {
    $output = '';
    $output .= '<ul class="tabs primary">';
            $output .= '<li class="">'.l(t('Intr'),'member/'.$uid.'/ingroup/'.$gid.'/intro').'</li>';
            $output .= '<li class="">'.l(t('RSVPs'),'member/'.$uid.'/ingroup/'.$gid.'/rsvp').'</li>';
            $output .= '<li class="">'.l(t('Photos'),'member/'.$uid.'/ingroup/'.$gid.'/photos').'</li>';
            $output .= '<li class="">'.l(t('Greetings'),'member/'.$uid.'/ingroup/'.$gid.'/greetings').'</li>';
    $output .= '</ul>';
    return $output;         
}
