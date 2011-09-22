     <div id="C_metabox" class="D_box newBox">
          <div class="D_boxsection isNotDivided ">
            <!-- logo -->
            <div class="D_metasection groupPhotoMeta">
                <a href="<? echo $group->path ?>">
                <img src="/<? echo $group->field_logo[0]['filepath'] ?>" class="photo" />
                </a>
            </div>
            <div class="D_metasection location vcard"> 
              <div class="adr"> <a href="#http://www.meetup.com/cities/us/ca/sacramento/"> <span class="locality"><? echo $group->location['city']?></span>, <span class="region"> <? echo $group->location['province_name']?> </span> </a> <span class="displaynone country-name"><? echo $group->location['country_name']?></span> </div>
              <div class="founded"> Founded
                <? echo date('Y-m-d', $group->created)?> <br />
              </div>
            </div>
            <ul class="metaBox">
              <li class="clearfix linkable linewrappable"> <a href="<?php echo url($group->path.'/groupextension/allmembers/'.$group->nid); ?>">
                <p><? echo $group->field_member_alias[0]['value'] ?></p>
                <?php echo $group->og_member_count; ?> </a> </li>
              <li class="clearfix linkable"> <a href="<?php echo url($group->path.'/group/'.$group->nid.'/comments'); ?>">
                <p>Group reviews</p>
                <?php echo $group->comment_count ?> </a> </li>
              <li class="clearfix linkable"> <a href="http://www.meetup.com/SacSwim/" class="page-meetups">
                <p>Upcoming Meetups</p>
                即将到来的聚会数字 </a> </li>
              <li class="clearfix linkable"> <a href="http://www.meetup.com/SacSwim/events/past/" class="page-meetups">
                <p>Past Meetups</p>
                已完成聚会数 </a> </li>
              <li class="clearfix linkable"> <a href="http://www.meetup.com/SacSwim/events/calendar/" class="page-meetups">
                <p>Our calendar</p>
                <img src="http://img1.meetupstatic.com/89189456155501346896/img/date2.png" class="D_icon" /> </a> </li>
              <li class="clearfix linebreakable">
                <p>会员费Optional Donation</p>
                <div class="clearfix"> <a href="#" id="duesSignal" class="D_signal D_signal_appear_to_chapterDuesDialog"> $10.00 To pay Annual Meetup Fees </a> </div>
              </li>
            </ul>
            <div class="D_metasection organizerMeta D_metasectionWithBorder D_metasectionAfterMetaBox">
              <div class="photo"> <a href="http://www.meetup.com/SacSwim/members/10146567/"><img src="http://photos2.meetupstatic.com/photos/member/9/f/d/6/thumb_10660918.jpeg" alt="" class="orgboxImg" /></a> </div>
              <div class="D_metaLabel"> Organizers: </div>
              <div class="names"> <a href="http://www.meetup.com/SacSwim/members/10146567/" style="font-weight: bold;">Myron</a>, <a href="http://www.meetup.com/SacSwim/members/11618537/">Brad Schindler</a>, <a href="http://www.meetup.com/SacSwim/members/11107221/">helen</a>, <a href="http://www.meetup.com/SacSwim/members/14340731/">Jim </a>, <a href="http://www.meetup.com/SacSwim/members/11643989/">Lloyd</a>, <a href="http://www.meetup.com/SacSwim/members/3802831/">Paul</a>, <a href="http://www.meetup.com/SacSwim/members/10629083/">Paulo Medina</a>, <a href="http://www.meetup.com/SacSwim/members/13244138/">Shawn C Turner</a>, <a href="http://www.meetup.com/SacSwim/members/12134294/">Tom</a> <a href="http://www.meetup.com/SacSwim/members/?op=leaders">and 1 more&#0133;</a> </div>
              <div class="bottomStop"> <a href="http://www.meetup.com/SacSwim/members/?op=leaders">View The Leadership Team</a><br />
              </div>
            </div>
            <div class="D_metasection D_metasectionWithBorder D_metasectionAfterMetaBox" id="evnteditPref"> Only Organizers can add Meetups </div>
            <div class="D_metasection contact-us D_metasectionAfterMetaBox"> <a href="http://www.meetup.com/SacSwim/suggestion/" style="display:block;font-weight:normal;"><span class="sprite spritebg spritebg_right email_icon"></span>Contact us</a> </div>
          </div>
        </div>
        
        <!--捐赠弹出窗口-->
        <div id="chapterDuesDialog" class="D_dialog">
          <div  class="D_box">
            <div class="D_boxbody">
              <div  class="D_boxhead"> Optional Donation </div>
              <div class="D_boxsection ">
                <p class="amount"> $10.00 <span class="D_less">To pay Annual Meetup Fees</span> </p>
                <p> <strong>This covers:</strong> Donations welcome to help pay for this meetup account, Thank you !   (= </p>
                <p style="font-weight:bold;">Payment is accepted using:</p>
                <ul>
                  <li>PayPal</li>
                  <li> Cash or check
                    
                    - &ldquo;<em>Option to pay Coach Myron at swim meet or open water swim</em>&rdquo; </li>
                </ul>
                <p style="font-weight:bold;">Refunds are not offered for this Meetup.</p>
                <div class="footElement">
                  <div class="D_altAction"> <a href="#" id="duesDismiss" class="D_signal D_signal_dismiss_to_chapterDuesDialog">Close this</a> </div>
                </div>
              </div>
            </div>
          </div>
          <!--捐赠弹出窗口-->          
        </div>
        
        <!-- 捐赠列表 -->
        <div id="modbox_277217" class="D_box newBox D_sponsors M_sponsorship_badge">
          <div  class="D_boxhead">
            <h2 class="D_dropdown"> <a href="http://www.meetup.com/SacSwim/sponsors/" class="bodyColor"> <span class="sponsorModule-head"> Our Sponsors </span> </a> </h2>
          </div>
          <div class="D_boxsection ">
<? 
    $sponsors = sponsor_list($group); 
    $i = count($sponsors);
    $class = '';
    foreach($sponsors as $key => $sponsor):
        if($i == $key + 1) $class = 'last';
?>
            <div class="sponsorSlot <? echo $class ?>">              
              <h4 class="sponsorName"> <a href="<? echo $sponsor->field_sponsor_website[0]['value']?>" target="_blank"><? echo $sponsor->title?></a> </h4>
              <p></p>
            </div>
<?  endforeach; ?>
          </div>
          <div class="D_boxfoot"> </div>
        </div>
        
        <!-- -->
        <!--div id="modbox_277217" class="D_box newBox D_perks M_perks_badge">
          <div  class="D_boxhead">
            <h2> <a class="bodyColor" href="http://www.meetup.com/SacSwim/sponsors/#membership-perks">Membership Perks</a> </h2>
          </div>
          <div class="D_boxsection ">
            <h4 class="sponsor-callout">Make us an offer!</h4>
            <p>Support us and get exposure.</p>
          </div>
          <div class="D_boxfoot"> <a href="http://www.meetup.com/SacSwim/sponsor/" class="D_roundedButton omnCamp omnrg_somg">Offer a Perk &rarr;</a> </div>
        </div-->
        
        <!-- 关键词列表 -->
        <div id="modbox_2541468" class="D_box newBox C_navBadge C_topicInfo">
          <div  class="D_boxhead">
            <h2>This Meetup is about&hellip;</h2>
          </div>
          <div class="D_boxsection leftNavTopics">
            <div id="left-side-topics">
              <div id="topicList1">
              <? foreach($group->taxonomy as $term): //关键词调用 ?>
              <span class="meetup-topic"><a href="#" class="topic-id-17866 topic-link J_onClick  topic-info-over"><? echo $term->name ?></a></span>
              <? endforeach; ?>
              </div>
              <div id="topic-info"></div>
            </div>
          </div>
        </div>
        
        <!-- 相关小组 -->
        <!--div id="meetup_serendipity" class="D_box newBox">
          <div class="serendipity">
            <div class="serendipityBody">
              <div class="serendipityLabel"> <a href="http://www.meetup.com/"><img src="http://img1.meetupstatic.com/568773521523428845213/img/logo_41x27.png" alt="" /></a> <strong>Other nearby<br />
                Meetups</strong> </div>
              <div class="D_splain"> <a href="" class="splainOver sprite sprite_action information_sm_icon">Why these groups?</a>
                <div id="meetup_serendipity_splain" class="splainBox D_swap_out jsStartHidden">
                  <div class="splainBoxPointer"></div>
                  <div class="splainBoxContent">
                    <div class="D_dialog_close splainClose">
                      <div>x</div>
                    </div>
                    <p>The Meetup Groups shown here are topically similar to <strong>Sacramento Swimming Enthusiasts</strong>.</p>
                    <p>Groups are more likely to be displayed here if they:</p>
                    <ul>
                      <li>have a Meetup scheduled</li>
                      <li>have a high rating</li>
                      <li>have a group photo</li>
                      <li>are "public" and not "private"</li>
                      <li>have shown they are likely to stick around (older than 30 days)</li>
                    </ul>
                  </div>
                </div>
              </div>
              <ul class="D_summaryList">
                <li class="D_narrow">
                  <div class="D_image"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/elk-grove-bootcamp/"> <img class="thumbphoto" src="http://photos1.meetupstatic.com/photos/event/c/8/a/9/thumb_3171369.jpeg" alt="" title=""  /> </a> </div>
                  <div class="D_info">
                    <div class="groupName"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/elk-grove-bootcamp/">Elk Grove Bootcamp - Ladies Only &#034;Booty Boot Camp&#034;</a> </div>
                    <p>280 Booty Boot Champs</p>
                  </div>
                </li>
                <li class="D_narrow">
                  <div class="D_image"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/20-30somethingwomen/"> <img class="thumbphoto" src="http://photos1.meetupstatic.com/photos/event/7/2/5/7/thumb_41249271.jpeg" alt="" title=""  /> </a> </div>
                  <div class="D_info">
                    <div class="groupName"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/20-30somethingwomen/">The 20&amp;30-Somet<img src="http://img1.meetupstatic.com/img/clear.gif" width="0" class="brImage" alt="" />hing Women&#039;s Club</a> </div>
                    <p>329 20&30-Something Ladies</p>
                  </div>
                </li>
                <li class="D_narrow last">
                  <div class="D_image"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/sacvegansociety-org/"> <img class="thumbphoto" src="http://photos1.meetupstatic.com/photos/event/7/2/b/b/thumb_21149371.jpeg" alt="" title=""  /> </a> </div>
                  <div class="D_info">
                    <div class="groupName"> <a class="omnCamp omngj_sj35" href="http://www.meetup.com/sacvegansociety-org/">SACRAMENTO VEGAN SOCIETY</a> </div>
                    <p>478 Veggie and Animal Lovers</p>
                    <p><em>Next Meetup:</em><br/>
                      Saturday, Aug 06 </p>
                  </div>
                </li>
              </ul>
              <a href="http://www.meetup.com/cities/us/ca/sacramento/" class="D_roundedButton"> Find more Meetup Groups<br />
              near Sacramento </a> </div>
          </div>
        </div--> 