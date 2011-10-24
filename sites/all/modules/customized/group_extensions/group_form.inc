<?php

/**
 * @author Spirit8.com
 * @copyright 2011
 */
 
define('CREAT_GROUP_STEPS', 4); //表单步骤总数

function group_create(&$form_state)
{     
	global $user;
    if(!isset($form_state['storage']['step']))
    {
        $form_state['storage']['step'] = 1;
    }
    $step = $form_state['storage']['step'];
    
    switch($step)
    {
        case 1 :      
            $form['#id'] = 'create';      
            
          //  addresses_user_form_user_profile_form_alter($form, $form_state, TRUE);            
            
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
                '#type' => 'textarea',
                '#title' => t('小组描述'),
                '#cols' => 60,
				'#rows' => 5,
            );               
            
            $form['field_member_alias'] = array
            (
                '#type' => 'textfield',
                '#title' => t('组员称呼'),
                '#size' => 64,                
            );
			
            $settings = variable_get('location_settings_user', array());
            $form['locations'] = location_form($settings, $user->locations);
			
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
            
            $form['js'] = array
            (
                '#value' => <<<EOF
<script>
function switchPathAjax(data)
{        
    if(data == 1)
    {
        $('#pathCheck').html('<font color="red">This path is already being used by another Meetup Group.</font>');            
    }
    else
    {
        $('#pathCheck').html('This address is available.');
        $('#edit-Next').attr('disabled', 0);
    }
}

function checkPath(interval)
{
    /*var t1 = 0,t2;
    t2 = new Date().getTime();
    if(t2 - t1 > interval)
    {*/
        $.ajax({           
           url: "/ajax?func=pathCheck",
           data: {path: $('#edit-path').val() },
           success: function(data){ switchPathAjax(data); },
           //async: false
        });         
    /*}
    t1  = new Date().getTime();   */
}
$(document).ready(function(){
    $('#edit-Next').attr('disabled', 'disabled');
    $('#edit-path').after('<div id="pathCheck"></div>');
    
    var interval = 500;
    var checkInterval;
    
    $('#edit-path').keyup(function(){        
        $('#edit-Next').attr('disabled', 'disabled');
        $('#pathCheck').html('<img src="/misc/loading.gif" />');
        
        if (checkInterval) {
            clearInterval(checkInterval);
            checkInterval = null;
        }
        checkInterval = setInterval(checkPath(interval), interval);
        
        
        /*t2 = new Date().getTime();        
        if(t2 - t1 > interval)
        {
            checkPath();             
        }*/
        t1 = new Date().getTime();
        //setInterval('checkPath()', interval);        
        //$.getJSON('/ajax?func=pathCheck', {path: $(this).val() } , function(data){ switchPathAjax(data); } )
    }); 
    

});

</script>
EOF
            
            );

        break;
        
        case 2:
            //module_include();
            /*print_r($GLOBALS['current_group']);
            print_r();
            
            die;*/
            $_GET['styleid'] = $form_state['storage']['path'];
            $form = color_mine_theme_setting_form($form_state);
            
            //unset($form['buttons']);
            //$form['Next'] = array
            //(
            //    '#weight' => 1000,
            //    '#type' => 'submit',
            //    '#value' => 'Next'
                
            //);            
        break;
        
        case 3:
			$from['group_tag_select'] = array(
				'#value' => '<h3>'.t('What\'s topic for this group?').'</h3>',
				
			);
          for($i=1; $i<= GROUP_TAGS_MAX_TOPICS; $i++) {
				$form['group_tag_'.$i] = array(
				'#type' => 'textfield',
				'#title' => t(''),
				'#default_value' => '',
				'#size' => 50,
				'#maxlength' => 128,
				'#autocomplete_path' => 'taxonomy/autocomplete/'. GROUP_TAGS_VOCABULARY_VID,
				'#required' => false,
				
		);
		}
		 $form['Next'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => 'Next'
                
            );
            
            
            
            
            
        break;
        
        case 4:
            $q = db_query("SELECT node.nid AS nid, node_data_field_price.field_price_value AS node_data_field_price_field_price_value, node.language AS node_language, node.type AS node_type, node.vid AS node_vid, node_data_field_price.field_period_valuable_value AS node_data_field_price_field_period_valuable_value, node.title AS node_title, node_revisions.body AS node_revisions_body, node_revisions.format AS node_revisions_format FROM node node  LEFT JOIN content_type_service node_data_field_price ON node.vid = node_data_field_price.vid LEFT JOIN node_revisions node_revisions ON node.vid = node_revisions.vid WHERE node.type in ('service')");

            $form['service-order'] = array
            (
                '#type' => 'radios', 
                '#title' => t('Please Select a Service.'), 
                '#required' => true,
            );
            while($r = db_fetch_object($q))
            {    
                //print_r($r);
                $form['service-order']['#options'][$r->nid] = $r->node_revisions_body;                
            }
            
    		$form['Pay'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => t('Pay')
                
            );
         
		 
        break;
		
		case 5:
		$form['Next'] = array
            (
                '#weight' => 1000,
                '#type' => 'submit',
                '#value' => 'Complete'
                
            );
         
		break;
		
    
	}
        
    //$submit = (CREAT_GROUP_STEPS == $step ) ? t('Finish') : t('Next');

    
    return $form;
}

