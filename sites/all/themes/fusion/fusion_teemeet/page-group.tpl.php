<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=8" />
  <title><?php print $head_title; ?></title>
  <?php print $head; ?>
  <?php print $styles; ?>
  <?php print $setting_styles; ?>
  <!--[if IE 8]>
  <?php print $ie8_styles; ?>
  <![endif]-->
  <!--[if IE 7]>
  <?php print $ie7_styles; ?>
  <![endif]-->
  <!--[if lte IE 6]>
  <?php print $ie6_styles; ?>
  <![endif]-->
  <?php print $local_styles; ?>
  <?php print $scripts; ?>

<!--[if IE 6]>
  <link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/ie6.css" />
<![endif]-->
<!--[if lt IE 8]>
  <link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/ie8.css" />
<![endif]-->
</head>
<!--[if IE]>
<script>
$(document).ready(function(){
    var fnMergeStyleSheet = function(){
    if(!document.styleSheets){
        return;
    }
    var aSheet = document.styleSheets,
        aStyle = document.getElementsByTagName('style'),
        aLink  = document.getElementsByTagName('link');
        if(aStyle.length + aLink.length < 32 || !aSheet[0].cssText){
            return;
        }
        
        var aCssText = [],aCloneLink = [];
        
        for(var i=aStyle.length-1;i>-1;--i){
            var o = aStyle[i];
                aCssText.push(o.innerHTML);
                if(i>0){
                    o.parentNode.removeChild(o);
                }
        }
        
        for(var i=aLink.length-1;i>-1;--i){
            
            var o = aLink[i];
                if(o.getAttribute && o.getAttribute('rel')==='stylesheet'){
                    if(o.styleSheet){
                        aCssText.push(o.styleSheet.cssText);
                    }else{
                       aCloneLink.push(o.cloneNode(true)); 
                    }
                    if(i>0){
                        o.parentNode.removeChild(o);
                    }
                }
        }
        var oHead = document.getElementsByTagName('head')[0];
        for(var i = aCloneLink.length-1;i>-1;--i){
            var o = aCloneLink[i];
            oHead.appendChild(o);
            aCssText.push(o.styleSheet.cssText);
            oHead.removeChild(o);
        }
        
        aSheet[0].cssText += aCssText.join('');
    }
    fnMergeStyleSheet();    
})
</script>
<![endif]-->

<? if(!$group): ?>
<style type="text/css">
#C_document { margin:0;}/* hack by spirit8 */
</style>
<? endif; ?>


<body id="<?php print $body_id; ?>" class="humble <?php print $body_classes; ?>">

<div class="interstitialblock" id="interstitialblock"><!--[if lte IE 6.5]><iframe src="javascript:false;"></iframe><![endif]--></div>
<script type="text/javascript">document.body.className += (!document.body.className) ? 'hasJS' : ' hasJS';</script>

<div id="C_page">


