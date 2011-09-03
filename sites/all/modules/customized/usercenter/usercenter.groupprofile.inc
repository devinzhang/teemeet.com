<?php
/* menu call back
** this file to handle the member profiles in one group
*/


module_load_include('inc', 'usercenter', 'usercenter.greeting');


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
    drupal_add_js(drupal_get_path('module','usercenter') . '/js/greeting.js');
    
    jquery_ui_add(array('ui.dialog'));
    $account = user_load($uid);
    $output .= usercenter_profile_header_ingroup();
    $output .= '<div class="member-profile-contents isTabbed ">';
    $group = node_load($gid);
    global $user;
    $output .=_usercenter_group_member_tabs($uid,$gid);
        $output .= '<div class="profile-body">';
        if($user->uid != $uid) {
        $output .= drupal_get_form('usercenter_greeting_form', $uid);
        }
        $output .= usercenter_greeting_fetch_greetings($uid);
        $output .= '</div>';
    $output .= '</div>';

    return $output;

}

function _usercenter_group_member_tabs($uid,$gid) {
    $output = '';
    $current_group = $GLOBALS['current_group'];
      
    drupal_add_css(drupal_get_path('module','usercenter').'/usercenter.css');
    $output .= '<ul class="tabs primary">';
            $output .= '<li class="">'.l(t('Intr'),$current_group->path.'/member/'.$uid.'/ingroup/'.$gid.'/intro').'</li>';
            $output .= '<li class="">'.l(t('RSVPs'),$current_group->path.'/member/'.$uid.'/ingroup/'.$gid.'/rsvp').'</li>';
            $output .= '<li class="">'.l(t('Photos'),$current_group->path.'/member/'.$uid.'/ingroup/'.$gid.'/photos').'</li>';
            $output .= '<li class="">'.l(t('Greetings'),$current_group->path.'/member/'.$uid.'/ingroup/'.$gid.'/greetings').'</li>';
    $output .= '</ul>';
    return $output;
}