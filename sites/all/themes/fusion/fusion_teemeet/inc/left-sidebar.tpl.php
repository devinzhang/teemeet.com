<div id="C_metabox" class="D_box newBox">
          <div class="D_boxsection isNotDivided ">
            <!-- logo -->
            <div class="D_metasection groupPhotoMeta">
            <? if($group->field_logo[0]['filepath']): ?>
                <a href="<? echo $group->path ?>">
                <img width="180px" height="180px" src="/<? echo $group->field_logo[0]['filepath'] ?>" class="photo" />
                </a>
            <? endif; ?>
            </div>
            <div class="D_metasection location vcard"> 
              <div class="adr"> <a href="/search/node/<? echo $group->location['city'] . ' ' . $group->location['province_name']; ?>"> <span class="locality"><? if($group->location['city']): echo $group->location['city'] . ','; endif; ?></span> <span class="region"> <? echo $group->location['province_name']?> </span> </a> <span class="displaynone country-name"><? echo $group->location['country_name']?></span> </div>
              <div class="founded"> 创建于
                <? echo date('Y-m-d', $group->created)?> <br />
              </div>
            </div>
            <ul class="metaBox">
              <li class="clearfix linkable linewrappable"> <a href="<?php echo groupfront_url($group->path.'/groupextension/allmembers/'.$group->nid); ?>">
                <p><? echo $group->field_member_alias[0]['value'] ?></p>
                <?php echo $group->og_member_count; ?> </a> </li>
              <li class="clearfix linkable"> <a href="<?php echo groupfront_url($group->path.'/group/'.$group->nid.'/comments'); ?>">
                <p><? echo t('Group reviews'); ?></p>
                <?php echo $group->comment_count ?> </a> </li>
              <li class="clearfix linkable"> 
                <p><?php print t('Upcoming Meetups'); ?></p>
                <a href="<?php echo groupfront_url('teemeetevent/upcoming/' . $group->nid); ?>"><? echo $group->meetup['upcoming']; ?></a>  </li>
              <li class="clearfix linkable"> 
                <p><?php print t('Past Meetups'); ?></p>
                <a href="<?php echo groupfront_url('teemeetevent/past/' . $group->nid); ?>"><? echo $group->meetup['past'] ;?></a>  </li>
                

            </ul>
            <div class="D_metasection organizerMeta D_metasectionWithBorder D_metasectionAfterMetaBox">
            </div>
            
            
            <div class="D_metasection contact-us D_metasectionAfterMetaBox">
             <a href="/<? echo $group->path ?>/groupextension/<? echo $group->nid ?>/suggest" style="display:block;font-weight:normal;"><span class="sprite spritebg spritebg_right email_icon"></span>
                <? echo t('Contact us'); ?>
             </a>
            </div>
          </div>
        </div>
        
        <!-- 捐赠列表 -->
        <div class="D_box newBox D_sponsors M_sponsorship_badge">
          <div  class="D_boxhead">
            <h2 class="D_dropdown"> <a href="/<? echo $group->path; ?>/sponsors/" class="bodyColor"> <span class="sponsorModule-head"> <? echo t('Our Sponsors')?> </span> </a> </h2>
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
        
        
        <!-- 关键词列表 -->
        <div id="modbox_2541468" class="D_box newBox C_navBadge C_topicInfo">
          <div  class="D_boxhead">
            <h2><?php print t('This Meetup is about');?>&hellip;</h2>
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
        
