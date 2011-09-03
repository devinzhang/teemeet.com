<?php
?>

<div id="node-<?php print $node->nid; ?>" class="node <?php print $node_classes; ?>">
<div class="D_box isSponsor isAdmin " id="sponsorHome">
	          <div id="sponsorInfo">             
                <span class="contactInfo">
                <span class="street-address"><?php echo $node->field_sponsor_address[0]['street']; ?></span>
                <span class="locality"><?php echo $node->field_sponsor_address[0]['city'];?></span>,
                <abbr title="Maryland" class="region"><?php echo $node->field_sponsor_address[0]['province'];?></abbr>,
                <span class="country-name"><?php echo $node->field_sponsor_address[0]['street'];?></span>
                </span>
                <span id="sponsoringSince">Sponsoring Meetup Groups since <?php echo format_date($node->created,'custom','M d, Y'); ?></span>
            </div>

            <ul class="D_actions editControls">
            <li style="padding: 0.5em ! important;" class="canDo new-control"> <a class="sprite sprite_action pencil_icon" href="<?php print url('node/'.$node->nid); ?>">Edit Your Info</a> </li>
            </ul>
        </div>
        <div class="D_boxsection isNotDivided ">
            <div class="clearfix" id="offerStatus">
                <h2 class="lightHeading" id="banner"><span>Our Perk for Meetup Groups…</span></h2>
            </div>
            <div class="clearfix noPerk" id="featuredOffer">
                <div class="offerSections">
                    <div class="offerSection clearfix">
                        <h3 class="lightHeading"><span>You're not currently offering a Perk</span></h3>
                        <p style="line-height: 1.3;">Find new customers, promote your brand, or just support local community. Offer a Perk to any of 90,000+ Meetup Groups!</p>
                        <div id="createPerk">
                            <a class="D_submit" href="<?php echo url('perk/create'); ?>">
                            Create a Perk
                            </a>
                            <a class="alternate" href="#">Learn more</a>
                        </div>
                    </div>
                </div>
            </div>
       
</div>

</div><!-- /node-<?php print $node->nid; ?> -->
