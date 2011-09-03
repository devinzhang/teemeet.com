<? if(!$teaser): ?>
<div id="eventdets" class="D_box new" >
  <div class="D_boxbody"> <span itemprop="eventType" style="display:none;">Meetup</span>
    <div class="D_boxhead featured-detail-header">
      <div class="featured-callout">
        <div class="featured-callout-wrap">
          <div class="featured-text"> Featured Meetup </div>
          <div class="featured-pointer top"></div>
          <div class="featured-pointer bottom"></div>
        </div>
        <div class="featured-ribbon"></div>
      </div>
      <!-- endFeature -->
      <div id="event-title" class="line" >
        <h1><? echo $title ?></h1>
      </div>
    </div>
    <div class="D_boxsection isSorted ">
      <div class="line event-info">
        <div class="unit event-section">
          <div id="event-when" class="event-stack event-stack-first event-when complete">
            <div class="event-stack-icon sprite-event-stack spr-event-stack-calendar-gr"></div>
            <div class="clearfix event-stack-display" id="event-when-display">
              <p class="headline"><? echo $event['start'] ?></p>              
              <div id="event-when-suggest" class="suggested-by">Selected By: <a href="http://www.meetup.com/SacSwim/members/10146567/" title="Myron">Myron</a></div>
            </div>
          </div>
          <div id="event-where" class="event-stack event-where complete" >
            <div class="event-stack-icon sprite-event-stack spr-event-stack-location-gr"></div>
            <div class="clearfix event-stack-display" id="event-where-display"> <span itemprop="locality" itemscope="" itemtype="http://data-vocabulary.org/Organization">
              <p class="headline" > <a href="http://www.meetup.com/SacSwim/venue/739746/?eventId=22126241&amp;popup=true" class="J_dialogPopup" target="blank" data-dialogpopupid="eventvenue">Beals Point State Park</a> </p>
              <p class="subtext" > <span itemprop="stress-address">7806 Folsom Auburn Rd</span>, <span itemprop="locality">Folsom</span>, <span itemprop="region">CA</span> <span class="event-map-link">(<a href="http://maps.google.com/maps?q=7806+Folsom+Auburn+Rd%2C+Folsom%2C+CA" target="_blank">map</a>)</span> </p>
              </span>
              <div class="event-where-extra"> Please park to the left of the Bathrooms/Snackbar buildings </div>
              <div id="event-where-suggest" class="suggested-by"> Selected By: <a href="http://www.meetup.com/SacSwim/members/10146567/" title="Myron">Myron</a> </div>
            </div>
          </div>
          <!--div id="event-why" class="event-stack event-why-desc">
            <div class="event-stack-display event-stack-display-no-padding"> "<span id="eventWhy">FUN OPEN WATER SWIMMING ! ENJOY SWIMMING IN A LAKE WITH A FRIENDLY SUPPORTIVE GROUP !</span>" </div>
          </div-->
          <div id="event-desc" class="event-desc">
          <? echo $content?>
          </div>
          
          <ul class="resetList event-comments" id="idea-comments">
<?
    $comments = comment_list($node);
    //while(1):
?>
            <li class="feed-item-small clearfix last"> 
              <a href="http://www.meetup.com/SacSwim/members/10146567/" class="mem-photo-small memberinfo-widget" title="Myron" data-memberid="10146567"> <img src="" alt="Myron" style="display: inline; " /> </a>
              <div class="feed-item-content-small idea-comment-block"> <a href="http://www.meetup.com/SacSwim/members/10146567/" title="Myron" class="memberinfo-widget" data-memberid="10146567"> Myron </a>
                <p>Hello All,  Fleet Feet Wetsuit Demo, Swim, BBQ, Lecture, PDF uploaded for this event !  Check it out !</p>
                <div class="feed-item-actions D_empty D_less"> Posted Friday at 12:46 PM <span id="likewidget_34061471" class="commentCountBadge"></span> </div>
              </div>
            </li>
<?
    //if(!next($comments)) break;
    //endwhile;
