<?php
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $language->language; ?>" xml:lang="<?php print $language->language; ?>">

<head>
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
  
 
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/meetup_jquery_ui.css" />
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/meetup.css" />
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/eventDetails.css" />
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/bagelbase_mar.css" />
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/new_layout.css" />
<link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/module.css" />
<link type="text/css" rel="stylesheet" media="print" href="<? echo base_path() . path_to_theme() ;?>/css/print.css" />

<!--[if IE 6]>
  <link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/ie6.css" />
<![endif]-->
<!--[if lt IE 8]>
  <link type="text/css" rel="stylesheet" media="all" href="<? echo base_path() . path_to_theme() ;?>/css/ie8.css" />
<![endif]-->

</head>

<? if(!$group): ?>
<style type="text/css">
#C_document { margin:0;}/* hack by spirit8 */
</style>
<? endif; ?>


<body id="<?php print $body_id; ?>" class="<?php print $body_classes; ?>">
  <div id="page" class="page">
    <div id="page-inner" class="page-inner">
      <div id="skip">
        <a href="#main-content-area"><?php print t('Skip to Main Content Area'); ?></a>
      </div>

      <!-- header-top row: width = grid_width -->
      <?php print theme('grid_row', $header_top, 'header-top', 'full-width', $grid_width); ?>

      <!-- header-group row: width = grid_width -->
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
        <li class="C_userNavItem C_userNavItem_less"><a href="#">What's new</a></li>
        <li class="C_userNavItem C_userNavItem_less"> <a href="#"><? echo t('help') ?></a> </li>
        
        <? if(!$user->uid): ?>
         <li class="C_userNavItem"><a href="<?php echo url('user/login'); ?>" class="J_loginLink J_onClick headerLogin">Log in</a></li>
         <li class="C_userNavItem"><a class="omnCamp omnrg_signup J_signupLink J_onClick headerSignup" href="<?php echo url('user/register');?>">Sign up</a></li>
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
          <li class="C_userNavItem"><a href="<?php echo url('account/'.$user->uid);?>">Account</a></li>
          <li class="C_userNavItem"><a href="<? echo url('logout') ?>"><? echo t('登出') ?></a></li>
        <? endif; ?>
      </ul>
    </div>
    <!-- end C_userNav -->
    
    <div id="C_globalNav">
      <div id="C_tabs"> 
        <a href="<? echo url('search'); ?>"> <span class="C_tabContent"> <span class="C_topBig"> <? echo t('发现')?> </span> <span class="C_topSm"> <? echo t('一个聚会')?> </span> </span> </a>
        <a id="tabs_start" class="omnCamp omnic_sn3 hasAd" href="<? echo url('group/create') ?>"> <span class="C_startContainer C_tabContent"> <span class="C_topBig"> <? echo t('创建') ?></span> <span class="C_topSm"> <? echo t('一个小组')?> </span> </span> </a>
        <a id="tabs_sponsor" class="omnCamp omnrg_perksheader last" href="#"> <span class="C_startContainer C_tabContent"> <span class="C_topBig"> <? echo t('赞助') ?></span> <span class="C_topSm"> <? echo t('一个小组') ?> </span> </span> </a> </div>
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
	  <!-- end of hearder -->

      <!-- preface-top row: width = grid_width -->
      <?php print theme('grid_row', $preface_top, 'preface-top', 'full-width', $grid_width); ?>

      <!-- main row: width = grid_width -->
      <div id="main-wrapper" class="main-wrapper full-width">
        <div id="main" class="main row <?php print $grid_width; ?>">
          <div id="main-inner" class="main-inner inner clearfix">
            <?php print theme('grid_row', $sidebar_first, 'sidebar-first', 'nested', $sidebar_first_width); ?>

            <!-- main group: width = grid_width - sidebar_first_width -->
            <div id="main-group" class="main-group row nested <?php print $main_group_width; ?>">
              <div id="main-group-inner" class="main-group-inner inner">
                <?php print theme('grid_row', $preface_bottom, 'preface-bottom', 'nested'); ?>

                <div id="main-content" class="main-content row nested">
                  <div id="main-content-inner" class="main-content-inner inner">
                    <!-- content group: width = grid_width - (sidebar_first_width + sidebar_last_width) -->
                    <div id="content-group" class="content-group row nested <?php print $content_group_width; ?>">
                      <div id="content-group-inner" class="content-group-inner inner">
                        <?php print theme('grid_block', $breadcrumb, 'breadcrumbs'); ?>

                        <?php if ($content_top || $help || $messages): ?>
                        <div id="content-top" class="content-top row nested">
                          <div id="content-top-inner" class="content-top-inner inner">
                            <?php print theme('grid_block', $help, 'content-help'); ?>
                            <?php print theme('grid_block', $messages, 'content-messages'); ?>
                            <?php print $content_top; ?>
                          </div><!-- /content-top-inner -->
                        </div><!-- /content-top -->
                        <?php endif; ?>

                        <div id="content-region" class="content-region row nested">
                          <div id="content-region-inner" class="content-region-inner inner">
                            <a name="main-content-area" id="main-content-area"></a>
                            <?php print theme('grid_block', $tabs, 'content-tabs'); ?>
                            <div id="content-inner" class="content-inner block">
                              <div id="content-inner-inner" class="content-inner-inner inner">
                                <?php if ($title): ?>
                                <h1 class="title"><?php print $title; ?></h1>
                                <?php endif; ?>
                                <?php if ($content): ?>
                                <div id="content-content" class="content-content">
                                  <?php print $content; ?>
                                  <?php print $feed_icons; ?>
                                </div><!-- /content-content -->
                                <?php endif; ?>
                              </div><!-- /content-inner-inner -->
                            </div><!-- /content-inner -->
                          </div><!-- /content-region-inner -->
                        </div><!-- /content-region -->

                        <?php print theme('grid_row', $content_bottom, 'content-bottom', 'nested'); ?>
                      </div><!-- /content-group-inner -->
                    </div><!-- /content-group -->

                    <?php print theme('grid_row', $sidebar_last, 'sidebar-last', 'nested', $sidebar_last_width); ?>
                  </div><!-- /main-content-inner -->
                </div><!-- /main-content -->

                <?php print theme('grid_row', $postscript_top, 'postscript-top', 'nested'); ?>
              </div><!-- /main-group-inner -->
            </div><!-- /main-group -->
          </div><!-- /main-inner -->
        </div><!-- /main -->
      </div><!-- /main-wrapper -->

      <!-- postscript-bottom row: width = grid_width -->
      <?php print theme('grid_row', $postscript_bottom, 'postscript-bottom', 'full-width', $grid_width); ?>

      <!-- footer row: width = grid_width -->
      <?php print theme('grid_row', $footer, 'footer', 'full-width', $grid_width); ?>

      <!-- footer-message row: width = grid_width -->
      <div id="footer-message-wrapper" class="footer-message-wrapper full-width">
        <div id="footer-message" class="footer-message row <?php print $grid_width; ?>">
          <div id="footer-message-inner" class="footer-message-inner inner clearfix">
            <?php print theme('grid_block', $footer_message, 'footer-message-text'); ?>
          </div><!-- /footer-message-inner -->
        </div><!-- /footer-message -->
      </div><!-- /footer-message-wrapper -->

    </div><!-- /page-inner -->
  </div><!-- /page -->
  <?php print $closure; ?>
</body>
</html>
