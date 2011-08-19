<div class="D_boxhead">	
<div class="D_backTo"><a href="<?php echo url('album/ingroup/'.$album->album['gid']); ?>">Back to all photo albums</a></div>
<h1>
<?php echo $album->title; ?>

</h1>

<ul id="albumActions" class="D_actions">

<li class="canDo makeRelative">

<object width="70" height="17" style="width: 85px; height: 17px; z-index: 9999;" class="swfupload" data="http://static2.meetupstatic.com/31672825809160128912/script/swfupload/flash/swfupload.swf" type="application/x-shockwave-flash" id="SWFUpload_0"><param value="transparent" name="wmode"><param value="http://static2.meetupstatic.com/31672825809160128912/script/swfupload/flash/swfupload.swf" name="movie"><param value="high" name="quality"><param value="false" name="menu"><param value="always" name="allowScriptAccess"><param value="movieName=SWFUpload_0&amp;uploadURL=http%3A%2F%2Fupload.meetup.com%2F&amp;useQueryString=false&amp;requeueOnError=true&amp;httpSuccess=200&amp;assumeSuccessTimeout=0&amp;params=existingOrNew%3Dexisting%26amp%3BphotoAlbumId%3D2900971%26amp%3Bop%3Dsubmit%26amp%3BformUpload%3Dtrue%26amp%3Btoken%3D13137567441310.050077365114285954%26amp%3BmemberId%3D17790561%26amp%3BchapterId%3D2281951%26amp%3Bsig%3D74166f%26amp%3BsigTimeStamp%3D1313756744107%26amp%3BsigTimeValid%3D30&amp;filePostName=FileName_1&amp;fileTypes=*.jpg%3B*.jpeg%3B*.jpe%3B*.gif%3B*.png%3B*.JPG%3B*.JPEG%3B*.JPE%3B*.GIF%3B*.PNG&amp;fileTypesDescription=Images%20Only&amp;fileSizeLimit=10%20MB&amp;fileUploadLimit=497&amp;fileQueueLimit=497&amp;debugEnabled=false&amp;buttonImageURL=%2FBeijing-Soccer-Lovers%2Fphotos%2F2900971%2F&amp;buttonWidth=70&amp;buttonHeight=17&amp;buttonText=&amp;buttonTextTopPadding=0&amp;buttonTextLeftPadding=0&amp;buttonTextStyle=color%3A%20%23000000%3B%20font-size%3A%2016pt%3B&amp;buttonAction=-110&amp;buttonDisabled=false&amp;buttonCursor=-2" name="flashvars"></object>
<a id="add-photo-action" class="sprite sprite_action photo_add_icon" title="Add photos" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/upload/?photoAlbumId=2900971">Add photos</a>

</li>

<li class="canDo">
<a class="sprite sprite_action pencil_icon" title="Rename album" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/?op=rename&amp;photoAlbumId=2900971">Rename album</a>
</li>
<li class="canDo">
<a class="sprite sprite_action bin_icon" title="Delete album" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/?op=delAlbum&amp;photoAlbumId=2900971">Delete album</a>
</li>
<li class="canDo">
<a class="sprite sprite_action photos_icon" title="Reorder album" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/?op=reorderAlbum&amp;photoAlbumId=2900971">Reorder album</a>
</li>

</ul>

</div>

<!--body part -->
<div class="clearfix" id="D_photoGallery_wrapper">
    <div id="D_photoGallery_photoCaptionWrapper">
    <span id="D_photoGallery_photoCaption">ceshi 1</span>
    <a class="D_inlineAction D_signal D_signal_appear_to_D_photoGallery_editCaptionDialog" id="D_photoGallery_editCaptionLink" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/2900971/#">
    Edit caption
    </a>
    <a class="D_inlineAction D_signal D_signal_appear_to_D_photoGallery_deleteCaptionDialog" id="D_photoGallery_deleteCaptionLink" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/2900971/#">Delete caption</a>
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
<li><a href="<?php global $base_url; echo $base_url.'/'.$album->album['cover_image_path']; ?>" rel="example1" title="">Play slideshow</a>
</li>

<li><a class="D_signal D_signal_appear_to_D_photoGallery_allSizesDialog" id="D_photoGallery_allSizes" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/all_sizes/48697661">All sizes</a></li>

<li class="D_dropdown" id="D_photoGallery_orgControlsWrapper"><span><a class="J_onClick D_dropdownToggler D_dropdownParent" href="">Use photo as</a></span>
<div class="jsStartHidden D_dropdownContent" id="D_photoGallery_orgControls">
<ul>

<li>
<label class="actionAvailable" id="D_photoGallery_makeGroupPhoto"><input type="checkbox"> Group photo</label>
</li>

<li>
<label title="This is the album thumbnail" id="D_photoGallery_makeAlbumThumbnail"><input type="checkbox" disabled="true" checked="true"> Album thumbnail</label>
</li>

</ul>
<p><a class="J_onClick D_dropdownToggler" href="">close</a></p>
</div>
</li>

<li><a class="D_signal D_signal_appear_to_D_photoGallery_confirmDeletePhotoDialog" href="http://www.meetup.com/Beijing-Soccer-Lovers/photos/?op=delete&amp;photoId=48697661&amp;photoAlbumId=2900971" id="D_photoGallery_deletePhoto">Delete</a></li>

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
            $i=0;
            global $base_url; 
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