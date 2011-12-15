<?php
$node = $result['node'];
global $theme_path; $base_path; $user;
	
// 标签链接 
$topic_list = '';
foreach ($node->taxonomy as $term) {
	$topic_list .= '<span class="meetup-topic">' . l($term->name,'taxonomy/term/' . $term->tid) .'</span>, ';
}
$topic_list = substr($topic_list, 0, -2); 

//用户到群距离
$user_location = location_load_locations($user->uid, 'uid');
$node_location = location_load_locations($node->vid);
$latlon_user = array(
	'lon' => $user_location[0]['longitude'],
	'lat' => $user_location[0]['latitude'],
);
$latlon_node = array(
	'lon' => $node_location[1]['longitude'],
	'lat' => $node_location[1]['latitude'],
);
$distance = location_distance_between($latlon_user, $latlon_node);

//print '<pre>'; 
//print_r($node_location);
//print '</pre>';
?>
<li class="D_group J_groupHover">
	<div style="font-size: 0.9em;" class="D_image">
		<a class="omnCamp omngj_sj6b" href="<?php print $url; ?>">
			<?php 
				if($logo = theme('image', $node->field_logo[0]['filepath'])) :
					print $logo; 
				else : 
					print theme('image', $base_path.$theme_path . '/images/group_default.jpg');			
				endif; 
			?>
		</a>
		<div style="margin-top: .5em;" class="D_distance">
			<strong><?php print $distance['scalar'] . ' ' . $distance['distance_unit'];?> 距离</strong> <span class="D_nobr"><?php print $node_location[0]['city']; ?></span>
		</div>
		<div style="margin-top: .5em;" class="D_members">
			<strong><?php print $node->og_member_count; ?></strong> <?php print $node->field_member_alias[0]['value']; ?>
		</div>
	</div>
	
	<div class="D_info">
		<div style="width:auto; margin-right: 18.4em;" class="D_name J_help">
			<a class="omnCamp omngj_sj6b" href="<?php print $url; ?>"><?php print $title; ?></a>
		</div>
		<!--
		<div style="width: 22em;" class="D_secondary">
			<div class="featured">
				<div class="clearfix">
					<div class="colIconic">
						<a class="D_tearSheet D_tearSheet_less" href="http://www.meetup.com/MAXFIT-360-Basketball/events/35918282/">
							<span class="date">
								<span class="month">Oct </span>
								<span class="day">8</span>
							</span>
						</a>
					</div>
					<div class="colContent">
						<h4><a class="omnCamp omngj_sj6b" href="http://www.meetup.com/MAXFIT-360-Basketball/events/35918282/">Basketball Basics + Scrimmage!</a></h4>
						<div class="featuredMeta">Saturday 1:00 PM</div>
					</div>
				</div>
			</div>
			<div class="D_description">
				50 minutes of lessons + 3 12-minute quarters of basketball scrimmage!Improve your game by learning the basics.… 
				<a class="omnCamp omngj_sj6b" href="http://www.meetup.com/MAXFIT-360-Basketball/events/35918282/">Read more</a>
			</div>
			<div class="yourRsvp">
				<a class="D_linkButton omnCamp omngj_sj6b" href="http://www.meetup.com/MAXFIT-360-Basketball/events/35918282/">RSVP <span class="arrow">»</span></a><br><span class="D_less">Deadline: 10/7/11 11:30 PM.</span>
			</div>
			<div class="eventAttendee">
				<h5>Who's attending?</h5>
				<div class="suggestattendees">
					<a href="http://www.meetup.com/MAXFIT-360-Basketball/members/26026382/"><img data-memberid="26026382" data-chapterid="2498442" data-urlname="MAXFIT-360-Basketball" data-url="http://basketball.meetup.com/api/" class="memberinfo-widget" alt="" title="Kenny " data-src="http://photos1.meetupstatic.com/photos/member/7/8/0/2/thumb_24870722.jpeg" src="http://photos1.meetupstatic.com/photos/member/7/8/0/2/thumb_24870722.jpeg" style="display: inline;"></a>
				</div>
				<div class="attendCount">
					<span class="rsvp-count-number rsvp-count-going">1</span> attending
				</div>
			</div>
		</div><!-- /D_secondary -->
		
		<div style="margin-right: 23em;" class="D_primary">
			<div class="D_description J_help">
				<p class="search-snippet"><?php print $snippet; ?></p>
			</div>
			<div class="D_topicList">
				<div id="topicList1">
					<?php print $topic_list ?>
				</div>
			</div>
		</div><!-- /D_primary -->
	</div><!-- /D_info -->
	
</li>
