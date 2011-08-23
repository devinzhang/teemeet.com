<?
function output_group_menu($menuid = 'menu-group-page-nav')
{	
	$output = '<ul class="C_contextNav clearfix" id="C_navTopBody">';
    $output .= '<li class="first select"> <a href="http://www.meetup.com/SacSwim/">Home</a> </li>';
    $tree = menu_tree_all_data($menuid);
    foreach($tree as $item)
    {
        $hasKids  = !empty($item['below']) ? 'class="hasKids"'  : '';
        $withKids = !empty($item['below']) ? 'onclick="return false;" class="withKids"' : '';
        if(!$item['link']['hidden']) $output .= "<li $hasKids ><a href='" . url($item[link][href]) . "' $withKids> {$item[link][title]} </a>";
        if(!empty($item['below']))
        {
            $output .= '<ul>';
            foreach($item['below'] as $subitem)
            {
                $output .= '<li class="noAction"> <a href="' . url($subitem['link']['href']) . '"> ' . $subitem['link']['title'] . '</a> </li>';
            }
            $output .= '</ul>';
        }        
    }
    $output .= '<li class="calltoaction rightmenu giant"> <a href="http://www.meetup.com/SacSwim/join/" class="J_signupLink J_onClick omnCamp omnrg_joinus topNavJoinus">Join us!</a> </li>';
    $output .= '</ul>';
    return $output;	
}

function output_group_sitetitle(&$node)
{    
    return '<h1 id="bannerGroupName"><a href="' . $node->path . '" title="' . $node->field_site_title[0]["safe"] . '"><span>' . $node->field_site_title[0]["safe"] . '</span> </a> </h1>';
} 