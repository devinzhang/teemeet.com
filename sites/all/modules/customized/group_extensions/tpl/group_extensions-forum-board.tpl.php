<div class="D_box">
	<div class="D_boxbody">
        <div class="D_boxhead">
	
<p class="crumb">
	<span class="nobr"></span>
	
</p>
<h1><?php echo $group->title.' '. t('Forum'); ?></h1>
<ul style="float: left;" class="D_actions">
 

<li class="canDo">

<a class="sprite sprite_action page_add_icon" href="<?php echo url($group->path.'/node/add/forum-topic',array('query'=>array('gids[]'=>$group->nid))); ?>"><?php echo t('Start a new post') ;?></a>
</li>

<li class="canDo">

<a class="orgTool" title="Mark all as read" href=""><img style="padding-bottom: 3px;" class="D_icon unread png" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme','fusion_teemeet').'/images';?>/icon_unread_on.png" alt="Mark all as read"> <span>Mark all as read</span></a>
</li>

<li class="canDo">
<a class="sprite sprite_action monitor_add_icon" title="Get daily email updates when new messages are added to this board" href="">
Track this message board
</a>
</li>

</ul>

<ul style="clear: left;" class="D_actions">
<li class="canDo">

<a title="Forums allow you to group related discussions together in one place." class="sprite sprite_action folder_go_icon" href="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/?forum=2124521&amp;op=ask_about_forums"><span>Change to Forum View</span></a>
</li>
</ul>


</div>


<div class="D_boxsection ">
<div id="D_threadDisplay">

<div class="mainContent"> 
 
<div class="D_searchBar">

<form method="get" action="./Beijing Soccer Lovers Message Board - Beijing Soccer Lovers (Beijing) - Meetup_files/Beijing Soccer Lovers Message Board - Beijing Soccer Lovers (Beijing) - Meetup.htm" name="boardSearch">
<input type="text" value="" id="keywords" name="keywords" size="15">

<input type="hidden" value="" name="search_forum">

<input type="hidden" value="search" name="op"><input type="submit" value="Search" class="D_submit">
</form>
</div>
 
<form id="threadActionForm" method="POST" action="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/forum/2124521/?pager.offset=0">
<input type="hidden" value="chapter" name="contextName">
<input type="hidden" value="2124521" name="forum">
<input type="hidden" value="1314888553675" name="t">

<div class="D_filterHead clr">
<div id="D_threadHeader" class="D_threadHeader">

<div class="D_threadSelect D_headerItem">
Select:

<span><a class="D_checkSignal D_signal_all_toClass_D_selectTarget" href="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/2124521/?pager.offset=0&amp;sel=all">All</a></span>

<span><a class="D_checkSignal D_signal_none_toClass_D_selectTarget" href="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/2124521/?pager.offset=0&amp;sel=none">None</a></span>

<span><select name="op" class="D_threadActions">
<option value="nada" name="nothing">-- Actions --</option>
<option disabled="true" value="read" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_unread_off_chapter.png&quot;);" name="read">Mark as Read</option>
<option disabled="true" value="unread" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_unread_on.png&quot;);" name="unread">Mark as Unread</option>

<option disabled="true" value="pin" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_pinned_on.png&quot;);" name="pin">Pin to top</option>
<option disabled="true" value=" unpin" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_pinned_off_chapter.png&quot;);" name="unpin">Unpin</option>

<option disabled="true" value="close" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_closed_on.png&quot;);" name="close">Close</option>
<option disabled="true" value=" reopen" class="png dimNoSelect" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>icon_closed_off_chapter.png&quot;);" name="unclose">Reopen</option>

<option disabled="true" class="png dimNoSelect deleteConfirm" value="delete" style="background-image: url(&quot;<?php echo path_to_theme().'/images/'; ?>cancel.png&quot;);" name="delete">Delete</option>

</select>
<input type="submit" class="D_submit submitNoJs" value="Change" name="submitButton">

</span>
</div>

</div>
</div>
<input type="hidden" value="2124521" id="forumId">
<table class="D_tabular">
<thead>

<tr id="boards_list" class="sort ">
<th></th>
<th></th>
<th>Subject</th>
<th>

<a href="" title="" class=" J_sort">
Started By
</a>
</th>
<th class="posts">

<a href="" title="" class=" J_sort">
Replies
</a>
</th>
<th class="views">

<a href="" title="" class=" J_sort">
Views
</a>
</th>
<th class="last">
<span class="D_nobr">

<a href="" title="" class=" J_sort">
Latest Reply
</a>
</span>
</th>
</tr>
</thead>
<tbody>

<?php foreach($topics as $topic): ?>

<tr id="<?php echo $topic->nid; ?>" class="thread tOdd">
<td class="D_narrow D_checkColumn">

<div class="D_threadCheck">
<input type="checkbox" id="D_selectTarget" class="D_selectTarget read unpinned open" name="chk_15411132">
</div>

</td>
<td class="readState D_narrow">
<div class="D_statusIcons"> 
<span title="Mark this thread as 'unread'" style="cursor: pointer;" class="iconNew read" id="newMarker15411132">
    <img class="icon unread png" alt="Read" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme', 'fusion_teemeet').'/images'; ?>/icon_unread_off_chapter.png"></span><a href=""><img class="icon png" title="" alt="Unpinned" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme', 'fusion_teemeet').'/images'; ?>/icon_pinned_off_chapter.png"></a><a href=""><img class="icon png" title="Close this discussion to new replies" alt="Close to new replies" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme', 'fusion_teemeet').'/images/'; ?>/icon_closed_off_chapter.png"></a>
</div> 
</td>
<td class="D_subject">
<div class="fixImg">

<a class="messageTopic read" href="<?php echo url($group->path.'/node/'.$topic->nid); ?>"><?php echo $topic->title; ?><br></a>

</div>
</td>
<td>

<?php echo $topic->name; ?>

</td>
<td class="posts D_narrow"><?php echo $topic->comment_count; ?></td>
<td class="views D_narrow"><?php echo $topic->view_count; ?></td>
<td>

<?php echo format_date($topic->last_comment_timestamp); ?><br>

<span class="D_nobr D_less">by:

<?php echo $topic->last_comment_name; ?></span>

</td>
</tr>

<?php endforeach;?>
</tbody>
</table>
</form>
</div> 

</div>


</div>

	</div>
</div>