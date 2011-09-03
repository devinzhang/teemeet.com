<div class="D_box" id="events-list-module">
  <h1 id="welcome-message" class=""> Welcome, <? echo $GLOBALS['current_group']->field_member_alias[0]['value'] ?>! </h1>
  <a href="#" id="lma-suggest" class="ghsprite plus_bk for-non-member showJoin J_signupLink J_onClick">Join and suggest a new Meetup</a>
  <div id="lma" class="closed">
    <ul class="resetList clearfix" id="events-nav">
      <li class=" selected"><a href="http://www.meetup.com/SacSwim/" id="upcomingTab" class="page-meetups" >Upcoming <span class="tabcount">14</span></a></li>
      <li class=""><a href="http://www.meetup.com/SacSwim/events/past/" id="pastTab" class="page-meetups" >Past</a></li>
      <li class=""><a href="http://www.meetup.com/SacSwim/events/calendar/" class="page-meetups" >Calendar</a></li>
    </ul>
  </div>
  <!-- end lma -->
  <ul id="ajax-container" class="resetList event-list clearfix">
    <? echo $rows ?>
    <li class="event-list-more" id="centerColMeetupListRearguard"> <a href="http://www.meetup.com/SacSwim/?page=1" class="page-meetups D_roundedButton caps" >More Meetups <span class="feed-pager-link"></span></a> </li>
  </ul>
  <!-- end ajax-container -->
</div>
