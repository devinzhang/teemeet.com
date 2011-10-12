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


<body id="<?php print $body_id; ?>" class="humble <?php print $body_classes; ?>">

<div class="interstitialblock" id="interstitialblock"><!--[if lte IE 6.5]><iframe src="javascript:false;"></iframe><![endif]--></div>
<script type="text/javascript">document.body.className += (!document.body.className) ? 'hasJS' : ' hasJS';</script>

<div id="C_page">


<? if($group  and !strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet') ): ?>
<? echo color_group_style(); ?>
  <div id="C_contextHead">
    <div id="C_contextHeadBody">
      <div id="C_contextTitle">
        <? echo output_group_sitetitle($group); ?>
      </div>
    </div>
  </div>
  <? if($group->status ): ?>
  
  <div class="navTop menu" id="C_navTop">
  <? echo output_group_menu(); ?>
  </div>
  <? endif; ?> 
<? endif; ?> 
  
  <div id="C_pageBody">
    <div id="C_context">
      <div id="C_document" class=""> 
         <? if($group and $group->status and !strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet')): ?>
        <? echo $preface_bottom; ?>
        <?php if ($show_messages && $messages && arg(0) != 'search'): print $messages; endif; ?>
		<? endif; ?> 
		
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
        

      </div>
      
      <? if($group and $group->status and !strstr(request_uri(),'group/admin/themes/settings/fusion_teemeet')): ?>
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

<div id="C_footer">
  <div id="C_footerBody">
    <div class="C_footerRow">
      <ul class="utility C_footerSection">
        <li><a href="">关于Teemeet</a></li>
        <li><a href=""><span style="color:#FFFF99;">招贤纳才</span></a></li>
        
      <!--  <li><a href="">Meetup HQ Blog</a></li>
        <li><a href="">Meetup API</a></li> -->
      </ul>
      <ul class="utility C_footerSection">
      <!--  <li><a href="http://www.meetup.com/everywhere/">Meetup Everywhere</a></li> -->
        <li><a href="<?php print url('sponsorships'); ?>" class="omnCamp omnrg_perksfooter">赞助Teemeet小组</a></li>
        <li><a href="">快速帮助</a></li>
        <li><a href="<?php print url('privacy');?>"><span style="color:#FFFF99;">隐私说明</span></a> <span class="D_less">最后更新 10/15/2011</span></li>
        <li><a href="<?php print url('terms'); ?>"><span style="color:#FFFF99;">使用须知</span></a> <span class="D_less">最后更新 10/15/2011</span></li>
      </ul>
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

<div id="dialogHello">
  <div class="D_box calltoaction">
    <div class="D_boxbody">
      <div id="helloPanes">
        <div id="paneLogin">
          <div  class="D_boxhead">
            <h1>Log in</h1>
            <ul class="D_actions">
              <li class="canDo"> Not registered with us yet? <a href="https://secure.meetup.com/register/" class="J_signupLink J_onClick inHelloSignup omnCamp omnrg_login">Sign up</a> </li>
            </ul>
          </div>
          <div class="D_boxsection isMeetup">
            <form action="https://secure.meetup.com/login/" method="post" id="loginForm" class="loginForm">
              <div class="D_form embiggen">
                <div class="element">
                  <div class="label">
                    <label>Email address:</label>
                  </div>
                  <div class="input">
                    <input type="text" id="email" name="email" value="" tabindex="101" class="text" />
                  </div>
                </div>
                <div class="element">
                  <div class="label">
                    <label> Password: </label>
                    <p class="explain"> <a href="http://www.meetup.com/account/forgot/"> Forgot your password? </a> </p>
                  </div>
                  <div class="input">
                    <input type="password" id="password" name="password" tabindex="102" class="text" />
                  </div>
                  <div class="input">
                    <table summary="" class="inputs">
                      <tr class="last">
                        <td><input type="checkbox" id="rememberme" name="rememberme" tabindex="103" /></td>
                        <td><label for="rememberme"> Remember me on this computer </label></td>
                      </tr>
                    </table>
                  </div>
                </div>
                <div class="footElement" style="text-align: left;">
                  <input type="submit" name="submitButton" value="Log in" class="D_submit" tabindex="104"  />
                  <input type="hidden" name="returnUri" value="" />
                  <input type="hidden" name="op" value="login"/>
                  <input type="hidden" name="apiAppName" value="" />
                </div>
              </div>
            </form>
          </div>
          <div class="D_boxsection isFacebook">
            <div class="orbox">
              <div class="orword"> or </div>
            </div>
            <p class="explain">Log in to Meetup with your Facebook account.</p>
            <div class="fbButton">
              <fb:login-button v="2" perms="email" size="" onlogin="Meetup.Facebook.onLoginButtonClick();">
                <fb:intl>Log in using Facebook</fb:intl>
              </fb:login-button>
            </div>
          </div>
        </div>
        <div id="paneSignup">
          <div  class="D_boxhead">
            <h1>Sign up</h1>
            <ul class="D_actions">
              <li class="canDo">Meetup members, <a href="https://secure.meetup.com/login/?returnUri=http%3A%2F%2Fwww.meetup.com%2FSacSwim%2Fjoin%2F" class="J_loginLink J_onClick inHelloLogin">Log in</a></li>
            </ul>
          </div>
          <div class="D_boxsection isMeetup">
            <form action="https://secure.meetup.com/register/" class="signUp J_signupForm" method="post" id="baseSignUp">
              <div class="D_form embiggen">
                <div class="element">
                  <div class="label">
                    <label>Your real name</label>
                  </div>
                  <div class="input">
                    <input type="text" name="realname" id="baseSignUp_realname" value="" size="" maxlength="" class="text" title="Your real name" />
                  </div>
                </div>
                <div class="element">
                  <div class="label">
                    <label>Your email</label>
                  </div>
                  <div class="input">
                    <input type="text" name="email" id="baseSignUp_email" value="" class="text " title="Your email" />
                    <p class="explain hideOnValidating">We hate spam too. We won't share your address!</p>
                  </div>
                </div>
                <div class="element">
                  <div class="label">
                    <label>Pick a password</label>
                  </div>
                  <div class="input">
                    <input type="password" class="text " name="password" id="baseSignUp_password" value="" title="Pick a password" />
                  </div>
                </div>
                <input type="hidden" name="country" value="us" />
                <input type="hidden" name="zip" value="95816" />
                <div class="footElement" style="text-align: left;">
                  <input type="submit" name="submitButton" value="Sign up" class="D_submit"  />
                  <input type="hidden" id="htmlEmail" name="emailPrefs" value="1" />
                  <input type="hidden" name="submit" value="Submit" />
                  <input type="hidden" name="number" value="28" />
                  <input type="hidden" name="c" value="1082327" />
                  <input type="hidden" name="fromWaitingList" value="" />
                  <input type="hidden" name="urlkey" value="swimming" />
                  <input type="hidden" name="inv_code" value="" />
                  <input type="hidden" name="returnUri" value="http://www.meetup.com/SacSwim/join/" />
                </div>
              </div>
            </form>
          </div>
          <div class="D_boxsection isFacebook">
            <div class="orbox">
              <div class="orword"> or </div>
            </div>
            <div class="isFacebook_button">
              <p class="explain">Join this Meetup Group even quicker with your Facebook account.</p>
              <fb:login-button v="2" perms="email" size="" onlogin="Meetup.Facebook.onLoginButtonClick();">
                <fb:intl>Sign up using Facebook</fb:intl>
              </fb:login-button>
            </div>
          </div>
          <div class="D_boxsection tos"> By clicking the "Sign up using Facebook" or "Sign up" buttons above, you agree to Meetup's <a href="http://www.meetup.com/terms/" target="_blank">Terms of Service</a> </div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript"> 
 
Meetup.DOMReady.ready(function() {
Meetup.Script.include([ "http://static1.meetupstatic.com/082899144013760729961/script/Meetup/packed/Modules.jquery.js", "http://static1.meetupstatic.com/246471989912363528614/script/jquery/plug-in/actionDropdown.js"]
 
,function() {
 
$('#C_page').actionDropdown();
 
FeedPager.init( $( "#grouphome_feed_10538121" ), "http://www.meetup.com/SacSwim/module/render/?moduleId=10538121&m_nochrome=true" );
}
 
);
});
 
connect(window, "onload",function() {
Meetup.Script.include([ "http://static1.meetupstatic.com/41330693538953738449500/script/jquery/Meetup/TopicInfo.js", "http://static1.meetupstatic.com/25848261219440578973/script/jquery/Meetup/Validator.js"]
 
,function() {
 
$("form.J_signupForm").each(function(){
var MUVR = Meetup.UI.ValidatorRules;
var signupVal = new Meetup.UI.Validator(this);
var id = this.id;
signupVal.addRule(MUVR.notEmpty, $get(id+"_realname"));
signupVal.addRule(MUVR.notEmpty, $get(id+"_email"));
signupVal.addRule(MUVR.isEmail, $get(id+"_email"));
signupVal.addRule(MUVR.notEmpty, $get(id+"_password"));
signupVal.addRule(MUVR.isMinLength, $get(id+"_password"), 6);
});
//Meetup.DomDeco.applyByTagAndClass('input', 'horizUrfInput', Meetup.DomDeco.TextInputTip);
 
 
}
 
);
});
 
$(function(){Meetup.GroupHome.init()});$(function(){$("#module_10538121").feedpopup()});$(function(){if($("#duesSignal")){$("#chapterDuesDialog").Dialog()}if($("#refundSignal")){$("#refundBox").Dialog()}});$(function(){$(".D_splain").Splain()});$(function(){Meetup.GA.load("member","","","","")});
</script> 
<script type="text/javascript" src="http://static2.meetupstatic.com/654226392224242/script/Meetup/Facebook2.js"></script>
<div id="fb-root"></div>

<!--[if gte IE 8]>
<script type="text/javascript">
Meetup.Facebook.isIE8 = true;
</script>
<![endif]-->
  <?php print $closure; ?>
</body>
</html>
