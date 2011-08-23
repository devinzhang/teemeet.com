
<div style="background-image: url(&quot;<?php print $imagepath; ?>&quot;); no-repeat;">

<a target="_blank" href="<?php print $imagepath; ?>">&nbsp;</a>
</div>
<ul class="D_actions">

<li class="canDo"><?php print $pirmay ? t('Your main profile photo'): '<a class="canDo" href="'.url('multi_avator/set_primary/'.$uid.'/'.$fid).'">'.t('Make main profile photo').'</a>'; ?> </li>
<li><a class="colorbox-load canDo D_signal D_signal_appear_to_confirmProfilePhotoDelete deleteProfilePhoto" href="<?php print url('multi_avator/delete/'.$uid.'/'.$fid);?>">Delete</a></li>

</ul>
