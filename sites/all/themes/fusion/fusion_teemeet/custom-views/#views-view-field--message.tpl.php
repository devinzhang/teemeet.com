<li class="v4-feed-item v4-feed-list v4-feed-item-tag">
  <div class="v4-feed-type">
    <div class="v4-feed-icon sprite-feedv4 动态类型-bk"></div>
    动态内容 </div>
  <div class="v4-feed-item-drama"> 
    <a href="用户连接" title="用户名" class="v4-feed-memPhoto-anc v4-feed-memPhoto-anc-30 v4-feed-memPhoto-block"> 
      <img alt="头像" class="v4-feed-memPhoto-img v4-feed-memPhoto-img-30">
    </a> 
    <? echo $row->message ?>
    <div class="v4-feed-item-timestamp secondaryInfo">动态时间</div>
  </div>
  <div class="v4-feed-popup"> <a href="内容连接" title="用户名" class="v4-feed-memPhoto-anc v4-feed-memPhoto-anc-50 v4-feed-popup-photo"> <img alt="头像" class="v4-feed-memPhoto-img v4-feed-memPhoto-img-50"> </a> <span class="v4-feed-popup-desc">
    <div class="item-desc">
      <? echo $row->message ?>
    </div>
    </span>
  </div>
</li>