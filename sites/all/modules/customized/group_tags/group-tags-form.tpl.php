<?php 
 //echo '<pre>';
 // print_r ($form);
 //echo '</pre>';


?>

<div class="D_form">
<div class="D_boxcols divby4">
<div class="D_col spans2 first">
	<div class="D_colbody">
<div class="T_chunky-ui-container ui-sortable" id="D_group-topics">
	<?php foreach($form as $key =>$value) : ?>
	
		<?php if(substr($key,0,16) == 'group_exist_tag_') : ?>
	<div class="D_group-topic" id="topic<?php print substr($key,16); ?>">
		<div class="T_chunky-ui-thing">
			<div class="chunky-thing-head">
				<div class="topic-name"><?php print $form[$key]['#value']['tag_name']; ?></div>
			</div>
			<div class="chunky-thing-body">
				<div class="D_topic-stats">
					<div class="topic-stat topic-stat-groups"><?php print t('@count Teemeet Groups worldwide (including yours!)',array('@count'=> $form[$key]['#value']['tag_node_counter'] +1));?></div>
				</div>
				<input type="hidden" value="<?php print $form[$key]['#value']['tag_tid']; ?>" class="pickedTopic D_new-topic" name="<?php print $key; ?>">
			</div>
			<div class="chunky-thing-action action-delete"> </div>
		</div>
	</div>
	<?php endif; ?>		
	<?php endforeach; ?>		
			
<?php foreach($form as $key =>$value) : ?>
		
		<?php if(substr($key,0,10) == 'group_tag_') : ?>	
		<div id="topic<?php print substr($key,10); ?>" class="D_group-topic">
			<div class="T_chunky-ui-thing D_topic-empty">
				<div class="chunky-thing-body">
					<div class="topic-field">
						<?php print drupal_render($form[$key]); ?>
						<div class="limit-container" style=""><span class="limit">Up to 50 characters.</span></div>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>		
	<?php endforeach; ?>	
		
		
	</div>

</div>
</div>
<div class="D_col spans2 last">
	<div class="D_colbody">		
<h3><?php print t('Why are topics important?') ;?></h3>
<ul class="D_features">
<li class="search-results"><?php print t('Well-picked topics help') ;?><b><?php print t('the right members') ;?></b> <?php print t('find your Teemeet Group.') ;?></li>
<li class="dir-listing"><?php print t('Your Meetup Group will be '); ?><strong><?php print t('listed in our directory'); ?></strong> <?php print t('under each topic you choose'); ?>.</li>
</ul>
<div class="suggested-topics">
<h3><?php print t('Suggested Topics'); ?></h3>
<p class="D_less"><?php print t('Suggestions are based on your Group\'s info and/or what other topics Meetup Groups like yours have added.'); ?></p>
<div class="suggested-topic-cols"><div style="z-index: 1;" class="scroll-fader scroll-up-fader"><div style="background-color: rgb(232, 242, 227);" class="see-more"><span style="display: inline-block; height: 16px;" class="scroller"><span class="linked">See more...</span></span></div><div class="see-more-fader"><div style="background-color: rgb(232, 242, 227); opacity: 0.9; top: 0pt;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.75; top: 5px;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.5; top: 10px;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.25; top: 15px;" class="stripe"></div></div></div><div style="z-index:1" class="scroll-fader scroll-up-fader"><div style="background-color:rgb(232, 242, 227);" class="see-more"><span style="display:inline-block;height:16px;" class="scroller"><span class="linked">See more...</span></span></div><div class="see-more-fader"><div style="background-color:rgb(232, 242, 227);opacity:.9;top:0" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.75;top:5px" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.5;top:10px" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.25;top:15px" class="stripe"></div></div></div>
 <div class="D_boxcols divby3">
 <?php 
 $gid = $form['gid']['#value'];
 $group_node = node_load($gid);
 $node_taxnomy = array();
 $terms = taxonomy_get_tree(3);
 
 foreach($group_node->taxonomy as $tid=>$term) {
  $node_taxnomy[]=$tid;
 }
 foreach ($terms as $seq => $term):
 ?>
 
 <?php if(!in_array($term->tid, $node_taxnomy )): ?>
<div class="D_col first">
	<div class="D_colbody">
<div id="topic-reg-<?php print $term->tid?>" class="topic-sugg">
	<div class="topic-sugg-body calltoaction">
		<div class="topic-name"><?php print $term->name; ?></div>
		<div class="topic-count">
		<?php print '('.t('@counter groups', array('@counter'=>taxonomy_term_count_nodes($term->tid))).')'; ?>
		</div>
		<div class="add-topic">
			<a class="topic-id-<?php print $term->tid?>"><?php print t('Add as topic');?></a>
		</div>
		<span class="eks linked">x</span>
		<span class="eks linked">x</span>
	</div>
</div>

	</div>
</div>
<?php endif; ?>		
	<?php endforeach; ?>	


</div>


<div class="scroll-fader scroll-down-fader"><div class="see-more-fader"><div style="background-color:rgb(232, 242, 227);opacity:.25;bottom:15px" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.5;bottom:10px" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.75;bottom:5px" class="stripe"></div><div style="background-color:rgb(232, 242, 227);opacity:.9;bottom:0" class="stripe"></div></div><div style="background-color:rgb(232, 242, 227)" class="see-more"><span style="display:inline-block;height:16px;" class="scroller"><span class="linked">See more...</span></span></div></div><div class="scroll-fader scroll-down-fader"><div class="see-more-fader"><div style="background-color: rgb(232, 242, 227); opacity: 0.25; bottom: 15px;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.5; bottom: 10px;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.75; bottom: 5px;" class="stripe"></div><div style="background-color: rgb(232, 242, 227); opacity: 0.9; bottom: 0pt;" class="stripe"></div></div><div style="background-color: rgb(232, 242, 227);" class="see-more"><span style="display: inline-block; height: 16px;" class="scroller"><span class="linked">See more...</span></span></div></div></div>

</div>

	</div>
</div>


</div>

<div class="footElement">
<?php print drupal_render($form['grouptag_submit']); ?>
</div>
</div>
<?php print drupal_render($form);  ?>
