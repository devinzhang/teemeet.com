<?php

/**
 * @author Spirit8.com
 * @copyright 2011
 */
 
define('CREAT_GROUP_STEPS', 3); //表单步骤总数

function group_create(&$form_state)
{
    if(!isset($form_state['storage']['step']))
    {
        $form_state['storage']['step'] = 1;
    }
    $step = $form_state['storage']['step'];
    
    switch($step)
    {
        case 1 :      
            $form['#id'] = 'create';      
            
            addresses_user_form_user_profile_form_alter($form, $form_state, TRUE);            
            
            $form['title'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组名称'),
                '#size' => 64,
                '#required' => TRUE,
            );
            
            $form['field_site_title'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组页面标题'),
                '#size' => 64,
            );            
            
            $form['og_description'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组描述'),
                '#size' => 64,
            );               
            
            $form['field_member_alias'] = array
            (
                '#type' => 'textfield',
                '#title' => t('组员称呼'),
                '#size' => 64,                
            );
            
            $form['path'] = array
            (
                '#field_prefix' => $_SERVER['HTTP_HOST'] . '/',
                '#type' => 'textfield',
                '#title' => t('小组网址'),
                '#size' => 64,     
                '#required' => TRUE,           
            );
            
            $form['agreement'] = array
            (
                '#type' => 'checkboxes',
                '#title' => t('服务条款'),                
                '#required' => TRUE,         
                '#options' => array('遵守建立以真实人员参与的小组'),  
            );     
            
            $form['theme'] = array
            (
                '#type' => 'hidden',
                '#value' => 'fusion_teemeet'
            );    
            
            $form['Next'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => 'Next'
                
            );

        break;
        
        case 2:
            //module_include();
            $form = color_group_theme_form($form_state);
            unset($form['buttons']);
            $form['Next'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => 'Next'
                
            );            
        break;
        
        case 3:
            $form['taxonomy'] = array
            (
                '#type' => 'textfield',
                '#title' => 'Topics',
                '#size' => 64,                
            );
            $form['Finish'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => 'Finish'
                
            );
        break;
        
        /*case 4:
        //payment
        break;*/
    }
        
    //$submit = (CREAT_GROUP_STEPS == $step ) ? t('Finish') : t('Next');

    
    return $form;
}

function group_create_submit($form, &$form_state)
{
    global $user;
    $form_state['storage']  = $form_state['storage'] + $form_state['values'];
    if($form_state['storage']['step'] == 1 and $user->uid)
    {
        $form_state['storage']['step'] ++;
        
        $node = new stdClass;        
        $node->uid = $user->uid;
        $node->name = $user->name;
        $node->type = NODE_TYPE;
        $node->title = $form_state['storage']['title'];   
        $node->og_description = $form_state['storage']['og_description']; 
        $node->pathauto_perform_alias = 0;
        $node->path = $form_state['storage']['path']; 
        $node->theme = $form_state['storage']['theme'];  
        $node->taxonomy['tags'][1] = $form_state['storage']['taxonomy'];   
        
        $node->field_location[0] = $form_state['storage']['addresses']; 
        $node->field_site_title[0]['value'] = $form_state['storage']['field_site_title'];
        $node->field_member_alias[0]['value'] = $form_state['storage']['field_member_alias'];
        $node->status = 0;           
        
        module_load_include('inc', 'addresses', '/countries/'. $node->field_location[0]['country']);
        eval("\$province = addresses_province_list_{$node->field_location[0]['country']}();");
        $node->field_location[0]['province_name'] = $province[$node->field_location[0]['province']];
        
        node_save($node);
        drupal_set_message('小组创建成功，请设置模板');        
        
        return;
    }
    
    
    if($form_state['storage']['step'] != CREAT_GROUP_STEPS)
    {
        $form_state['storage']['step'] ++;
        return;
    }
    
    //保存信息
    
    //print_r($form_state['storage']);
    

    drupal_goto($form_state['storage']['path']);
}


