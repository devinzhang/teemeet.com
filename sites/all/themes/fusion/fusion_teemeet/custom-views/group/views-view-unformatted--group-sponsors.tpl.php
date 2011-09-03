<div id="D_manageSponsors" class="D_box">
  <div class="D_boxbody">
    <div class="D_boxhead">
      <h1 id="ourSponsorsHead">Our Sponsors and Membership Perks</h1>
    </div>
    <div class="D_boxsection isNotDivided ">
      <div id="sponsorListsContainer">
        <h2 class="list-heading"> <strong><? echo count($GLOBALS['current_group']->field_sponsor_list)?></strong> Group Sponsors </h2>
        <ul id="sponsors-list" class="sponsorList">
        <?php foreach ($rows as $id => $row): ?>                  
            <?php print $row; ?>          
        <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>
</div>
