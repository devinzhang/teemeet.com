<?php

/**
 * @author Spirit8.com
 * @copyright 2011
 */
 
define('CREAT_GROUP_STEPS', 3); //表单步骤总数

function group_create(&$form_state)
{
    if(!isset($form_state['storage']['step']))
    {
        $form_state['storage']['step'] = 1;
    }
    $step = $form_state['storage']['step'];
    
    switch($step)
    {
        case 1 :      
            $form['#id'] = 'create';      
            
            addresses_user_form_user_profile_form_alter($form, $form_state, TRUE);            
            
            $form['title'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组名称'),
                '#size' => 64,
                '#required' => TRUE,
            );
            
            $form['field_site_title'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组页面标题'),
                '#size' => 64,
            );            
            
            $form['og_description'] = array
            (
                '#type' => 'textfield',
                '#title' => t('小组描述'),
                '#size' => 64,
            );               
            
            $form['field_member_alias'] = array
            (
                '#type' => 'textfield',
                '#title' => t('组员称呼'),
                '#size' => 64,                
            );
            
            $form['path'] = array
            (
                '#field_prefix' => $_SERVER['HTTP_HOST'] . '/',
                '#type' => 'textfield',
                '#title' => t('小组网址'),
                '#size' => 64,     
                '#required' => TRUE,           
            );
            
            $form['agreement'] = array
            (
                '#type' => 'checkboxes',
                '#title' => t('服务条款'),                
                '#required' => TRUE,         
                '#options' => array('遵守建立以真实人员参与的小组'),  
            );     
            
            $form['province'] = array
            (
                '#type' => 'hidden',
                '#value' => ''
            );    
            
   

        break;
        
        case 2:
            $form['field_tid'] = array
            (
            '#value' => <<<EOF
<form method="post" name="ThemeForm" id="ThemeForm" action="http://www.meetup.com/create/theme/" target="">
<input type="hidden" name="processForm" value="submit">
 
 
 
 
 




<div class="D_boxhead">
	





























	
		
			
		
		
	

	
	
	
	

	
	
	

	

	




<style type="text/css">
#janPromo {
-moz-border-radius: 6px 6px 6px 6px;
-webkit-border-radius: 6px 6px 6px 6px;
border-radius: 6px 6px 6px 6px;
-moz-box-shadow:inset 0 0 10px #000000;
background: none repeat scroll 0 0 #42505B;
color: #B2D8E7;
margin-bottom: 24px;
padding: 40px 20px;
text-align: center;
}
#janPromo .wrap{
font-size: 18px;
font-variant: small-caps;
text-transform: lowercase;
}
#janPromo strong{
color: #fff;
font-weight: normal;
}
</style>
<!--[if IE 7]>
<style type="text/css">
	#janPromo .wrap{
		font-size: 17px;
	}
</style>
<![endif]-->
<div id="janPromo">
<div class="wrap">
Save <strong>40%</strong> on Organizer Dues when you start a Meetup Group today!
</div>
</div>


<h1>

<span class="D_segue">Awesome!</span>

Next, customize the look of your Meetup Group's site
</h1>

</div>































	
		
			
		
		
	

	
	
	
	

	
	
	

	

	




<style type="text/css">
.D_step{
min-height: 5em;
opacity:.65!important;
filter: alpha(opacity=65)!important;
-moz-opacity: 0.65!important;
color: #272727 !important;
}
.D_selectedStep{
opacity:1!important;
filter: alpha(opacity=100)!important;
-moz-opacity: 1!important;
color: white !important;
}
.D_futureStep{
opacity:1!important;
filter: alpha(opacity=100)!important;
-moz-opacity: 1!important;
}
</style>
 
 
 
 
 
 

 


	
		
	
		
	
		
	
		
	
		
	
		
	





<div class="D_boxsection step-section ">
	
 
 
 
 
 

 




<div class="D_boxcols divby5">
	

 
 
 
 
 
 
 
 
 






<div class="D_col spans1">
	<div class="D_colbody">
		
<div class="D_step" id="step_basics">
<div class="stepHead">

<span class="stepNum">1</span>
<span class="stepName">The basics</span>



</div>

</div>

	</div>
</div>


 
 
 
 
 
 
 
 
 






<div class="D_col spans1">
	<div class="D_colbody">
		
<div class="D_step D_selectedStep" id="step_theme">
<div class="stepHead">

