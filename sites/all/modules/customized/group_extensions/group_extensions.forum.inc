<?php

/**
 * @author devin.zhang, 1392137041@qq.com
 * @copyright 2011
 */
 
/* menu call back, show the group forums
** it depend on the content type :forum_topic
** it depend on the 'group_forum' view
** @param $gid, the group nid
*/
function group_extensions_forum($gid) {
    $output = '';
       
    global $user; 
   
     if(isset($GLOBALS['current_group'])){
        $current_group = $GLOBALS['current_group'];
     }
    $view_name = 'group_forum';
    $result = views_get_view_result($view_name,'Page', $gid);  
    $topics= array(); 
    foreach($result as $topic){       
        $topics[] = node_load($topic->nid);
    }
   
    $output .=  theme('group_extensions_forum_board', $current_group, $topics);
    return $output; 
}