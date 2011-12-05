<?php
/*
** theme the basic user profile 
 */

?>

<div class="D_boxcols divby6">
<div class="D_col spans2 first">
	<div class="D_colbody">
		
<div id="D_memberProfileAside">
<div id="image_20252341">
<div>

<a href="">
<?php //in the product site, need to use this code instead the below <img part
//$img_path = $account->picture;
//echo theme('imagecache','avator_100x100', $img_path,'','', array('class'=>'D_memberProfilePhoto'));
//print_r($account);
?>

<img width="100px" src="<?php global $base_url; echo $base_url.'/'.$account->picture; ?>" alt="" class=""></a>

</div>

<span class="D_inlineAction D_firstInlineAction"><a href="<?php echo url('user/'.$account->uid.'/photos'); ?>"><?php print t('Manage photos'); ?></a></span>

</div>

<p class="title">
<?php
$is_admin = og_is_group_admin($curr_group);
$is_member = og_is_group_member($curr_group->nid, $include_admins = false, $account->uid);
$group_member_profile = $account->og_groups[$curr_group->nid]['member_profile'];
if(isset($group_member_profile->membertitle)){
    if($is_admin && $is_member){
        echo '<span id="member_title_edit" class="editable_member_title" link="'.url('member/'.$account->uid.'/ingroup/'.$curr_group->nid.'/edittitle').'">'.$group_member_profile->membertitle.'</span>';;
    } else {
        echo t('Title').':'.$group_member_profile->membertitle;
   }
} else {
    if($is_admin && $is_member){
       echo '<span id="member_title_edit" class="editable_member_title" link="'.url('member/'.$account->uid.'/ingroup/'.$curr_group->nid.'/edittitle').'">'.t('Give member a custom title').'</span>';;
    }else {
        echo t('No title yet');
    }
}
?>

</p>

<div class="D_memberProfileContentChunk">
<!--<h4>Follow me on:</h4>

<div style="padding-top: 0.25em; padding-bottom: 0.25em;">
<img title="" alt="" src="<?php global $base_url ; echo $base_url.'/'.drupal_get_path('module','usercenter').'/images/qq.jpeg'; ?>?">
<img title="" alt="" src="<?php global $base_url ; echo $base_url.'/'.drupal_get_path('module','usercenter').'/images/sina.jpeg'; ?>?">
</div>

<p class="D_less">

<a href="http://www.meetup.com/Beijing-Soccer-Lovers/profile/#webLinks">Add/edit links</a>

</p>
-->
</div>

<div class="D_memberProfileContentChunk">
<h4><?php print t('My activity'); ?></h4>
<ul class="D_memberActivityList" id="D_memberProfileActivityList">
<li class="D_memberActivityListMeetups">


<a href="">RSVPs (2)</a>


</li>
<li class="D_memberActivityListCheckins">

<span>Meetup Check-ins (0)</span>

</li>

<li class="D_memberActivityListPhotos"><a href="">Photos (2)</a></li>
<li class="D_memberActivityListGreetings"><a href="">Greetings (0)</a></li>


</ul>
</div>

<div class="D_memberProfileContentChunk" id="D_memberProfileInteract">
<ul>
<li class="canDo contactMember">







<a title="Send an Email" class="" href="http://www.meetup.com/Beijing-Soccer-Lovers/message/?recipientId=20252341"><img height="16" width="15" class="D_icon mailTip" alt="Send an Email" src="<?php global $base_url ; echo $base_url.'/'.drupal_get_path('module','usercenter').'/images/icon_envelope.gif'; ?>"></a> <a class="" href="http://www.meetup.com/Beijing-Soccer-Lovers/message/?recipientId=20252341"> Send email</a>

</li>

</ul>
</div>

<div class="D_memberProfileContentChunk">
<h4>Interested in new groups about</h4>



<div id="topicList1">
<span class="meetup-topic"><a class="topic-id-235 topic-link J_onClick  topic-info-hover" href="http://coffee.meetup.com/cities/us/md/potomac/">Coffee</a></span>, <span class="meetup-topic"><a class="topic-id-17201 topic-link J_onClick  topic-info-hover" href="http://20s-30s-social.meetup.com/cities/us/md/potomac/"><span class="first-word J_onClick topic-info-hover"> 20's</span> &amp; 30's Social</a></span>
</div> 

<ul class="D_actions">

<li title="&quot;Hidden&quot; means that only you will be able to view this information." class="avoidDo">
<form method="post" action="http://www.meetup.com/account/">

<a class="parentSubmit" id="mimHideSubmit">Hide this</a>
<noscript>&amp;lt;input type="submit" id="mimHideSubmit" name="submit" value="Hide this" /&amp;gt;</noscript>
<input type="hidden" value="alert_privacy" name="op">
<input type="hidden" value="http://www.meetup.com/Beijing-Soccer-Lovers/members/20252341/" name="returnUri">
</form>
</li>

