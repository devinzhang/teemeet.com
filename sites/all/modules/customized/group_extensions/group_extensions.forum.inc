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

module_load_include('inc', 'group_extensions', 'group.comment');

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

/** menu callback to post a new forum topic
** @param, $nid, the post nid
**
*/
function group_extensions_reply_post($nid) {
    $output = '';
    $node=node_load($nid);
    $output .= '<div class="D_box">';
    $output .= '<div class="D_boxbody">';
    $output .= '<div class="D_boxhead">';
    $output .= '<h1>'.t('Add a reply').'</h1>';
    $output .= '<p><strong>'.t('This post will be viewable by everybody.').'</strong></p>';
        $output .= '</div>';
        $output .= '<div class="D_boxsection">';
            $output .= '<div class="element">
                            <div class="label">
                                <label>'.t('Replying to').':'.$node->name.'</label>
                            </div>
                            <div class="bdMsgReplyTo D_bbcode">
                                <h3>'.$node->title.'</h3>
                                <div class="bdMsg">
                                '.$node->body.'<br>
                                </div>
                            </div>
                        </div>';
            $output .= drupal_get_form('group_extensions_reply_post_form',$nid);
        $output .= '</div>';
    $output .= '</div>';
$output .= '</div>';
    return $output; 
}

function group_extensions_reply_post_form(&$form_state, $nid) {
    $form=array();   
    $form['message'] = array(
              '#type' => 'textarea',
              '#title' => t('Message'),
              '#default_value' =>'' ,
              '#prefix' => '<div class="reply-body">',
              '#suffix' => '</div>',
              '#required' => false,
            );
    $form['nid'] = array(
        '#type' => 'hidden',
        '#value' => $nid,
    );
            
    $form['submit'] = array(
        '#type' => 'submit', 
        '#value' =>  t('Submit'),
        '#weight' =>13,
    );
    return $form;
 }
 
 
function group_extensions_reply_post_form_submit($form, &$form_state) {
    $nid = $form_state['values']['nid'];
    $message = $form_state['values']['message'];
    group_extensions_save_comment($message, $nid);
    $current_group = $GLOBALS['current_group'];
    
    drupal_goto($current_group->path.'/node/'.$nid);
}
    
    