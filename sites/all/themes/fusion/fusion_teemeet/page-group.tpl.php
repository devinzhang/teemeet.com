<? require 'inc/func_group.php'; ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
  <script type="text/javascript">(function(){var hash=window.location.hash.replace("#","");if(hash){var ops={calendar:"http://www.meetup.com/SacSwim/events/calendar/",drafts:"http://www.meetup.com/SacSwim/events/drafts/",making:"http://www.meetup.com/SacSwim/events/suggested/",past:"http://www.meetup.com/SacSwim/events/past/",suggested:"http://www.meetup.com/SacSwim/events/suggested/",unofficial:"http://www.meetup.com/SacSwim/events/unofficial/",upcoming:"http://www.meetup.com/SacSwim/"},loc=window.location,url=[loc.protocol,"//",loc.host,loc.pathname].join(""),target=ops[hash];if(target&&url!==target){loc.replace(target)}}})();</script>
<script src="http://static1.meetupstatic.com/884236050070803923549903/script/Meetup/packed/Meetup.Base.jquery.js" type="text/javascript"></script>
<script type="text/javascript">Meetup.isSecure=false;var LOG={};LOG.info=function(){return};LOG.error=function(){return};var Member={id:0,name:"",lat:"0.0",lon:"0.0",radius:"50",country:"us",zip:"",isCoord:false,isOrganizingAny:false,twitterAccount:false,status:1,isOwner:false,isCOOrg:false,groupsLink:"http://www.meetup.com/members/0/groups/",groupCount:0,isEvtOrg:false,isMember:false,memberThumb:"http://img1.meetupstatic.com/39194172310009655/img/noPhoto_50.gif",isVisitor:false,accessToken:""};var memberId=Member.id;var topicId=3361;var Chapter={id:1082327,name:"Sacramento Swimming Enthusiasts",lat:"38.57",lon:"-121.47",city:"Sacramento",state:"CA",country:"us",zip:"95816",domain:"",threshold:-1,previewUrl:"http://www.meetup.com/SacSwim/?op=preview",groupApiUrl:"http://www.meetup.com/SacSwim/api/",localTime:"August 6, 2011 20:16:11",forceUrl:false,groupUrl:"http://www.meetup.com/SacSwim/"};var chapterId=Chapter.id;Meetup.Language="en_US";if(typeof(Meetup.Copy)!="object"){Meetup.Copy={}}Meetup.Copy.CharCounter={};Meetup.Copy.dlogCloseThis="Close this";Meetup.Copy.CharCounter.upToXChars="Up to {CHAR_COUNT} characters.";Meetup.Copy.monthNames=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];Meetup.Copy.dayNames=["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];if(Meetup.Data===undefined){Meetup.Data={}}Meetup.Data.secureUrl="http://www.meetup.com/";Meetup.Data.secureApiUrl="http://www.meetup.com/api/";if(typeof Meetup==="undefined"){Meetup={}}if(Meetup.Data.grouphome===undefined){Meetup.Data.grouphome={}}if(Meetup.Data.grouphome.modulePreference===undefined){Meetup.Data.grouphome.modulePreference={}}Meetup.Data.themeCSS="http://www.meetup.com/theme/1297925954/?chapterId=1082327&external=true";Meetup.Data.grouphome.baseUrl="http://www.meetup.com/SacSwim/";Meetup.Data.grouphome.layoutVersion="4";Meetup.Data.grouphome.isOrg=false;Meetup.Data.grouphome.isPrivate=false;var COOKIE_DOMAIN=".meetup.com";if(""!=""){COOKIE_DOMAIN=""}if(typeof Meetup.Styles=="undefined"){Meetup.Styles={}}Meetup.Styles.boxBackgroundColor="#E1F2E8";</script>
<meta name="keywords" content="USA,California,Sacramento,Swimming,swimmers,group,club,event,community,meetup" />
<meta name="description" content="Meet others in your local area interested in swimming. In the pool and out in the real world open water style. We&#039;ll work out regularly to stay fit, discuss swimming techniques, health benefits and ga" />
<link rel="stylesheet" href="http://static2.meetupstatic.com/5784067448294103359835360/style/meetup_jquery_ui.css" type="text/css" />
<link rel="stylesheet" href="http://static1.meetupstatic.com/0649981367410798082298064/style/meetup.css" type="text/css" />
<!--[if IE 6]>
				<link rel="stylesheet" href="http://static1.meetupstatic.com/87101548361737691066016/style/sprites_ie.css" type="text/css" />
			<![endif]-->

<!--[if lt IE 8]>
		<link rel="stylesheet" href="http://static2.meetupstatic.com/74513332436582209025/style/base_ie.css" type="text/css" />
	<![endif]-->

<link rel="stylesheet" href="http://static1.meetupstatic.com/549553553979963562427959/style/bagelbase_mar.css" type="text/css" />
<link rel="stylesheet" href="http://static2.meetupstatic.com/9659051690118168059/style/new_layout.css" type="text/css" />
<link rel="stylesheet" href="http://static1.meetupstatic.com/8309909721544940250642/style/module.css" type="text/css" />
<!--link rel="stylesheet" href="http://www.meetup.com/theme/1297925954/?chapterId=1082327&external=true" type="text/css" /-->
<!-- for event --><link rel="stylesheet" href="http://static1.meetupstatic.com/93805775721321463/style/eventDetails.css" type="text/css" />
<link rel="stylesheet" type="text/css" media="print" href="http://static2.meetupstatic.com/01979620359177082566/style/print.css" />
<!--link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="http://www.meetup.com/SacSwim/events/rss/Sacramento+Swimming+Enthusiasts/" /-->
</head>

<? if(!$group): ?>
<style type="text/css">
#C_document { margin:0;}/* hack by spirit8 */
</style>
<? endif; ?>



<body id="meetupBody" class="<?php print $body_classes; ?> humble">
<div class="interstitialblock" id="interstitialblock"><!--[if lte IE 6.5]><iframe src="javascript:false;"></iframe><![endif]--></div>
<script type="text/javascript">document.body.className += (!document.body.className) ? 'hasJS' : ' hasJS';</script>

<div id="C_page">


<? if($group): ?>
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
      <div id="C_document" class=""> 
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

      </div>
      
      <? if($group): ?>
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
        <!-- header-group row: width = grid_width -->
      <div id="header-group-wrapper" class="header-group-wrapper full-width">
        <div id="header-group" class="header-group row <?php print $grid_width; ?>">
          <div id="header-group-inner" class="header-group-inner inner clearfix">
            <?php print theme('grid_block', theme('links', $secondary_links), 'secondary-menu'); ?>
            <?php print theme('grid_block', $search_box, 'search-box'); ?>

            <?php if ($logo || $site_name || $site_slogan): ?>
            <div id="header-site-info" class="header-site-info block">
              <div id="header-site-info-inner" class="header-site-info-inner inner">
                <?php if ($logo): ?>
                <div id="logo">
                  <a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
                </div>
                <?php endif; ?>
                <?php if ($site_name || $site_slogan): ?>
                <div id="site-name-wrapper" class="clearfix">
                  <?php if ($site_name): ?>
                  <span id="site-name"><a href="<?php print check_url($front_page); ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></span>
                  <?php endif; ?>
                  <?php if ($site_slogan): ?>
                  <span id="slogan"><?php print $site_slogan; ?></span>
                  <?php endif; ?>
                </div><!-- /site-name-wrapper -->
                <?php endif; ?>                
              </div><!-- /header-site-info-inner -->
              <?php print $header; ?>
            </div><!-- /header-site-info -->
            <?php endif; ?>

            
            <?php print theme('grid_block', $primary_links_tree, 'primary-menu'); ?>
          </div><!-- /header-group-inner -->
        </div><!-- /header-group -->
      </div><!-- /header-group-wrapper -->

</div>
<!-- end C_header -->

<div id="C_footer">
  <div id="C_footerBody">
    <div class="C_footerRow">
      <ul class="utility C_footerSection">
        <li><a href="http://www.meetup.com/about/">About Meetup</a></li>
        <li><a href="http://www.meetup.com/jobs/"><span style="color:#FFFF99;">We're hiring!</span></a></li>
        <li> <a href="http://www.meetup.com/boards/">Discuss Meetup</a> </li>
        <li><a href="http://meetupblog.meetup.com/">Meetup HQ Blog</a></li>
        <li><a href="http://www.meetup.com/meetup_api/">Meetup API</a></li>
      </ul>
      <ul class="utility C_footerSection">
        <li><a href="http://www.meetup.com/everywhere/">Meetup Everywhere</a></li>
        <li><a href="http://www.meetup.com/sponsorships/" class="omnCamp omnrg_perksfooter">Sponsor Meetup Groups</a></li>
        <li><a href="http://www.meetup.com/help/">Help</a></li>
        <li><a href="http://www.meetup.com/privacy/"><span style="color:#FFFF99;">Privacy</span></a> <span class="D_less">Updated 5/23/2010</span></li>
        <li><a href="http://www.meetup.com/terms/"><span style="color:#FFFF99;">Terms of service</span></a> <span class="D_less">Updated 5/23/2010</span></li>
      </ul>
      <ul class="meta C_footerSection">
        <li>&copy; 2011 Meetup <br />
          <a href="http://www.meetup.com/terms/#tm">Trademarks</a> belong to their respective owners.</li>
        <li>Meetup is proudly <a href="http://nytm.org/made" target="_blank">Made in NYC</a>!</li>
        <br />
        <li id="C_langChange"> Change language:
          <form id="C_langForm" action="http://www.meetup.com/account/language/" method="post">
            <select id="C_langs" name="lang">
              <option class="en_US" value="en_US">English</option>
              <option class="de" value="de">Deutsch</option>
              <option class="es" value="es">Espa&ntilde;ol</option>
              <option class="fr" value="fr">Fran&ccedil;ais</option>
              <option class="it" value="it">Italiano</option>
              <option class="pt" value="pt">Portugu&ecirc;s</option>
            </select>
            <noscript>
            <input type="submit" name="submitButton" value="Set language" class="D_submit"  />
            </noscript>
          </form>
        </li>
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
Meetup.Copy.characterLeft="1 character left";Meetup.Copy.charactersLeft="{NUM_CHARS} characters left";Meetup.Copy.noCharactersLeft="No more characters left.";Meetup.Copy.characterOver="(1 character over)";Meetup.Copy.charactersOver="({NUM_CHARS} characters over)";Meetup.Copy.removeRSVP="Can't go";Meetup.Copy.updateRSVP="Update";Meetup.Data.googleMapKey="ABQIAAAAsy0hHdLv8lt7dUhh_8Q2nhT9dWrIyy2PXg-qM7aW-4MZzb3j6xQO9Ylaxb0g9dvE--f66B7pFHaapg";Meetup.Data.LayoutVersion=4;Meetup.Data.ghIconColor="bk";Meetup.Data.memberLang="en";Meetup.Data.isUpcoming=true;Meetup.Data.page=null;Meetup.Data.isSuggestionOpen=false;Meetup.Data.calendarRoot="http://www.meetup.com/SacSwim/events/";Meetup.Data.venueRoot="http://www.meetup.com/SacSwim/venue/";Meetup.Data.chapterWho="swimmers";Meetup.Data.chapterUrlname="SacSwim";Meetup.Copy.seeResult="Your post will appear on __PT__ in a moment.";Meetup.Copy.errorSharing="Sorry, there was a problem posting your message. Please try again later.";Meetup.Copy.notYou="Change";Meetup.Copy.numGoing='<span class="rsvp-count-number">__COUNT__</span> swimmers going';Meetup.Copy.zeroGoing="Be the first to say you're going";Meetup.Copy.numWaiting='<span class="rsvp-count-number">__RSVP_COUNT__</span> going &middot <span class="rsvp-count-number">__WAIT_COUNT__</span> waiting';Meetup.Copy.numSpots="__COUNT__ spots available";Meetup.Copy.oneSpot="1 spot available";Meetup.Copy.noSpotsWL="No spots left";Meetup.Copy.noSpots="No spots left";Meetup.Data.path_twitter_tie="http://www.meetup.com/twitter_connect/";Meetup.Data.path_img_facebook="http://img1.meetupstatic.com/192008639833446537662/img/externalservice/socialmediaicons/facebook-16x16.png";Meetup.Data.path_img_facebook_g="http://img1.meetupstatic.com/61619264790717889890851/img/externalservice/socialmediaicons/facebook-16x16g.png";Meetup.Data.path_img_twitter="http://img1.meetupstatic.com/13191465716213475/img/externalservice/socialmediaicons/twitter-16x16.png";Meetup.Data.path_img_twitter_g="http://img2.meetupstatic.com/696188756139167243428083971/img/externalservice/socialmediaicons/twitter-16x16g.png";Meetup.Data.fbname="";Meetup.Data.noPhoto="http://img1.meetupstatic.com/39194172310009655/img/noPhoto_50.gif";Meetup.Copy.cancel="cancel";Meetup.Copy.titlePrompt="Title:";Meetup.Copy.descriptionPrompt="Description:";Meetup.Copy.timePrompt="Time:";Meetup.Copy.allDay="All day";Meetup.Copy.startsAtPrompt="Starts at:";Meetup.Copy.submit="Submit";Meetup.Copy.addToCalendarPrompt="Add to Calendar:";Meetup.Copy.errorGeneric="Sorry, there was a problem saving your data.  Please try again in a minute.";Meetup.Copy.errorTitleMissing="You must enter a title.";Meetup.Copy.oneMoreRsvp="1 more RSVP until&hellip;";Meetup.Copy.xMoreRsvps="__COUNT__ more RSVPs until&hellip;";Meetup.Copy.errFull="Sorry, this Meetup is full!";Meetup.Copy.errInvalidGuest="Please enter a valid number of guests.";Meetup.Copy.errTooManyGuests="You can't bring that many guests.";Meetup.Copy.errPast="This Meetup already happened!";Meetup.Copy.errGeneric="An error occurred.";Meetup.Data.calScript="http://static2.meetupstatic.com/375309602028658/script/jquery/Meetup/CalendarQuickAdd.js";Meetup.Copy.memberLike="Members who like this";Meetup.Copy.memberWant="Members who want this";Meetup.Copy.justNow="just now";Meetup.Copy.suggestAMeetup="Suggest a new Meetup";Meetup.Copy.cancelLMA="No thanks";Meetup.Copy.postDeleted="The post has been deleted";Meetup.Copy.undo="undo";Meetup.Copy.emailSent="Email Sent";Meetup.Copy.sendingEmail="Sending Email";if(!mc){var mc=Meetup.Copy}mc.noThanks="No thanks.";mc.login="Log in";mc.signUpToday="Sign up today!";mc.or="or";mc.toReceiveTopicUpdates="To receive updates about {TOPIC_NAME} Meetups in your area.";mc.imInterestedInThis="Notify me!";mc.wellEmailYou="We'll email when groups start nearby.";mc.meetupGroupsWorldwide="Meetup Groups worldwide";mc.meetupGroupsNearYou="Meetup Groups near you";mc.alreadyInterested="You're already interested in this!";if(typeof(Meetup)=="undefined"){Meetup={}}Meetup.pageName="GROUP: home";
</script> 
<script src="http://static1.meetupstatic.com/209101726573579077045/script/Meetup/packed/grouphome.js" type="text/javascript"></script> 
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
<script type="text/javascript"> 
 
if (Meetup.Data === undefined) {
Meetup.Data = {};
}
 
Meetup.Data.path_api = "http://www.meetup.com/api/";
Meetup.Data.path_fb_tie = "http://www.meetup.com/facebook_account_tie/";
 
Meetup.Data.path_xdpath = "http://www.meetup.com/fbconnect/xd.html";
 
 
Meetup.Facebook.afterAuthUri = "http://www.meetup.com/fb/?country=us&zip=95816&rg=ghurf";
Meetup.Facebook.returnUri = "http://www.meetup.com/SacSwim/join/";
/*
Meetup.Facebook.onButtonLogin = function () {
if (Meetup.Facebook.isJoining) {
var oper = (Meetup.Facebook.returnUri.indexOf("?") > -1) ? "&" : "?";
Meetup.Facebook.returnUri = Meetup.Facebook.returnUri + oper + "returnUri=" + Meetup.Facebook.returnUriSecondary;
}
//else {
// Meetup.Facebook.returnUri
//}
Meetup.Facebook.extendedPerms(Meetup.Facebook.extendedPermissionList, Meetup.Facebook.returnUri);
};
*/
//var fbd = Meetup.Dispatcher.init("meetupBody")
//fbd.registerFunc("doFB", Meetup.Facebook.onButtonLogin);
 
 
Meetup.Facebook.template = 
 
 
 
 
 
 
 
 
 
{
	'name': "Sacramento Swimming Enthusiasts",
	'href': "http:\/\/www.meetup.com\/SacSwim\/i3\/socialmedia"
 
	,'caption': "288 swimmers in Sacramento, CA"
 
 
 
	,'media': [{
	'type': 'image',
	'src': "http:\/\/photos2.meetupstatic.com\/photos\/event\/e\/3\/2\/d\/thumb_21538157.jpeg"
 
	,'href': "http:\/\/www.meetup.com\/SacSwim\/i3\/socialmedia"
 
}]
 
}
;
Meetup.Facebook.fbSrcCode = "fb_ghm";
Meetup.Twitter.srcCode = "ghme";
 
Meetup.Twitter.template =  
 
{
	'name': "Sacramento Swimming Enthusiasts",
	'href': "http:\/\/www.meetup.com\/SacSwim\/i3\/socialmedia"
 
	,'caption': "Check out Sacramento Swimming Enthusiasts on Meetup"
 
 
 
}
;
 
(function() {
var e = document.createElement('script');
e.async = true;
e.src = document.location.protocol + '//connect.facebook.net/en_US/all.js#appId=308de2e49a5be660d94a6dc5d68f6dab&xbfml=1';
document.getElementById('fb-root').appendChild(e);
}());
window.fbAsyncInit = function () {
Meetup.Facebook.init("308de2e49a5be660d94a6dc5d68f6dab", null  );
}
</script> 
<!--[if gte IE 8]>
<script type="text/javascript">
Meetup.Facebook.isIE8 = true;
</script>
<![endif]-->

</body>
</html>
