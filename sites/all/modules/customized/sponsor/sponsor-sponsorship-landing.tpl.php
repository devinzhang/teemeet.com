<?php
 /* sponsorships landing page 
 **
 */
 
 ?>
<div class="D_box" id="sponsorSplash"> 
<div class="D_boxsection isNotDivided ">
	
<div id="blurb">

<p>Find new customers, promote your brand, or just support local community. Offer a Perk to any of 90,000+ Meetup Groups! <a href="http://www.meetup.com/help/What-is-Meetup-Perks" _target="blank">Learn more...</a></p>
</div>
<div class="clearfix" id="groups">
<div class="group">
<div id="group1" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/pupsAndUpPlayGroup.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
<a href="http://www.meetup.com/sponsor/From-the-Heart-Doggie-Daycare/">From the Heart Doggie Daycare</a>
</div>
<div class="followup">
is giving <strong>15% off any service</strong>
to members of the <a target="new" href="http://www.meetup.com/Pups-and-Up-Play-Group/">Pups &amp; Up Play Group</a>
</div>
</div>
<div class="group">
<div id="group2" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/southFloridaScubaMUG.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
<a href="http://www.meetup.com/sponsor/Lauderdale-Diver">Lauderdale Diver</a>
</div>
<div class="followup">
is giving <strong>10% off all Freediving and Spearfishing Gear</strong>
to members of <a target="new" href="http://www.meetup.com/ScubaSoFL/">The South Florida Scuba Meetup Group</a>
</div>
</div>
<div class="group">
<div id="group3" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/nycOutdoorFitness.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
<a href="">LifeLabs New York</a>
</div>
<div class="followup">
is giving a <strong>15% discount on courses &amp; adventures</strong>
to members of <a target="new" href="http://www.meetup.com/OutdoorFitness/">NYC Outdoor Fitness</a>
</div>
</div>
<div class="group">
<div id="group4" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/PortlandMahJongMUG.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
<a href="http://www.meetup.com/sponsor/Quan-Linh-Asian-Bistro/">Quan Linh Asian Bistro</a>
</div>
<div class="followup">
is giving a <strong>10% discount off the bill</strong>
to members of the <a target="new" href="http://www.meetup.com/pdx-mahjong/">Portland MahJong Society</a>
</div>
</div>
</div>
<div class="clearfix" id="chooseYourOwnAdventure">
<div id="fullserv">
<h3>Thinking a little bigger?</h3>
<p>Starting at $10,000 a month, our team will work with your business or brand to create a full-service Meetup Sponsorship program.</p>
<a class="trampoline" href="http://www.meetup.com/sponsorships/contact_meetuphq/">Find out more →</a>
</div>
<div id="selfserv">
<h3>Offer a Perk to Meetup Groups!</h3>
<ol>
<li>Come up with a compelling discount or member Perk.</li>
<li>We'll review, approve, and share your Perk with relevant Meetup Groups.</li>
<li>You pay $5 per month per Meetup Group that accepts your Perk.<br><strong>(Free until further notice!)</strong></li>
</ol>

<div class="trampoline">
<?php
    
    if($sponsor){
    $ret =l(t('Go to your Sponsor Home →'),'node/'.$sponsor->nid);
    } else {
    $ret = l(t('Get Started  →'),'sponsor/create'); 
    }
    echo $ret;
    ?>
</div>

</div>
</div>

</div>
</div>