<span class="stepNum">2</span>
<span class="stepName">Pick a theme</span>

</div>

</div>

	</div>
</div>


 
 
 
 
 
 
 
 
 






<div class="D_col spans1">
	<div class="D_colbody">
		
<div class="D_step D_futureStep" id="step_tags">
<div class="stepHead">

<span class="stepNum">3</span>
<span class="stepName">Find the right members</span>

</div>

</div>

	</div>
</div>


 
 
 
 
 
 
 
 
 






<div class="D_col spans1">
	<div class="D_colbody">
		
<div class="D_step D_futureStep" id="step_subscribe">
<div class="stepHead">

<span class="stepNum">4</span>
<span class="stepName">Organizer Dues</span>

</div>

</div>

	</div>
</div>


 
 
 
 
 
 
 
 
 






<div class="D_col spans1">
	<div class="D_colbody">
		
<div class="D_step D_futureStep" id="step_members">
<div class="stepHead">

<span class="stepNum">5</span>
<span class="stepName">A few more things...</span>

</div>

</div>

	</div>
</div>



</div>



</div>






 
 
 
 
 
 

 






<div class="D_boxsection divby5 ">
	
 
 
 
 
 
 
 
 
 






<div class="D_col spans3 first">
	<div class="D_colbody">
		

<div style="position: relative;">
<iframe class="D_themePreview" id="themePreview" name="themePreview" scrolling="no"></iframe>
<div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: url(//img1.meetupstatic.com/img/clear.gif) repeat;"></div>
</div>

	</div>
</div>

 
 
 
 
 
 
 
 
 






<div class="D_col spans2 last">
	<div class="D_colbody">
		
<div class="D_themePicker J_isTabbed" id="themePicker">
<ul class="D_tabs jsReq">
<li id="tab_themes" class="J_tab select"><a href="JAVASCRIPT:void(0);">Pick a theme</a></li>
<li id="tab_advanced" class="J_tab"><a href="JAVASCRIPT:void(0);">Make your own theme</a></li>
</ul>
<div class="D_tabContents">
<div class="elements">
<div id="themes" class="D_tabContent J_tabContent select">
<input type="radio" name="gc_themeId" id="themeId_custom" value="0" style="display: none;" checked="checked">
<ul class="D_summaryList" id="themeList">




<li class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #EDEFED; background-image: url(); background-repeat: repeat;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #5B96E0;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #FFFFFF;"></div>
<div class="D_themeThumb_nav" style="background-color: #B5D0F2; color:#2A6798;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_meetup" value="" checked="checked"> <strong>Meetup standard theme</strong>
</div>

</div>
</li>

<li id="themeItem_19" class="D_theme J_theme bonus">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #4396ca; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_1.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #468357;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #F9EFAC;"></div>
<div class="D_themeThumb_nav" style="background-color: #12466B; color:#edf8fc;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_19" value="19" disabled="disabled"> <label for="themeId_19">Don't Go Chasing Waterfalls</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_20" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #89B5F0; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #213E6A;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #E8EDFB;"></div>
<div class="D_themeThumb_nav" style="background-color: #B0CBF7; color:#002A4C;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_20" value="20"> <label for="themeId_20">Blueish</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_21" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #468357; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #295235;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #FBF2D4;"></div>
<div class="D_themeThumb_nav" style="background-color: #87CC9F; color:#12291B;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_21" value="21"> <label for="themeId_21">Greenish</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_22" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #FBD8E3; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #FCEFEF;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #3B74A4;"></div>
<div class="D_themeThumb_nav" style="background-color: #F8B1BB; color:#ffffff;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_22" value="22"> <label for="themeId_22">Pink &amp; Baby Blue</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_23" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #647F4C; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #3E4F2E;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #E6DBCF;"></div>
<div class="D_themeThumb_nav" style="background-color: #4F3C2A; color:#ffffff;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_23" value="23"> <label for="themeId_23">Earthy</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_24" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #4396ca; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #2375A4;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #edf8fc;"></div>
<div class="D_themeThumb_nav" style="background-color: #12466B; color:#edf8fc;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_24" value="24"> <label for="themeId_24">Pool</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_25" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #444444; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #000000;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #aaaaaa;"></div>
<div class="D_themeThumb_nav" style="background-color: #000000; color:#88CBFB;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_25" value="25"> <label for="themeId_25">Gallery</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_26" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #6E1B29; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #380B13;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #FEEED5;"></div>
<div class="D_themeThumb_nav" style="background-color: #380B13; color:#FEEED5;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_26" value="26"> <label for="themeId_26">Wine</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_27" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #d3d3d1; background-image: url(http://img2.meetupstatic.com/img/theme_background/preview_9.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #465d0f;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_nav" style="background-color: #8aa548; color:#ffffff;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_27" value="27"> <label for="themeId_27">Rainforest</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_28" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #AE4333; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_10.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #AE4333;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #FCDBAB;"></div>
<div class="D_themeThumb_nav" style="background-color: #AE4333; color:#FCDBAB;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_28" value="28"> <label for="themeId_28">Daisy Blast</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_29" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #f0ead2; background-image: url(); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #1f1f1f;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #F9C780;"></div>
<div class="D_themeThumb_nav" style="background-color: #848075; color:#EEE6DD;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_29" value="29"> <label for="themeId_29">Olde Timey</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_30" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #d3d3d1; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_12.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #241A13;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #ebdaa2;"></div>
<div class="D_themeThumb_nav" style="background-color: #241A13; color:#ebdaa2;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_30" value="30"> <label for="themeId_30">Bookish</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_31" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #F6DFF8; background-image: url(http://img2.meetupstatic.com/img/theme_background/preview_13.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #8e466c;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #FFE7D8;"></div>
<div class="D_themeThumb_nav" style="background-color: #8e466c; color:#ffffff;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_31" value="31"> <label for="themeId_31">Lilac</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_32" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #D4BBF0; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_14.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #634E91;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #E6DEF7;"></div>
<div class="D_themeThumb_nav" style="background-color: #F8B1AF; color:#634E91;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_32" value="32"> <label for="themeId_32">Knitty</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_33" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #4d6eb1; background-image: url(http://img2.meetupstatic.com/img/theme_background/preview_15.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #3a6ab9;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_nav" style="background-color: #89B5F0; color:#163061;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_33" value="33"> <label for="themeId_33">Frosted</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_34" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #ffffff; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_16.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #634E91;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_nav" style="background-color: #AD364C; color:#ffffff;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_34" value="34"> <label for="themeId_34">Circus Dog!!</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_35" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #000000; background-image: url(http://img2.meetupstatic.com/img/theme_background/preview_17.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #030010;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #F38897;"></div>
<div class="D_themeThumb_nav" style="background-color: #29254D; color:#AFBAFF;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_35" value="35"> <label for="themeId_35">Nighttime Blur</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

<li id="themeItem_36" class="D_theme J_theme">
<div class="D_image">
<div class="D_themeThumb">
<div class="D_themeThumb_page" style="background-color: #4F3C2A; background-image: url(http://img1.meetupstatic.com/img/theme_background/preview_18.jpeg); background-repeat: repeat; background-position: center center;"></div>
<div class="D_themeThumb_contextHead" style="background-color: #241A13;"></div>
<div class="D_themeThumb_contextHeadTitle" style="background-color: #F8B1BB;"></div>
<div class="D_themeThumb_nav" style="background-color: #241A13; color:#D6C5B1;"></div>
<div class="D_themeThumb_box1" style="background-color: #ffffff;"></div>
<div class="D_themeThumb_box2" style="background-color: #ffffff;"></div>
</div>
</div>
<div class="D_info">
<div class="D_title">
<input type="radio" name="gc_themeId" class="jsReq" id="themeId_36" value="36"> <label for="themeId_36">Chocolatey</label>
</div>

</div>
<div style="clear: left;"></div>
</li>

</ul>
</div>
<div id="advanced" class="jsReq D_tabContent J_tabContent">
<div class="D_form">
<div class="element">
<div class="label">
<label id="label_grouphead" class="J_showMe">Group name header<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Back. color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(91, 150, 224); "><div></div></div><input type="text" name="gc_contextHeadBackgroundColor" id="contextHeadBackgroundColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Text color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(255, 255, 255); "><div></div></div><input type="text" name="gc_contextHeadColor" id="contextHeadColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Logo / banner</label>
</div>
<div class="input D_imgInput">
<div class="D_imgSelector" style="background-image: url(http://www.meetup.com/create/theme/?createPage=&amp;chapterId=2437172&amp;name=reading+and+reading&amp;itemId=&amp;startPoint=); "><div></div></div><input type="hidden" class="J_imgId" name="gc_headerImgId" id="headerImgId" value="" title="">
<input type="hidden" class="J_imgHeight" name="gc_contextHeadBackgroundImgHeight" value="">
</div>
</div>
</div>
</div>
<div class="element">
<div class="label">
<label id="label_bkg" class="J_showMe">Page background<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(237, 239, 237); "><div></div></div><input type="text" name="gc_bodyBackgroundColor" id="bodyBackgroundColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Image</label>
</div>
<div class="input D_imgInput">
<div class="D_imgSelector" style="background-image: url(http://www.meetup.com/create/theme/?createPage=&amp;chapterId=2437172&amp;name=reading+and+reading&amp;itemId=&amp;startPoint=); "><div></div></div><input type="hidden" class="J_imgId" name="gc_bodyImgId" id="bodyImgId" value="" title="">
<input type="hidden" name="gc_bodyImgPreviewUrl" id="bodyImgPreviewUrl" value="" title="">
<input type="hidden" name="gc_bodyImgFullUrl" id="bodyImgFullUrl" value="" title="">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Image repeat</label>
</div>
<div class="input">
<select name="gc_backgroundImgRepeat" id="backgroundImgRepeat" class="J_select">
<option value="repeat">repeat</option>
<option value="no-repeat">don't repeat</option>
<option value="repeat-x">repeat across</option>
<option value="repeat-y">repeat down</option>
</select>
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Image align</label>
</div>
<div class="input">
<select name="gc_backgroundImgPosition" id="backgroundImgPosition" class="J_select">
<option value="left">left</option>
<option value="center">center</option>
<option value="right">right</option>
</select>
</div>
</div>
<div class="element"></div>
<div class="element"></div>
</div>
</div>
<div class="element">
<div class="label">
<label id="label_headlines" class="J_showMe">Headlines<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Font</label>
</div>
<div class="input">
<select name="gc_headerFontFamily" id="headerFontFamily" class="D_fontSelect J_fontSelect" style="font-family: arial, sans-serif">

<option value="Comic Sans" style="font-family: 'Comic sans', 'Comic Sans MS', sans-serif">Comic Sans</option>

<option value="Courier" style="font-family: 'Courier New', Courier, monospace">Courier</option>

<option value="Georgia" style="font-family: Georgia, palatino, 'times new roman', serif">Georgia</option>

<option value="Arial" style="font-family: arial, sans-serif">Arial</option>

<option value="Verdana" style="font-family: verdana, geneva, sans-serif">Verdana</option>

</select>
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Text color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(42, 42, 42); "><div></div></div><input type="text" name="gc_headerColor" id="headerColor" value="" maxlength="60" class="text J_colorHex J_undoable">
</div>
</div>
<div class="element"></div>
</div>
</div>
<div class="element">
<div class="label">
<label id="label_links" class="J_showMe">Links &amp; buttons<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Link color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(80, 152, 228); "><div></div></div><input type="text" name="gc_linkColor" id="linkColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Button color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(229, 25, 55); "><div></div></div><input type="text" name="gc_actionColor" id="actionColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element"></div>
</div>
</div>
<div class="element">
<div class="label">
<label id="label_nav" class="J_showMe">Navigation bar<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Back. color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(181, 208, 242); "><div></div></div><input type="text" name="gc_navBackgroundColor" id="navBackgroundColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Text color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(42, 103, 152); "><div></div></div><input type="text" name="gc_navColor" id="navColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Fullwidth</label>
</div>
<div class="input">
<select name="gc_navBackgroundFullWidth" id="navBackgroundFullWidth" class="J_select">
<option selected="selected" value="true">Yes</option>
<option value="false">No</option>
</select>
</div>
</div>
</div>
</div>
<div class="element">
<div class="label">
<label id="label_boxes" class="J_showMe">Boxes<a class="D_showMe"><span>What's this?</span></a></label>
</div>
<div class="input">
<div class="element">
<div class="label">
<label class="th">Back. color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(255, 255, 255); "><div></div></div><input type="text" name="gc_boxBackgroundColor" id="boxBackgroundColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element D_colorInput">
<div class="label">
<label class="th">Accent color</label>
</div>
<div class="input">
<div class="D_colorSelector" style="background-color: rgb(242, 245, 242); "><div></div></div><input type="text" name="gc_accentColor" id="accentColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Font</label>
</div>
<div class="input">
<select name="gc_bodyFontFamily" id="bodyFontFamily" class="D_fontSelect J_fontSelect" style="font-family:verdana, geneva, sans-serif;">

<option value="Comic Sans" style="font-family:'Comic sans', 'Comic Sans MS', sans-serif;">Comic Sans</option>

<option value="Courier" style="font-family:'Courier New', Courier, monospace;">Courier</option>

<option value="Georgia" style="font-family:Georgia, palatino, 'times new roman', serif;">Georgia</option>

<option value="Arial" style="font-family:arial, sans-serif;">Arial</option>

<option value="Verdana" style="font-family:verdana, geneva, sans-serif;">Verdana</option>

</select>
</div>
</div>
<div class="element">
<div class="label">
<label class="th">Text color</label>
</div>
<div class="input D_colorInput">
<div class="D_colorSelector" style="background-color: rgb(39, 39, 39); "><div></div></div><input type="text" name="gc_bodyColor" id="bodyColor" value="" maxlength="60" class="text J_colorHex">
</div>
</div>
<div class="element"></div>
<div class="element"></div>
</div>
</div>
</div>
<input type="hidden" name="op" id="op" value="theme">
</div>
</div>
<div class="footElement jsReq">


<table align="center"><tbody><tr>

<td>

<div style="text-align: center">
<input type="submit" class="D_submit" name="goto" value="Previous" tabindex="5">
<input type="hidden" name="Previous" value="basics">
</div>
</td>

<td>

<div style="text-align: center">
<input type="submit" class="D_submit" id="submitAll" name="goto" value="Next" tabindex="6">
<input type="hidden" name="Next" value="tags">
</div>
</td>

</tr></tbody></table>

<input type="hidden" name="couponcode" value="">
<input type="hidden" name="s" value="">
<input type="hidden" name="memberId" value="">
<input type="hidden" name="chapterId" value="2437172">
<input type="hidden" name="token" value="13152089312340.7691642495468436">
<input type="hidden" name="startPoint" value="">
<input type="hidden" name="createPage" value=""> 
<input type="hidden" name="showsub" value="">

</div>
</div>
</div>

	</div>
</div>


</div>



</form>
EOF
,
            );
            //$form['og_theme'] = system_theme_select_form(t('Selecting a different theme will change the look and feel of the group.'));
        break;
        
        case 3:
            $form['taxonomy'] = array
            (
                '#type' => 'textfield',
                '#title' => 'Topics',
                '#size' => 64,                
            );
        break;
        
        /*case 4:
        //payment
        break;*/
    }
        
    $submit = (CREAT_GROUP_STEPS == $step ) ? t('Finish') : t('Next');
    $form['next'] = array
    (
        '#type' => 'submit',
        '#value' => $submit
    );
    
    return $form;
}

