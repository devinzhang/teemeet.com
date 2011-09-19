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
    <script type="text/javascript">var name = 'trax_reviewjoin';var val  = 'uuid=8a1ad8d3-9578-4286-a0b3-8cad1df32ef2&v=reviews&p=grouphome&s=0&_=b46874';var exp  = new Date(); exp.setSeconds( exp.getSeconds() + 14400 );var dom  = document.domain.indexOf('.meetup.com') > -1 ? '.meetup.com' : document.domain;document.cookie = name + '=' + val + ';expires=' + exp.toGMTString() + '; path=/; domain=' + dom;var cookie = getCookie(name);var d = doAjax( '/api/', {method: 'storeStart',arg_uuid: (cookie) ? parseQueryString(cookie)['uuid'] : '',arg_process: 'reviewjoin',arg_session: '',arg_page: 'grouphome',arg_score: '0',arg_variant: 'reviews',arg_memberId: '0',arg_chapterId: '1667458'});</script>
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
          <h2>Join this Meetup Group</h2>
          <p style="font-size: 10px;">You can join groups on Meetup using your Facebook account.</p>
        </div>
        <div class="D_boxsection isFacebook">
          <div class="isFacebook_button">
            <p>Not on Facebook? <strong><a class="showJoin J_signupLink J_onClick inAlienNudgeSignup omnCamp omnrg_ghurf" href="http://www.meetup.com/malibuhorsesinc/join/">Join Meetup here</a>.</strong></p>
          </div>
        </div>
        <div class="D_boxsection tos"> By clicking the "Sign up using Facebook" button above, you agree to Meetup's <a href="http://www.meetup.com/terms/" target="_blank">Terms of Service</a> </div>
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
