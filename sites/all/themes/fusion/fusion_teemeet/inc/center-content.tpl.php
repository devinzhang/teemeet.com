<div id="moduleBoxParent" class="D_box newBox X_alien_group_info">
  <div>
    <div class="D_boxsection isNotDivided ">
      <div>
        <div class="groupDesc clearfix" id="groupDesc">
<? echo $group->content['og_mission']['#value']; ?>
        </div>
      </div>
    </div>
    <!-- end for about -->
    
    <div class="D_boxsection ">
      <div class="line" id="alien-group-review">
<? 
  
  for($i = 0; $i < 2; $i++):
    $comment = array_shift($group->featured_comments);
    if(!empty($comment)):
        $class = ($i == 0) ? 'first' : 'last';
?>      
        <div class="unit size1of2">
          <div class="D_item alien-group-review-col alien-group-review-col-<? echo $class?> clearfix">
            <div class="D_image"> 
              <a href="<? echo url('user/' . $comment['uid'])?>" class="memberinfo-widget displayinlineblock" > <img src="<? echo $comment['picture']; ?>" alt="" /> </a>
            </div>
            <span class="D_quot">"</span> <? echo $comment['comment']?> <a href="#" class="J_onClick blurb-more">...</a> <br>
            -<a href="<? echo url('user/' . $comment['uid'])?>" class="memberinfo-widget" ><? echo $comment['name']; ?></a><!--img src="http://img1.meetupstatic.com/img/clear.gif" width="0" class="brImage" alt="" /--> </div>
        </div>        
<? 
    endif;
  endfor; ?>        
      </div>
    </div>
    <!-- end for comment-->
    <div class="D_box calltoaction variant_fbonly">
      <div class="D_boxbody">
        <div class="D_boxhead">
          <h2><? echo t('加入这个小组'); ?></h2>
          <!--p style="font-size: 10px;">You can join groups on Meetup using your Facebook account.</p-->
        </div>
        <div class="D_boxsection isFacebook">
          <div class="isFacebook_button">
		  <?php global $user; if($user->uid <1):?>
            <p><strong><a class="showJoin J_signupLink J_onClick inAlienNudgeSignup omnCamp omnrg_ghurf" href="<? echo url('user/register'); ?>"><?php print t('Join Teemeet here'); ?></a>.</strong></p>
          <?php else:?>
		   <p><strong><a class="showJoin J_signupLink J_onClick inAlienNudgeSignup omnCamp omnrg_ghurf" href="og/subscribe/<? echo $group->nid ?>"><?php print t('Join Teemeet here'); ?></a>.</strong></p>
		  <?php endif; ?>
		  </div>
        </div>
        <!--div class="D_boxsection tos"> By clicking the "Sign up using Facebook" button above, you agree to Meetup's <a href="http://www.meetup.com/terms/" target="_blank">Terms of Service</a> </div-->
      </div>
    </div>
  </div>
</div>

<div class="v4-gh-main-column">
  <div class="D_box" id="events-list-module">
      <h1 id="welcome-message" class="">  <? echo t('Welcome, ').$GLOBALS['current_group']->field_member_alias[0]['value'] ?>! </h1>
      <?php if(og_is_group_member($GLOBALS['current_group']->nid)): ?>
	  <a href="#lma" id="lma-suggest" class="ghsprite plus_bk for-non-member showJoin J_signupLink J_onClick"><?php print t('Join and suggest a new Meetup'); ?></a>
      <script>
      $(document).ready(function(){
          $('#lma-suggest').click(function(){
              $.get("/ajax?func=scheduleMeetup&gid=<? echo $group->nid?>", function(data){
                  $('#lma').html(data);
              });         
          });
            
      })
      </script>
      </script>
      <div id="lma" class="closed">
    
      </div>
      <!-- end lma -->
	  <?php endif; ?>
      <ul id="ajax-container" class="resetList event-list clearfix">
        <? echo $content_group; ?>
        <!--li class="event-list-more" id="centerColMeetupListRearguard"> <a href="http://www.meetup.com/SacSwim/?page=1" class="page-meetups D_roundedButton caps" >More Meetups <span class="feed-pager-link"></span></a> </li-->
      </ul>
      <!-- end ajax-container -->
  </div>
  <? echo $content_bottom; ?>

</div>


<div class="v4-gh-last-column">
  <div id="modbox_10447071" class="D_box newBox ghome-feed-box">
    <? echo $sidebar_last; ?> 
  </div>
</div>
<div style="clear:both; font-size:0;line-height:0;">&nbsp;</div>
