<div class="D_box" id="D_manageSponsors">
	<div class="D_boxbody">
<div class="D_boxhead">
	
<h1 id="ourSponsorsHead">Our Sponsors and Membership Perks</h1>

<div id="sponsorshipSettings">

<span>You're accepting offers for <strong>Financial support and benefits</strong> and <strong>Discounts and Perks for members</strong></span>

<a href="" class="sprite sprite_action pencil_icon edit" id="settingsFormLink">Change</a>
</div>
</div>
<div class="D_boxsection isNotDivided ">
	
<div id="sponsorListsContainer">

<ul style="display: none;" id="waitlistSponsorList" class="sponsorList">

</ul>

<h2 class="list-heading">

<strong><?php print count($sponsors); ?></strong> Group Sponsors

<span class="add-sponsor-perk">
<a href="">
<span class="sprite sprite_pixel add_icon addSponsor-sprite">
Add a Sponsor
</span>
</a>
</span>

</h2>

<?php if(count($sponsors)== 0) : ?>
<p class="empty-group-note">
Your group does not have any Sponsors. We'll let you know when your group is
eligible for one. Or, click "Add a Sponsor" to add your own.
</p>
<?php endif; ?>
<ul class="sponsorList" id="sponsors-list">
	<?php foreach($sponsors as $sponsor):?>
	<li><span><?php print l($sponsor['name'],'node/'.$sponsor['nid']); ?></span>----------------------------<span><?php print l('Remove','sponsor/removesponsor/'.$sponsor['sid']); ?></span></li>
	<?php endforeach;?>
</ul>

<div class="sponsorless">

<p class="lightHeading sponsorName">This group is looking for discounts and Perks</p>

<p>
<a href="http://www.meetup.com/Beijing-Soccer-Lovers/manage/settings/sponsors/add/?addPerk=1" class="bold">Add one yourself</a>, or see these <a target="_blank" href="http://meetupblog.meetup.com/2010/03/from-the-vaults-how-to-obtain-a-sponsor-for-your-meetup-group.html" class="bold">great tips</a> on finding a sponsor.
</p>

</div>

</div>

</div>




	</div>
</div>