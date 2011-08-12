
<?php
/* menu call back
** this file to handle the member profiles in one group
*/

function usercenter_group_member_intro($uid, $group){
    $output = '';
    drupal_set_title('');
    
    $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
        $output .=_usercenter_group_member_tabs($uid, $group);
        $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_intro',$account, '', $group);    

        $output .= '</div>';
    $output .= '</div>';
    return $output;

}


function usercenter_group_member_rsvp($uid,$group){
    $output = '';
    drupal_set_title('');
     $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $output .=_usercenter_group_member_tabs($uid,$group);
        $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_rsvp',$account, '', $group);    

        $output .= '</div>';
   
    $output .= '</div>';
    
    return $output;

}


function usercenter_group_member_photos($uid,$group){
    $output = '';
    drupal_set_title('');
     $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $output .=_usercenter_group_member_tabs($uid,$group);
         $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_photos',$account, '', $group);    

        $output .= '</div>';
   
    $output .= '</div>';
    
    return $output;

}


function usercenter_group_member_greetings($uid,$group){
    $output = '';
    drupal_set_title('');
    $account = user_load($uid); 
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $output .=_usercenter_group_member_tabs($uid,$group);
        $output .= '<div class="profile-body">';
        $output .= theme('usercenter_member_greetings',$account, '', $group);    
        $output .= '</div>';
    $output .= '</div>';
    
    return $output;

}

function _usercenter_group_member_tabs($uid,$group) {
    $output = '';
    $output .= '<ul class="tabs primary">';
            $output .= '<li class="">'.l(t('Intr'),'member/'.$uid.'/ingroup/'.$group.'/intro').'</li>';
            $output .= '<li class="">'.l(t('RSVPs'),'member/'.$uid.'/ingroup/'.$group.'/rsvp').'</li>';
            $output .= '<li class="">'.l(t('Photos'),'member/'.$uid.'/ingroup/'.$group.'/photos').'</li>';
            $output .= '<li class="">'.l(t('Greetings'),'member/'.$uid.'/ingroup/'.$group.'/greetings').'</li>';
    $output .= '</ul>';
    return $output;         
}
