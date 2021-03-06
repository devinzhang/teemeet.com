<?
function output_group_menu($menuid = 'menu-group-page-nav')
{	
	$output = '<ul class="C_contextNav clearfix" id="C_navTopBody">';
    $output .= '<li class="first select"> <a href="/' . $GLOBALS['current_group']->path  . '">' . t('Home') . '</a> </li>';
    $tree = menu_tree_all_data($menuid);
	$current_group = $GLOBALS['current_group']; 
	global $user; 
    foreach($tree as $item)
    {
        $hasKids  = !empty($item['below']) ? 'class="hasKids"'  : '';
        $withKids = !empty($item['below']) ? 'onclick="return false;" class="withKids"' : '';
        if(!$item['link']['hidden']) $output .= "<li $hasKids ><a href='" . groupfront_url($item[link][href]) . "' $withKids> {$item[link][title]} </a>";
        if(!empty($item['below']))
        {
            $output .= '<ul>';
            foreach($item['below'] as $subitem)
            {
                if(!$subitem['link']['hidden']) $output .= '<li class="noAction"> <a href="' . groupfront_url($subitem['link']['href']) . '"> ' . $subitem['link']['title'] . '</a> </li>';
            }
            $output .= '</ul>';
        }        
    }
    
    
    if(!og_is_group_member($current_group->nid) or isset($_COOKIE['menu']))
    {	if($user->uid){
			$join_link = url('og/subscriber/'.$current_group->nid);
		}else{
			$join_link = url('user/register');
		}
        $output .= '<li class="calltoaction rightmenu giant"> <a href="'.$join_link.'" class="J_signupLink J_onClick omnCamp omnrg_joinus topNavJoinus">加入我们!</a> </li>';
    }
    else if($user->uid == $current_group->uid)

    {
        $grouptool = t('Group Tools');
		$schedule_meetup_link = l('发起活动',$current_group->path.'/node/add/event', array('query'=>array('gids[]'=>$current_group->nid)));
        $sendmail_link = l(t('Email Members'),$current_group->path.'/groupextension/'.$current_group->nid.'/messages/send');
        $manage_link = l(t('Group Settings'),$current_group->path.'/groupextension/'.$current_group->nid.'/manage');
        $money_link = l(t('Money'),$current_group->path.'/groupextension/'.$current_group->nid.'/money');
        $checklist_link = l(t('Organizer tips'),$current_group->path.'/groupextension/'.$current_group->nid.'/checklist');
        
        $output .= <<<EOF
<li class="hasKids groupTools rightmenu last">
<a href="#" class="withKids">$grouptool</a>
<ul>
<li class="">
$schedule_meetup_link
</li>
<li class="">
$sendmail_link
</li>

<li class="" id="topNav-group-setting">
$manage_link
</li>

<li>
$money_link
</li>

</ul>
</li>
EOF;

    }
    
    $output .= '</ul>';
    return $output;	
}

function output_group_sitetitle(&$node)
{    
    return '<h1 id="bannerGroupName"><a href="' . $node->path . '" title="' . $node->field_site_title[0]["value"] . '"><span>' . $node->field_site_title[0]["value"] . '</span> </a> </h1>';
} 