?>            
            <li class="feed-item-small commentbox-nudge" id="commentbox_">
              <p class="commentPostExplain"> <a href="#">Join</a> this Meetup to add comments or questions. </p>
            </li>
          </ul>
          
        </div>
        <!-- end event-section -->
        <div class="unit lastUnit event-attendee-section">
          <div id="rsvp-control" class="rsvp-box-returns" >
            <div id="rsvpBox" class="">
              <form method="POST" action="http://www.meetup.com/SacSwim/join/">
                <h3 class="rsvp-box-block"> Will you attend? </h3>
                <div class="rsvp-box-section"> <a href="#" class="D_submit_grad J_signupLink J_onClick omnCamp omnrg_joinus topNavJoinus join_and_rsvp">Join us!</a> <span class="rsvp-callout-flipcard days"> <span class="rsvp-callout-flipcard-ring"></span> <span class="rsvp-callout-count"><? ?> </span> <span class="rsvp-callout-leftcopy"> days<br /> left </span> </span> </div>
                <input type="hidden" name="returnUri" value="http://www.meetup.com/SacSwim/events/22126241/" />
              </form>
            </div>
          </div>
          <!-- end rsvp-control -->
          <div class="event-who rounded-corner-top" id="eventcount_22126241"> <span> <span class="rsvp-count-number rsvp-count-going">13</span> attending </span> </div>
          <ul class="resetList" id="rsvp-list">
            <li class="memberinfo-widget feed-item-small clearfix rsvp-list" id="rsvp_10146567"> <a href="http://www.meetup.com/SacSwim/members/10146567/" id="image_10146567" class="mem-photo-small mem-photo-background-60 square-50" data-src="http://photos2.meetupstatic.com/photos/member/9/f/d/6/thumb_10660918.jpeg" style="background-image: url(http://photos2.meetupstatic.com/photos/member/9/f/d/6/thumb_10660918.jpeg); display: block; "><img src="http://img1.meetupstatic.com/6297749526911517292/img/blank.gif" alt=""></a>
              <div class="feed-item-content-small">
                <div class="event-host">
                  <div class="event-host-wrap">
                    <div class="event-host-text"> Event Host </div>
                    <div class="event-host-pointer top"></div>
                    <div class="event-host-pointer bottom"></div>
                  </div>
                  <div class="event-host-ribbon"></div>
                </div>
                <a href="http://www.meetup.com/SacSwim/members/10146567/" class="mem-name"><? echo $author ?></a>
                <div class="event-role"> Organizer </div>
                <div class="rsvp-comment"> Fleet Feet Wetsuit Demo ande Sales, DEEP discounts on Wetsuits and other products, swim , BBQ and lectures from runner and Physical Therapists.  Please bring a chair , fun fun ! </div>
              </div>
            </li>
            <li class="memberinfo-widget feed-item-small clearfix rsvp-list" id="rsvp_11643989" > <a href="http://www.meetup.com/SacSwim/members/11643989/" id="image_11643989" class="mem-photo-small mem-photo-background-60 square-50" data-src="http://photos2.meetupstatic.com/photos/member/5/0/7/1/thumb_10160593.jpeg" style="background-image: url(http://photos2.meetupstatic.com/photos/member/5/0/7/1/thumb_10160593.jpeg); display: block; "><img src="http://img1.meetupstatic.com/6297749526911517292/img/blank.gif" alt=""></a>
              <div class="feed-item-content-small">
                <div class="event-host">
                  <div class="event-host-wrap">
                    <div class="event-host-text"> Event Host </div>
                    <div class="event-host-pointer top"></div>
                    <div class="event-host-pointer bottom"></div>
                  </div>
                  <div class="event-host-ribbon"></div>
                </div>
                <a href="http://www.meetup.com/SacSwim/members/11643989/" class="mem-name">Lloyd</a>
                <div class="event-role"> Assistant Organizer </div>
                <div class="rsvp-comment"> </div>
              </div>
            </li>
            
            <li class="memberinfo-widget feed-item-small clearfix rsvp-list last rounded-corner-bottom" id="rsvp_19838011" data-memberid="19838011"> <a href="http://www.meetup.com/SacSwim/members/19838011/" id="image_19838011" class="mem-photo-small mem-photo-background-60 square-50" data-src="http://photos2.meetupstatic.com/photos/member/d/6/c/f/thumb_18294991.jpeg" style="background-image: url(http://photos2.meetupstatic.com/photos/member/d/6/c/f/thumb_18294991.jpeg); display: block; "><img src="http://img1.meetupstatic.com/6297749526911517292/img/blank.gif" alt=""></a>
              <div class="feed-item-content-small"> <a href="http://www.meetup.com/SacSwim/members/19838011/" class="mem-name">Kirsten Bratti Lewis</a>
                <div class="event-role"> </div>
                <div class="D_less rsvp-guests"> </div>
                <div class="rsvp-comment"> </div>
              </div>
            </li>
            
          </ul>
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



