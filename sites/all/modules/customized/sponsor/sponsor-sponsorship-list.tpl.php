<div class="D_box" id="D_manageSponsors">
	<div class="D_boxbody">
<div class="D_boxhead">
	
<h1 id="ourSponsorsHead"><?php print t('Our Sponsors and Membership Perks'); ?></h1>

<div id="sponsorshipSettings">

<span><?php print t('You\'re accepting offers for'); ?> <strong><?php print t('Financial support and benefits'); ?></strong> <?php print t('and'); ?> <strong><?php print t('Discounts and Perks for members'); ?></strong></span>

<!-- <a href="" class="sprite sprite_action pencil_icon edit" id="settingsFormLink">Change</a> -->
</div>
</div>
<div class="D_boxsection isNotDivided ">
	
<div id="sponsorListsContainer">

<ul style="display: none;" id="waitlistSponsorList" class="sponsorList">

</ul>

<h2 class="list-heading">

<strong><?php print count($sponsors); ?></strong> <?php print t('Group Sponsors'); ?>

<span class="add-sponsor-perk">
<!--<a href="sponsor/findgroup">
<span class="sprite sprite_pixel add_icon addSponsor-sprite">
Find a Sponsor
</span>
</a>
-->
</span>

</h2>

<?php if(count($sponsors)== 0) : ?>
<p class="empty-group-note">
<?php print t('Your group does not have any Sponsors. We\'ll let you know when your group is
eligible for one. Or, click "Add a Sponsor" to add your own.'); ?>

</p>
<?php endif; ?>
<ul class="sponsorList" id="sponsors-list">
	<?php foreach($sponsors as $sponsor):?>
	<li><span><?php print l($sponsor['name'],'node/'.$sponsor['nid']); ?></span><span><?php print l('Remove','sponsor/removesponsor/'.$sponsor['sid']); ?></span></li>
	<?php endforeach;?>
</ul>

<div class="sponsorless">

<p class="lightHeading sponsorName"><?php print t('This group is looking for discounts and Perks'); ?></p>
<?php global $user;
if(in_array('sponsor',$user->roles)): 
?>
<p>
<a href="<?php print url($GLOBALS['current_group']->path.'/sponsor/sponsorgroup/'.$GLOBALS['current_group']->nid) ?>" class="bold"><?php print t('Sponsor this group'); ?></a>
</p>
<?php endif; ?>

</div>

</div>

</div>




	</div>
</div>