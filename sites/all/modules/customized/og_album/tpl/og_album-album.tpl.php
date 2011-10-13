<div class="D_boxhead">	
<div class="D_backTo"><?php echo l(t('Back to all photo albums'),$GLOBALS['current_group']->path.'/album/ingroup/'.$album->album['gid']);?></div>
<h1>
<?php echo $album->title; ?>

</h1>

<ul id="albumActions" class="D_actions">

<li class="canDo makeRelative">


<a id="add-photo-action" class="colorbox-inline sprite sprite_action photo_add_icon" title="Add photos" href="?width=600&height=300&inline=true#add-album-photo"><?php echo t('Add photos'); ?></a>

</li>

<?php if($is_album_admin): ?>
<li class="canDo">
<a class="sprite sprite_action pencil_icon" title="Rename album" href="">Rename album</a>
</li>
<li class="canDo">
<a class="sprite sprite_action bin_icon" title="Delete album" href="">Delete album</a>
</li>
<li class="canDo">
<a class="sprite sprite_action photos_icon" title="Reorder album" href="">Reorder album</a>
</li>

<?php endif; ?>

</ul>

</div>

<!--body part -->
<div class="clearfix" id="D_photoGallery_wrapper">
    <div id="D_photoGallery_photoCaptionWrapper">
    <span id="D_photoGallery_photoCaption"><?php echo $first_node->title;?><?php if($is_album_admin){echo '<div id="node-title-ctrl"></div>';} ?></span>
    <?php if($is_album_admin): ?>
 <!--   <a class="D_inlineAction D_signal D_signal_appear_to_D_photoGallery_editCaptionDialog" id="D_photoGallery_editCaptionLink" href="">
    Edit caption
    </a>

    <a class="D_inlineAction D_signal D_signal_appear_to_D_photoGallery_deleteCaptionDialog" id="D_photoGallery_deleteCaptionLink" href="">Delete caption</a>
-->	
    <?php endif; ?>
    </div>
</div>
<!-- next row -->
<div class="clearfix" id="D_photoGallery_actions_container">
<ul id="D_photoGallery_actions">
<li class="first">

<button class="prev">&lt;&lt;</button>
<button class="next">&gt;&gt;</button>

<span id="D_photoGallery_currentPhotoCounter">
<span id="sequence">1</span> <?php echo t('of'); ?> <?php echo $album->album['photo_size']; ?>
</span>
</li>
<li><a href="<?php global $base_url; echo $base_url.'/'.$first_node->photo['filepath']; ?>" rel="example1" title=""><?php print t('Play slideshow');?> </a>
</li>

<!--<li><a class="D_signal D_signal_appear_to_D_photoGallery_allSizesDialog" id="D_photoGallery_allSizes" href="">All sizes</a></li> -->

<li class="D_dropdown" id="D_photoGallery_orgControlsWrapper"><span><a class="colorbox-inline J_onClick D_dropdownToggler D_dropdownParent" href="?width=300&height=100&inline=true#photo_controls">'.<?php print t('Use photo as');?>.'</a></span>
<?php print $set_photo_form; ?>

</li>

<li><a class="D_signal D_signal_appear_to_D_photoGallery_confirmDeletePhotoDialog" href="">删除</a></li>

<li class="D_dropdown" id="D_photoGallery_movePhoto">
<span><a class="J_onClick D_dropdownToggler D_dropdownParent" id="D_photoGallery_movePhotoToggler" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/2900971/#">
Move
</a></span>
<div class="jsStartHidden D_dropdownContent" id="D_photoGallery_movePhotoControl">
<p class="header">Choose album</p>
<p class="pager"><a onclick="return false;" class="jsStartHidden" id="D_photoGallery_movePhotoPrev" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/2900971/#">Previous</a></p>
<p class="spinner" style="text-align: center;"><img ;="" src="./Photos - Beijing Soccer Lovers (Beijing) - Meetup_files/spinner_ffffff.gif"></p>
<ul id="D_photoGallery_movePhotoThumbList"></ul>
<p class="pager"><a onclick="return false;" class="jsStartHidden" id="D_photoGallery_movePhotoNext" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/2900971/#">Next</a></p>
</div>
</li>
</ul>

<div class="D_photoShare">
<div class="D_dropdown D_shareThis">
	
	<a class="J_onClick D_dropdownToggler D_dropdownParent hasIcon" id="shareThis" href="javascript:;"><span class="sprite sprite_action_right drop_down">Share<br><img style="height: 12px;" class="D_icon J_onClick D_dropdownToggler" src="./Photos - Beijing Soccer Lovers (Beijing) - Meetup_files/share_facebook_twitter.png"></span></a>
	<ul id="shareThisDropdown" class="jsStartHidden D_dropdownContent D_dropdownRight">
		<li><strong>Share photo on:</strong></li>
		<li class="calendarOption hasIcon">
			<a class="hasIcon" id="facebookShare" href="javascript:;"><img width="16" height="16" title="Facebook" alt="Facebook" src="./Photos - Beijing Soccer Lovers (Beijing) - Meetup_files/icon_facebook_16.png"> <span>Facebook</span></a>
		</li>
		<li class="calendarOption hasIcon">
			<a class="hasIcon" id="twitterShare" href="javascript:;"><img width="16" height="16" title="Twitter" alt="Twitter" src="./Photos - Beijing Soccer Lovers (Beijing) - Meetup_files/icon_twitter_16.png"> <span>Twitter</span></a>
		</li>
		
	</ul>
</div>
</div>
</div>
<!-- slide body -->
<div id="D_photoGallery_mainPhotoWrapper">
    <div id="D_photoViewer">
     <ul>
        <?php 
            global $base_url; 
          
            echo '<li><img nid="'.$first_node->nid.'" seq="1" src="'.$base_url.'/'.$first_node->photo['filepath'].'" link="'.url('album/ajax/photo/'.$first_node->nid).'"> </li>';
            
            
            $i=1;
           
            foreach($photos as $nid =>$photo) {
            $i ++;
            echo '<a href="'.$base_url.'/'.$photo->photo['filepath'].'" rel="example1" title="Me and my grandfather on the Ohoopee."></a>';
            echo '<li><img nid="'.$photo->nid.'" seq="'.$i.'" src="'.$base_url.'/'.$photo->photo['filepath'].'" link="'.url('album/ajax/photo/'.$photo->nid).'"> </li>';
            }
        ?>
     </ul>
    </div>
    <div id="D_photoGallery_meta">
        <div style="display: block;" id="D_photoTags">
        <h4>In this photo</h4>
        </div>
        <div id="D_photoGallery_uploadCredit">
            <div id="D_photoGallery_uploadCredit_inner">
            </div>
        </div>    

    </div>
</div>
    
    

<!-- body end -->