<? if($group and !strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet')): ?>
<? echo color_mine_style(); ?>
  <div id="C_contextHead">
    <div id="C_contextHeadBody">
      <div id="C_contextTitle">
        <? echo output_group_sitetitle($group); ?>
      </div>
    </div>
  </div>
  <div class="navTop menu" id="C_navTop">
  <? echo output_group_menu(); ?>
  </div>
<? endif; ?> 
  
  <div id="C_pageBody">
    <div id="C_context">
      <div id="C_document" > 
        
        <? echo $preface_bottom; ?>        
        <? 
            if(strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet'))
            {
                include 'inc/create-group.tpl.php';
            }        
            
            elseif(arg(0) == 'node' and $node->type == 'group' and arg(2) != 'edit')
            {
                include 'inc/center-content.tpl.php';    
            }             
            
            /*elseif(strstr(request_uri(), 'search'))
            {
                include 'inc/search.tpl.php';
            }*/
            
            elseif(request_uri() == '/group/create')
            {
                include 'inc/create-group.tpl.php';
            }
            
            else
            {
                echo $content;
            }
        ?>
        <?php if ($show_messages && $messages && arg(0) != 'search'): print $messages; endif; ?>

      </div>
      
      <? if($group and !strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet')): ?>
      <div id="C_nav" >
        <? echo $sidebar_first; ?>
        <? include 'inc/left-sidebar.tpl.php'; ?>
      </div><!-- end C_nav -->
      <? endif; ?>
      
      
    </div>
    <!-- C_context --> 
  </div>
  <!-- C_pageBody --> 
</div>
<!-- C_page -->

<div id="C_header">
  <div id="C_headerBody">
    <div id="C_logo"> <a href="<? echo url('<front>')?>"> <img src="<? echo $logo ?>" alt="<? echo $title ?>" /> </a> </div>
    <div id="C_userNav">
    <? if($user->uid): ?>
      <div id="C_welcome">
        <a href="<? echo url('<front>')?>"><img src="http://img2.meetupstatic.com/8689168192329930562/img/house.gif" class="D_icon" alt="Home" /></a> <a href="<? echo url('<front>')?>"><? echo $user->name ?></a>
	  </div>
    <? endif; ?>  
      <ul id="C_userLinks">
        <li class="C_userNavItem C_userNavItem_less"><a href="#">新鲜事</a></li>
        <li class="C_userNavItem C_userNavItem_less"> <a href="#"><? echo t('帮助') ?></a> </li>
        
        <? if(!$user->uid): ?>
         <li class="C_userNavItem"><a href="<?php echo url('user/login'); ?>" class="J_loginLink J_onClick headerLogin">登入</a></li>
         <li class="C_userNavItem"><a class="omnCamp omnrg_signup J_signupLink J_onClick headerSignup" href="<?php echo url('user/register');?>">注册</a></li>
        <? else: ?>
          <li class="C_userNavItem hasDropDown"><a href="<?php echo url('user/'.$user->uid.'/mygroups'); ?>"><? echo t('我的小组')?></a> <div class="C_arrowTab"></div> 
            <div id="C_groupsMenu" style="width: 310px; "> 
                <ul class="myGroupsSection">                    
                <?php                    
                    foreach($user->og_groups as $nid=>$group) {
                    echo '<li>'.l($group['title'],drupal_get_path_alias('node/'.$nid),array('attributes'=>array('class'=>'C_groupsMenuItem '))).'</li>';
                 }                
                ?>
                               
                </ul>
            </div>
          </li>
          <li class="C_userNavItem"><a href="<?php echo url('account/'.$user->uid);?>">帐户</a></li>
          <li class="C_userNavItem"><a href="<? echo url('logout') ?>"><? echo t('登出') ?></a></li>
        <? endif; ?>
      </ul>
    </div>
    <!-- end C_userNav -->
    
    <div id="C_globalNav">
      <div id="C_tabs"> 
        <a href="<? echo url('search/node/'); ?>"> <span class="C_tabContent"> <span class="C_topBig"> <? echo t('发现')?> </span> <span class="C_topSm"> <? echo t('一个聚会')?> </span> </span> </a>
        <a id="tabs_start" class="omnCamp omnic_sn3 hasAd" href="<? echo url('group/create') ?>"> <span class="C_startContainer C_tabContent"> <span class="C_topBig"> <? echo t('创建') ?></span> <span class="C_topSm"> <? echo t('一个小组')?> </span> </span> </a>
        <a id="tabs_sponsor" class="omnCamp omnrg_perksheader last" href="<?php print url('sponsorships'); ?>"> <span class="C_startContainer C_tabContent"> <span class="C_topBig"> <? echo t('赞助') ?></span> <span class="C_topSm"> <? echo t('一个小组') ?> </span> </span> </a> </div>
    </div>
    <!-- end C_globalNav -->
    
    <form id="C_globalSearch" method="get" action="/find/">
      <input type="text" name="keywords" autocomplete="off" id="C_globalSearchInput" class="D_topicSearch" maxlength="100" />
      <div class="D_submitInline">
        <input type="image" src="http://img2.meetupstatic.com/0460894421244282745036/img/header/search_20.png" id="C_globalSearchBtn" />
      </div>
      <input type="submit" style="display:none" />
    </form>
  </div>
</div>
<!-- end C_header -->

<div id="C_footer">
  <div id="C_footerBody">
    <div class="C_footerRow">
      <ul class="utility C_footerSection">
    <!--    <li><a href="">关于Teemeet</a></li>
        <li><a href=""><span style="color:#FFFF99;">招贤纳才</span></a></li>
      -->  
      <!--  <li><a href="">Meetup HQ Blog</a></li>
        <li><a href="">Meetup API</a></li> -->
      </ul>
      <ul class="utility C_footerSection">
      <!--  <li><a href="http://www.meetup.com/everywhere/">Meetup Everywhere</a></li>
        <li><a href="<?php print url('sponsorships'); ?>" class="omnCamp omnrg_perksfooter">赞助Teemeet小组</a></li>
        <li><a href="">快速帮助</a></li>
        <li><a href="<?php print url('privacy');?>"><span style="color:#FFFF99;">隐私说明</span></a> <span class="D_less">最后更新 10/15/2011</span></li>
        <li><a href="<?php print url('terms'); ?>"><span style="color:#FFFF99;">使用须知</span></a> <span class="D_less">最后更新 10/15/2011</span></li>
      --> </ul>
      <ul class="meta C_footerSection">
        <li>&copy; 2011 Teemeet <br />
        <!--  <a href="http://www.meetup.com/terms/#tm">Trademarks</a> 
		  belong to their respective owners.
		  -->
		 </li>
        <!-- <li>Teemeet is proudly <a href="" target="_blank">Made in China</a>!</li> -->
        <br />
        
      </ul>
    </div>
  </div>
</div>
<!-- end C_footer -->


<div id="fb-root"></div>
 <?php print $closure; ?>
</body>
</html>