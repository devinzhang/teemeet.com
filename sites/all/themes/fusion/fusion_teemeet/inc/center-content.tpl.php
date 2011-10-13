<? if($group->status ): ?>
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
            <p><strong><a class="showJoin J_signupLink J_onClick inAlienNudgeSignup omnCamp omnrg_ghurf" href="og/subscribe/<? echo $group->nid ?>">Join Meetup here</a>.</strong></p>
          </div>
        </div>
        <!--div class="D_boxsection tos"> By clicking the "Sign up using Facebook" button above, you agree to Meetup's <a href="http://www.meetup.com/terms/" target="_blank">Terms of Service</a> </div-->
      </div>
    </div>
  </div>
</div>

<div class="v4-gh-main-column">
  
  <? echo $content_bottom; ?>

</div>


<div class="v4-gh-last-column">
  <div id="modbox_10447071" class="D_box newBox ghome-feed-box">
    <? echo $sidebar_last; ?> 
  </div>
</div>
<div style="clear:both; font-size:0;line-height:0;">&nbsp;</div>
<? else : ?>
<div id="moduleBoxParent" class="D_box newBox X_alien_group_info">
	<div class="D_box calltoaction variant_fbonly">
      <div class="D_boxbody">
        <div class="D_boxhead">
          <h2>当前小组处于关闭状态</h2>
          <p style="font-size: 10px;"></p>
        </div>
        <div class="D_boxsection isFacebook">
         
        </div>
		<?php 
			global $user;
			if($user->uid == $group->uid):
		?>
		   
	   <div class="D_boxsection tos"> 如果您是小组的组织者，请付费开通小组</div>
	   <?php else: ?>
	   <div class="D_boxsection tos"> 小组已经关闭，您可以选择继续留在这个小组一遍以后小组回复<br>
	   或者，您可以选择<?php print l('退出这个小组','og/unsubscribe/'.$group->nid.'/'.$usr->uid);?>
	   </div>
	   <? endif; ?>
	   
      </div>
    </div>
</div>


<? endif; ?>  <!--  if one group didn't published -->