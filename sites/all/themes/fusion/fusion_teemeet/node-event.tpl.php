<? if(!$teaser): ?>
<div id="eventdets" class="D_box new" >
  <div class="D_boxbody"> <span itemprop="eventType" style="display:none;"><?php print t('Meetup'); ?></span>
    <div class="D_boxhead featured-detail-header">
      <div class="featured-callout">
        <div class="featured-callout-wrap">
          <div class="featured-text"> <?php print t('Featured Meetup'); ?> </div>
          <div class="featured-pointer top"></div>
          <div class="featured-pointer bottom"></div>
        </div>
        <div class="featured-ribbon"></div>
      </div>
      <!-- endFeature -->
      <div id="event-title" class="line" >
        <h1><? echo $title ?></h1>
		<!-- add admin menu -->
		<?php global $user; if(($user->uid ==1) || ($user->uid ==$node->uid) ): ?>
		<ul class="D_actions">
			<li class="canDo">
			<a class="sprite sprite_action pencil_icon" href="<?php print url($GLOBALS['current_group']->path.'/node/'.$node->nid.'/edit'); ?>"><?php echo t('Edit');?></a>
			</li>
			
			<?php if($node->signup_status): ?> 
			<li class="canDo">
			<a class="sprite sprite_action email_edit_icon" href="">Cancle</a>
			</li>
			<?php endif; ?>

			<li class="canDo">
			<a href="">Feature</a>
			</li>
			
			<li class="canDo">
			<a href="<?php print url($GLOBALS['current_group']->path.'/node/'.$node->nid.'/signups/broadcast'); ?>">发送邮件</a>
			</li>
			<?php if(!$node->signup_status): ?> <!-- only this event was closed, then need to have a 出勤表 -->
			<li class="canDo">
			<a href="<?php print url($GLOBALS['current_group']->path.'/teemeet/checkout/'.$node->nid); ?>">出勤表</a>
			</li>
			<?php endif; ?>
			
		</ul>
		<?php endif; ?>
      </div>
    </div>
    <div class="D_boxsection isSorted ">
      <div class="line event-info">
        <div class="unit event-section">
          <div id="event-when" class="event-stack event-stack-first event-when complete">
            <div class="event-stack-icon sprite-event-stack spr-event-stack-calendar-gr"></div>
            <div class="clearfix event-stack-display" id="event-when-display">
              <p class="headline"><? echo $event['start'] ?></p>              
              <div id="event-when-suggest" class="suggested-by"><?php print t('Selected By'); ?>: <a href="" title="<?php print $node->name;?>"><?php print $node->name;?></a></div>
            </div>
          </div>
          <div id="event-where" class="event-stack event-where complete" >
            <div class="event-stack-icon sprite-event-stack spr-event-stack-location-gr"></div>
            <div class="clearfix event-stack-display" id="event-where-display"> <span itemprop="locality" itemscope="" itemtype="http://data-vocabulary.org/Organization">
              <p class="headline" > <a href="" class="J_dialogPopup" target="blank" data-dialogpopupid="eventvenue"><?php print $node->location['additional']; ?></a> </p>
              <p class="subtext" > <span itemprop="stress-address"><?php print $node->location['street']; ?></span>, <span itemprop="locality"><?php print $node->location['city']; ?></span>, <span itemprop="region"><?php print $node->location['province_name']; ?></span> <span class="event-map-link"></span> </p>
              </span>
              <div class="event-where-extra"> <?php print $node->event_extra['how_find_us']; ?> </div>
              <div id="event-where-suggest" class="suggested-by"> <?php print t('Selected By'); ?>: <a href="" title="Myron"><?php print $node->name;?></a> </div>
            </div>
          </div>
          <!--div id="event-why" class="event-stack event-why-desc">
            <div class="event-stack-display event-stack-display-no-padding"> "<span id="eventWhy">FUN OPEN WATER SWIMMING ! ENJOY SWIMMING IN A LAKE WITH A FRIENDLY SUPPORTIVE GROUP !</span>" </div>
          </div-->
          <div id="event-desc" class="event-desc">
          <? echo $node->content['event']['#value']; ?>
          </div>
          
          <ul class="resetList event-comments" id="idea-comments">
<?
    $comments = comment_list($node);
	if(!empty($comments)):
	foreach($comments as $comment):
?>
            <li class="feed-item-small clearfix last"> 
              <a href="<?php print url($GLOBALS['current_group']->path.'/member/'.$comment->uid.'/ingroup/'.$GLOBALS['current_group']->nid);?>" class="mem-photo-small memberinfo-widget" title="<?php print $comment->name; ?>" data-memberid="<?php print $comment->uid; ?>"> <img src="" alt="Myron" style="display: inline; " /> </a>
              <div class="feed-item-content-small idea-comment-block"> <a href="<?php print url($GLOBALS['current_group']->path.'/member/'.$comment->uid.'/ingroup/'.$GLOBALS['current_group']->nid);?>" title="<?php print $comment->name; ?>" class="memberinfo-widget" data-memberid="10146567"> <?php print $comment->name; ?> </a>
                <p><?php print $comment->comment; ?></p>
                <div class="feed-item-actions D_empty D_less"> <?php format_date($comment->timestamp); ?> <span id="likewidget_34061471" class="commentCountBadge"></span> </div>
              </div>
            </li>
<?
    endforeach;
	endif;
?>            
            <li class="feed-item-small commentbox-nudge" id="commentbox_">
             <?php print $node->content['event_comment_form']['#value']; ?>
            </li>
          </ul>
          
        </div>
        <!-- end event-section -->
        <div class="unit lastUnit event-attendee-section">
          <div id="rsvp-control" class="rsvp-box-returns" >
		  <?php print $node->content['rsvp_form']['#value']; ?>
           
          </div>
          <!-- end rsvp-control -->
          <div class="event-who rounded-corner-top" id="eventcount_<?php print $node->nid;?>"> 
			<span> <span class="rsvp-count-number rsvp-count-going">
			<?php print $node->signup_total; ?></span> 参加者 </span> 
			<?php if($node->event_extra['attendee_limit']) : ?>
			<div class="rsvp-meta-info">
				<p> <?php print ($node->event_extra['attendee_limit']- $node->signup_total) ?> 空位 </p>
			</div>
			<?php endif; ?>
			</div>
			<?php print $node->content['signup_users']['#value'];?>
		 <div id="no-list" class="jsStartHidden">
            <div class="rsvp-header"> <span id="no-list-count">0</span> not going <span style="float:right;font-size:0.83em;">(<a href="#" id="see-all-no-list">see all</a>)</span> </div>
            <ul class="resetList no-display" id="rsvp-list-no">
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<? else: ?>

<? endif; ?>



