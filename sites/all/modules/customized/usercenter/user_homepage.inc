<?php

function user_homepage_main() {
    drupal_add_css(drupal_get_path('module','user_homepage').'/user_homepage.css');
    global $user;

	if (in_array('agent', array_values($user->roles))) {
    	$instruction = 'This will output some instructions for agent';
    	$user_update = _user_homepage_agent_homepage($user);

    	$shortcuts = Array();
		$shortcuts['My Donors'] = array('url' =>l(t('My Donors'),'agent/view/donor/'.$user->uid), 'desc'=>t('You can management the donors register under you, you can edit their profiles') ) ;
		$shortcuts['My Donor Recipients'] = array('url' =>l(t('My Donor Recipients'),'agent/view/recipient/'.$user->uid), 'desc'=>t('You can management the recipients register under you, you can edit their profiles') ) ;
		$shortcuts['My Surrogate Mothers'] = array('url' =>l(t('My Surrogate Mothers'),'agent/view/surrogatemother/'.$user->uid), 'desc'=>t('You can management the surrogate mother register under you, you can edit their profiles') ) ;
		$shortcuts['Surrogate Recipients'] = array('url' =>l(t('Surrogate Recipients'),'agent/view/surrogaterecipient/'.$user->uid), 'desc'=>t('You can management the surrogate recipient register under you, you can edit their profiles') ) ;

		$shortcuts_output = theme('user_homepage_shortcuts', $user, $shortcuts);
		return theme('user_homepage_home',$user,$instruction,$user_update, $shortcuts_output);
    }

    if (in_array('donor', array_values($user->roles))) {
    	$instruction = 'This will output some instructions for donor';
    	$user_update = _user_homepage_donor_homepage($user);
    	return theme('user_homepage_home',$user,$instruction,$user_update);
    }

	if (in_array('recipient', array_values($user->roles))) {
    	$instruction = 'This will output some instructions for recipient';
    	$user_update = _user_homepage_recipient_homepage($user);
    	$shortcuts = Array();
    	$shortcuts['Order credits'] = array('url' =>l(t('Order credits'),'payuser/payuser_shopping'), 'desc'=>t('Order some credits so you can view the real donor profiles') ) ;
		$shortcuts['My orders'] = array('url' =>l(t('My orders'),'payuser/order/view'), 'desc'=>t('View your history orders') ) ;
		$shortcuts['My Accessed Donors'] = array('url' =>l(t('My Accessed Donors'),'payuser/myvieweddonor'), 'desc'=>t('You have saved some donors, review it again from here') ) ;
		$shortcuts_output = theme('user_homepage_shortcuts', $user, $shortcuts);

		$recommand_donors[259]= 259;
		$recommand_donors[766]= 766;
		$recommand_donors[518]= 518;

		global $base_path;
		$interest_output = '';
		foreach ($recommand_donors as $seq => $data) {
		$nd = node_load($seq);

		$img_view = t('No photo uploaded');
		if (!empty($nd->field_photo['0']['filepath'])) {
			$img_view = '<img width=77 src="' . $base_path . $nd->field_photo['0']['filepath'] . '"/>';
		}
		$interest_output .= theme('user_homepage_recommend_donors', $img_view, $nd);
		}


		return theme('user_homepage_home',$user,$instruction,$user_update, $shortcuts_output, $interest_output);
    }
	if (in_array('surrogatemother', array_values($user->roles))) {
    	$instruction = 'This will output some instructions for surrogatemother';
    	$user_update = _user_homepage_surrogatemother_homepage($user);
    }

	if (in_array('surrogaterecipient', array_values($user->roles))) {
    	$instruction = 'This will output some instructions for surrogaterecipient';
    	$user_update = _user_homepage_surrogaterecipient_homepage($user);
    }

}

function _user_homepage_agent_homepage($user) {
    $output = '';
    $status = array();

	$status[] = t('You have @amount donors', array('@amount' => '4'));
	$status[] = t('Your donors have been reviewed @review  in the past 3 months ', array('@review ' => 9));

	return theme('item_list',$status);
}


function _user_homepage_donor_homepage($user) {
    $output = '';
    $status = array();
	$agent_here = l(t("here"),'agent/1');
	$status[] = t('Your profile have completed @percentage, improve it and you will be searched by more recipients', array('@percentage' => '90%'));

	$status[] = t('Your profile have been reviewed @review times in the past 3 months', array('@review ' => 9));
	$status[] = t('Connect to your agent ? click ') . $agent_here;
	return theme('item_list',$status);
}


function _user_homepage_recipient_homepage($user) {
    $output = '';
    $status = array();

	$status[] = t('You have  @amount avaialbe credits,', array('@amount' => '23'));
	$status[] = t('You have reviewed  @review  donors', array('@review ' => 9));

	$output .= theme('item_list',$status);
	return $output;
}



function _user_homepage_surrogatemother_homepage($user) {
    $output = '';
    $status = array();
	$agent_here = l(t("here"),'agent/1');
	$agent_here = l(t("here"),'agent/1');
	$status[] = t('Your profile have completed @percentage, improve it and you will be searched by more recipients', array('@percentage' => '90%'));

	$status[] = t('Your profile have been reviewed @review times in the past 3 months', array('@review ' => 9));
	$status[] = t('Connect to your agent ? click ') . $agent_here;
	return theme('item_list',$status);
}


function _user_homepage_surrogaterecipient_homepage($user) {
    $output = '';
    $status = array();
	$agent_here = l(t("here"),'agent/1');
	$status[] = t('Your profile have completed @percentage, improve it and you will be searched by more recipients', array('@percentage' => '90%'));

	$status[] = t('Your profile have been reviewed @review times in the past 3 months', array('@review ' => 9));
	$status[] = t('Connect to your agent ? click ') . $agent_here;
	return theme('item_list',$status);
}