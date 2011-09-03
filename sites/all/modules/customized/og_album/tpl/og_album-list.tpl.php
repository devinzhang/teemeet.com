<div class="D_box photoBox" id="D_allAlbumsList">
	<div class="boxbody">
        <div class="boxhead">
            <h1><?php echo t('Photos');?></h1>
            <?php if($is_group_admin): ?>
            <ul class="D_actions">
            <?php 
            echo '<li>'.l('Upload Photos','album/ingroup/'.$current_group->nid.'/upload').'</li>';
            ?>
            </ul>
            <?php endif; ?>
        </div>
        <div class="D_boxsection isNotDivided ">
            <div class="D_listControls">
                <div class="D_listControl">
                    <label>Sort by:</label>
                        <span class="D_radio">
                            <a href="" class="selected">Activity</a>
                            <a href="">Created</a>
                        </span>
                </div>
            </div>
            <div id="groupListContainer" class="D_groupList_shopping">
                <ul class="D_summaryList">
                <?php foreach($albums as $aid => $album): ?>      
                        <?php //print_r($current_group); ?>
                    <li class="D_group J_groupHover position_1 first">
                        <div class="D_image">
                             <a href="<?php echo url( $current_group->path.'/node/'.$album->nid); ?>">
                            <img title="soccer" src="<?php global $base_url; echo $base_url.'/'.$album->album['cover_image_path']; ?> " alt="">
                            </a>
                        </div>
                        <div class="D_info">
                            <div class="D_name J_help">
                                <a href="<?php echo url($current_group->path.'/node/'.$album->nid); ?>">
                                <?php echo $album->title; ?>
                                </a>
                            </div>
                            <div class="D_secondary">
                                <a href="">
                                    <span class="date">
                                    <span class="month"> </span>
                                    <span class="day"></span>

                                    </span>
                                    <span class="daytime">
                                        <span class="time"></span>
                                    </span>
                                </a>
                                <p>
                                <?php echo $album->album['photo_size'].t(" photos"); ?>
                                </p>
                                <p class="D_less">
                                    Activity on Aug 16, 2011
                                </p>
                            </div>
                            <div class="D_primary">
                            </div>
                            </div>
                    </li>
                <?php endforeach; ?>


</ul></div>

</div>

<div class="D_boxfoot">
	
<div class="allAlbumPagerWrap">

</div>

</div>

	</div>
</div>