function group_create_submit($form, &$form_state)
{
    global $user;
    $form_state['storage']  = $form_state['storage'] + $form_state['values'];
    if($form_state['storage']['step'] != CREAT_GROUP_STEPS)
    {
        $form_state['storage']['step'] ++;
        return;
    }
    
    //保存信息
    
    //print_r($form_state['storage']);
    
    $node = new stdClass;        
    $node->uid = $user->uid;
    $node->name = $user->name;
    $node->type = NODE_TYPE;
    $node->title = $form_state['storage']['title'];   
    $node->og_description = $form_state['storage']['og_description']; 
    $node->pathauto_perform_alias = 0;
    $node->path = $form_state['storage']['path']; 
    $node->theme = $form_state['storage']['theme'];  
    $node->taxonomy['tags'][1] = $form_state['storage']['taxonomy'];   
    
    $node->field_location[0] = $form_state['storage']['addresses']; 
    $node->field_site_title[0]['value'] = $form_state['storage']['field_site_title'];
    $node->field_member_alias[0]['value'] = $form_state['storage']['field_member_alias'];
    $node->status = 0;           
    
    module_load_include('inc', 'addresses', '/countries/'. $node->field_location[0]['country']);
    eval("\$province = addresses_province_list_{$node->field_location[0]['country']}();");
    $node->field_location[0]['province_name'] = $province[$node->field_location[0]['province']];
    
    node_save($node);
    drupal_set_message('小组创建成功，请付费开通');
    drupal_goto($form_state['storage']['path']);
}


