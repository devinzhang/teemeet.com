<li class="line event-item isAutosched  hide-tools isFeatured" > <span style="display:none;">Meetup</span>
      <div class="event-title"> <a href="<? echo groupfront_url('node/' . $fields['nid_1']->content) ?>" class="omnCamp omnrv_rv13"><span><? echo $fields['title']->content ?></span></a> </div>
      <div class="event-meta">
        <ul class="resetList">
          <li class="dateTime">
<? echo $fields['unix_event_start']->content ?>
          </li>
        </ul>
      </div>
      <div class="event-content"> <span>
        <!--dl class="event-where">
          <dt class="event-venuename"> <a href="<? echo $GLOBALS['current']->path . '/' . $fields['path']->content ?>" class="no-color omnCamp omnrv_rv13">Beals Point State Park</a> </dt>
          <dd> 7806 Folsom Auburn Rd, Folsom, CA
            (<a href="http://maps.google.com/maps?q=7806+Folsom+Auburn+Rd%2C+Folsom%2C+CA" target="_blank">map</a>) </dd>
        </dl-->
        </span>
        <div class="event-desc" itemprop="description"> 
<? echo $fields['teaser']->content ?>
        <a href="<? echo url('node/' . $fields['nid_1']->content) ?>" style="text-transform:uppercase;font-size:9px" class="omnCamp omnrv_rv13"><?php print t('了解详情'); ?></a>
        </div>
        <!--p class="event-hosts secondaryInfo">Hosted by: <a href="http://www.meetup.com/SacSwim/members/10146567/">Myron</a> (Organizer),
          
          
          and <a href="http://www.meetup.com/SacSwim/members/11643989/">Lloyd</a> (Assistant Organizer)
        </p-->
      </div>

    </li>