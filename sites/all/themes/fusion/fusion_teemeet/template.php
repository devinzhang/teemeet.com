<?php


/**
 * Maintenance page preprocessing
 */
function fusion_teemeet_preprocess_maintenance_page(&$vars) {
  if (db_is_active()) {
    fusion_core_preprocess_page($vars);
  }
}


/**
 * Page preprocessing
 */
function fusion_teemeet_preprocess_page(&$vars) {
  require 'inc/func_group.php'; 
  /*if(strstr(request_uri(), 'mytestgroup'))
  {
    $vars['template_files'][] = 'page-group-mytestgroup';
  } */
 
 
 
// Add per content type pages
  if (isset($vars['node'])) {
    // Add template naming suggestion. It should alway use hyphens.
    $vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type);
    $vars['template_files'][] = 'page-'. str_replace('_', '-', $vars['node']->type) . '-' . $vars['node']->path;
 
  
  }
  /* build a primay links for a group node,
  here we created the primay links dynamaclly */ 
  //  print($GLOBALS['current_group']->path);
    // Generate links tree & add Superfish class if dropdown enabled, else make standard primary links
  $vars['primary_links_tree'] = '';
  
  if ($vars['primary_links']) {
    if (theme_get_setting('primary_menu_dropdown') == 1) {
      // Check for menu internationalization
      if (module_exists('i18nmenu')) {
        $vars['primary_links_tree'] = i18nmenu_translated_tree(variable_get('menu_primary_links_source', 'primary-links'));
      }
      else {
        $vars['primary_links_tree'] = menu_tree(variable_get('menu_primary_links_source', 'primary-links'));
      }
      $vars['primary_links_tree'] = preg_replace('/<ul class="menu/i', '<ul class="menu sf-menu', $vars['primary_links_tree'], 1);
      
    }else {
      $vars['primary_links_tree'] = theme('links', $vars['primary_links'], array('class' => 'menu'));
    }
  }
  
    //init   
    if(!empty($GLOBALS['current_group']))  
    {
        $vars['group'] = $GLOBALS['current_group'];   
        $vars['template_files'][] = 'page-group';
    }
    
    if(strstr(request_uri(), 'search'))
    {
        $vars['template_files'][] = 'page-group';
    } 
    
    if(isset($_COOKIE['debug']))
    {
        print_r($vars['template_files']);
    }
	
	//新鲜事
	if ($vars['user']->uid){
		$sql = "SELECT COUNT(DISTINCT(nid)) FROM {node} node WHERE node.type = 'help' AND node.status = 1 AND node.created > " . $vars['user']->login;
		$vars['whats_new_count'] = db_result(db_query($sql));
	}
}
/* hook_menu_item 
*
*
*/
/*
function fusion_teemeet_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
 /* $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
  $class .= ' '. $extra_class;  
  }  
  if ($in_active_trail) {
  $class .= ' active-trail';  
  } 
  // Add unique identifier  
  static $item_id = 0;  
  $item_id += 1;  
  $id .='group-front-' . $item_id; 
 // Add semi-unique class  
 $class .= ' ' . preg_replace("/[^a-zA-Z0-9]/", "", strip_tags($link));    
 return '<li class="'. $class .'" id="' . $id . '">'. $link . $menu ."</li>\n";
  
 }
*/

/*
function fusion_teemeet_menu_item_link($link) {
  if($link['menu_name'] == 'menu-group-page-nav'){
      if (empty($link['localized_options'])) {
            $link['localized_options'] = array();
    }
  return l($link['title'], $GLOBALS['current_group']->path.'/'.$link['href'], $link['localized_options']);

  }
}*/


//http://hellodrupal.info/node/79
function fusion_teemeet_theme(){
  return array(
    'event_node_form' => array(
      'template' => 'node-event-edit',
      'arguments' => array('form' => NULL),
    ), 
  );
}

/**
 * Node preprocessing
 */
function fusion_teemeet_preprocess_node(&$vars) {

}

function sponsor_list($node)
{
    //cache_get()
    foreach($node->field_sponsor_list as $sponsor)
    {
        $list[] = node_load($sponsor[nid]);
    }
    return $list;
}

function comment_list($node)
{     
    $resouce = db_query('select * from {comments} where nid = %d order by timestamp desc', $node->nid);
    while($r = db_fetch_object($resouce))
    {
        $return[] = $r;
    }
    return $return;
}