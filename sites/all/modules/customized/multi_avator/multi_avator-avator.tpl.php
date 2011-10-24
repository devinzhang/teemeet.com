
<div style="background-image: url(&quot;<?php print $imagepath; ?>&quot;); no-repeat;">

<a target="_blank" href="<?php print $imagepath; ?>">&nbsp;</a>
</div>
<ul class="D_actions">

<li class="canDo"><?php print $pirmay ? t('您的当前头像'): '<a class="canDo" href="'.url('multi_avator/set_primary/'.$uid.'/'.$fid).'">'.t('设置为头像').'</a>'; ?> </li>
<li><a class="colorbox-load canDo D_signal D_signal_appear_to_confirmProfilePhotoDelete deleteProfilePhoto" href="<?php print url('multi_avator/delete/'.$uid.'/'.$fid);?>">删除</a></li>

</ul>