function group_create_submit($form, &$form_state)
{
    global $user;
    $form_state['storage']  = $form_state['storage'] + $form_state['values'];
    if($user->uid)
    {
        //保存小组
        if($form_state['storage']['step'] == 1 )
        {
            $form_state['storage']['step'] ++;
            
            $node = new stdClass;        
            $node->uid = $user->uid;
            $node->name = $user->name;
            $node->type = NODE_TYPE;
			$node->comment =2;
            $node->title = $form_state['storage']['title'];   
            $node->og_description = $form_state['storage']['og_description']; 
            $node->pathauto_perform_alias = 0;
            $node->path = $form_state['storage']['path']; 
            $node->theme = $form_state['storage']['theme'];  
            $node->taxonomy['tags'][1] = $form_state['storage']['taxonomy'];   
            
            $node->field_location = $form_state['storage']['locations']; 
            $node->field_site_title[0]['value'] = $form_state['storage']['field_site_title'];
            $node->field_member_alias[0]['value'] = $form_state['storage']['field_member_alias'];
            $node->status = 0;           
            
            /*module_load_include('inc', 'addresses', '/countries/'. $node->field_location[0]['country']);
            eval("\$province = addresses_province_list_{$node->field_location[0]['country']}();");
            $node->field_location[0]['province_name'] = $province[$node->field_location[0]['province']];*/
           // print '<pre>';
			//print_r($node);exit;
			//print '</pre>';
            node_save($node);
			 
          path_set_alias('node/' . $node->nid, $form_state['storage']['path'], NULL, $language);
        
            $form_state['storage']['nid'] = $node->nid;
            //$form_state['storage']['path'] = $form_state['storage']['path'];
            drupal_set_message('小组创建成功，请设置模板');        
            
            return;
        }   
        //设置主题
        elseif($form_state['storage']['step'] == 2)
        {
            $form_state['storage']['step'] ++;
            $_GET['styleid'] = $form_state['storage']['path'];
            color_mine_theme_setting_form_submit($form, $form_state);   
			drupal_set_message(t('主题设置成功，请选择几个描述这个小组的话题，以方便其他成员来了解这个小组')); 			
            return;
        }     
        elseif($form_state['storage']['step'] == 3)
        {
            $nid = $form_state['storage']['nid']; 
			$group_node = node_load($nid);
			foreach ($form_state['storage'] as $key => $value) {
				if(substr($key,0,10) == 'group_tag_'){
					if($value != '') {
						//assign this term to this node
						$terms_found = taxonomy_get_term_by_name($value);	
						if (count ($terms_found) > 0) {
							$tid = $terms_found[0]->tid ; 
							$group_node->taxonomy[] = $tid;
						} else {
						$term = array(
							'vid' => GROUP_TAGS_VOCABULARY_VID, // Voacabulary ID
							'name' => $value, // Term Name
							'synonyms' => NULL, // (Optional) Synonym of this term
							'parent' => NULL, // (Optional) Term ID of a parent term
							'relations' => NULL, // (Optional) Related Term IDs
					   );       
						taxonomy_save_term($term);
						$terms_found = taxonomy_get_term_by_name($value);	
						if (count ($terms_found) > 0) {
							$tid = $terms_found[0]->tid ; 
							$group_node->taxonomy[] = $tid;
						}
						}
					continue;	
					}
			
				}
			}
			
        }
		elseif($form_state['storage']['step'] == 4)
		{
            $node = node_load($form_state['values']['service-order']);
            $subject = $node->title . '-' . $node->nid . '-' . $form_state['storage']['nid'];
            drupal_goto('order', 'subject=' . $subject . '&total_fee=' . $node->field_price[0]['value'] . '&alibody=' . $node->body);
            //$form['service-order']['#options']
		}
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

function service_list()
{
    $sql = "SELECT 
            {node}.nid AS nid, 
            node_data_field_price.field_price_value AS node_data_field_price_field_price_value, 
            node.language AS node_language, 
            node.type AS node_type, 
            node.vid AS node_vid, 
            node_revisions.body AS node_revisions_body, 
            node_revisions.format AS node_revisions_format 
            FROM {node} 
            {node}
            LEFT JOIN content_type_service node_data_field_price ON {node}.vid = node_data_field_price.vid 
            LEFT JOIN node_revisions node_revisions ON node.vid = node_revisions.vid 
            WHERE {node}.type = 'service'";
    $source = db_query($sql);
    while($r = db_fetch_object($source))
    {
        $return[] = $r;
    }
    return $return;
}