<li class="avoidDo">
<a href="http://www.meetup.com/account/?returnUri=http%3A%2F%2Fwww.meetup.com%2FBeijing-Soccer-Lovers%2Fmembers%2F20252341%2F#alerts">Edit</a>
</li>
</ul>

</div>

<div class="D_memberProfileContentChunk">
<h4>My Meetup Groups</h4>

<form method="post" action="http://www.meetup.com/account/">
<ul style="margin-top: 0.5em ! important;" class="D_actions">
<li title="&quot;Hidden&quot; means that only you will be able to view this information." class="canDo">

<a class="parentSubmit sprite_action sprite monitor_icon" id="chapterHideSubmit">Hide my Meetup Groups</a>
<noscript>&amp;lt;input type="submit" id="chapterHideSubmit" name="submit" value="Hide my Meetup Groups" /&amp;gt;</noscript>

<input type="hidden" value="group_privacy" name="op">
<input type="hidden" value="http://www.meetup.com/Beijing-Soccer-Lovers/members/20252341/groups/" name="returnUri">
</li>
</ul>
</form>

<ul class="D_summaryList  D_narrow">
<?php  foreach($account->og_groups as $gid=>$group): ?>

<li class="D_group">

<div class="D_image">
<a href="" title=""><img style="width: 50px;" title="" alt="" src="<?php 
global $base_url ; 
if($group['group_photo_path'] != ''){
    echo $base_url.'/'.$group['group_photo_path'];
}else{
    echo $base_url.'/'.drupal_get_path('module','usercenter').'/images/noPhoto_50.png'; 
}
?>">
</a>

</div>
<div class="D_info">
<div style="font-size: 0.9em ! important;" class="D_name"><a href="<?php echo url('node/'.$gid); ?>" class="omnCamp omngj_sj3"><?php echo $group['title']; ?></a></div>

<div class="D_affiliation">
<?php if($group['is_admin']) {
echo t('Orgnizor');
} else {
echo $group['member_profile']->membertitle;
}

?>
</div>

<ul class="D_actions">
<li><a class="omnCamp omngj_sj3" href="">View profile</a></li>
</ul>
</div>
</li>
<?php endforeach; ?> 


</ul>

</div>

</div>

	</div>
</div>
<div class="D_col spans4 last">
	<div class="D_colbody">
		
<div id="D_memberProfileMain">
<div class="D_boxcols divby3" id="D_memberProfileMeta">

<div class="D_col first">
	<div class="D_colbody">
		
<div class="D_memberProfileContentItem">
<h4><?php print t('Location'); ?></h4>
<p>

<a href=""><span class="locality"><?php print $account->locations[0]['city']; ?></span>, <span class="region"><?php print $account->locations[0]['province_name']; ?></span></a><span class="displaynone country-name"><?php print $account->locations[0]['country_name']; ?></span>

<a class="D_inlineAction D_firstInlineAction" href=""><?php print t('Edit location');?></a>

</p>
</div>

	</div>
</div>
<div class="D_col">
	<div class="D_colbody">
		

<div class="D_memberProfileContentItem">
<h4>Member of this Meetup Group since</h4>
<p><?php echo format_date($account->og_groups[$curr_group->nid]['created'],'custom','M d, Y'); ?></p>
</div>


	</div>
</div>
<div class="D_col last">
	<div class="D_colbody">
		
<div class="D_memberProfileContentItem">

</div>

	</div>
</div>


</div>



<div class="D_memberProfileContentItem">
<h4>Introduction</h4>
<p><?php
$group_member_profile = $account->og_groups[$curr_group->nid]['member_profile'];
echo $group_member_profile->introduction;
?>
</p>
</div>

<div class="D_memberProfileContentItem">
<?php
$qa =  $account->og_groups[$curr_group->nid]['group_qa'];
foreach ($curr_group->questions as $qid => $q) {
echo '<h4>'.$q.'</h4>';
echo '<p class="D_empty">'.isset($qa[$qid])? $qa[$qid] : t('No answer yet').'</p>';
}
?>




</div>


<div class="D_memberProfileContentItem">
<h4><?php echo t('What @name is saying about this Meetup Group',array('@name'=>$account->name)) ?>;</h4>
 <p>
 <?php 
    $has_comment = group_extensions_get_my_group_review($curr_group->nid, $account->uid );
    if($has_comment){
        echo '<span class="D_empty">' . $has_comment->comment.'</span>';
    } else {    
        echo '<span class="D_empty">'. t('@name has not left a group review yet.',array('@name'=>$account->name)).'</span>';
        echo l(t('Click here to read other members\' group reviews'),$curr_group->path.'/group/'.$curr_group->nid.'/comments' );
    }
?>    
 </p> 
</div>

</div>

	</div>
</div>


</div>
