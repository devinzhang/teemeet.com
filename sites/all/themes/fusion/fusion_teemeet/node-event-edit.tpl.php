<div class="D_box">
	<div class="D_boxbody">
		<div class="D_boxhead">
			<h1><?php print t('Schedule a Meetup');?></h1>
				<div style="width:100%;margin-bottom:0em;">
				<!--	<ul class="D_actions hasIcons">
						<li class="canDo">
							<img style="margin-top:-2px; display:none;" class="png" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/expandAll.png" alt="" id="expandImg"> <img style="margin-top:-2px;margin-right:4px; " class="png" src="<?php print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/collapseAll.png" alt="" id="collapseImg"><a style="" id="expandAll" class="linked"><span>Expand all sections</span></a> <a style="display:none;" id="collapseAll" class="linked"><span>Collapse all sections</span></a>
						</li>
					</ul>
				-->
				</div>
			
		</div>
	</div>	
	<div class="D_boxsection isNotDivided ">
		<div class="D_form">
			<div class="elementGroup toggleGroup D_showHide">
					<div class="elementGroupHeader toggler">
						<div class="D_icon">
							<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3>基本信息</h3></div>
<div class="D_headerExplain">
<span id="basics_explain"><span class="D_standOut">必须填写</span></span> <a class="toggler D_change D_swap_out"><strong></strong></a>
</div>
</div>

<div class="togglee isBody">
<div class="element">
<div class="label">
<label for="title">
<?php print drupal_render($form['title']); ?>    
</label>
</div>
<div class="input">
<div>

</div>
</div>
</div>

<div class="element elementNoCharCounter">
<div class="label">
<label>

<?php print t('Suggest a date and time'); ?>

</label>
</div>
<div id="event" class="input">
<?php print drupal_render($form['event']); ?>
</div>
</div>

<div class="element">
<div class="label">
<label>
<?php print t('Select a place'); ?> :
</label>
</div>
<div id="venue" class="input">
<?php print drupal_render($form['locations']); ?>
</div>
<div style="float:none" class="element">

<div class="label">
<?php print drupal_render($form['meetup_open']);  ?>
</div>

</div>
</div>
<div class="element">
<div class="label">
<label for="hostIdentifyBlurb">怎么找到我们？</label>
<p class="explain"></p>
</div>
<div class="input">
<?php print drupal_render($form['how_find_us']);  ?>
<div>
</div>

</div>
</div>

<div class="element">

<?php print drupal_render($form['body_field']); ?> 

</div>

<!--
<div class="element element_lastInGroup">
<div class="label"><label>Who can help plan this Meetup?</label></div>
<input type="radio" value="1" name="anyone_can_edit" class="isRadioSelector" id="anyone_can_edit_on"> <label class="bold D_less" for="anyone_can_edit_on">All group members.</label><br>
<input type="radio" checked="checked" value="0" name="anyone_can_edit" class="isRadioSelector" id="anyone_can_edit_off"> <label class="bold D_less" for="anyone_can_edit_off">Only the Organizers and hosts are allowed to edit.</label>
</div>
-->
</div>
</div>

<!-- auto repeat this -->
<!--
<div class="elementGroup toggleGroup D_showHide">
<div class="elementGroupHeader toggler">
<div class="D_icon">
<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3>Automatically repeat this Meetup</h3></div>
<div class="D_headerExplain">
<span id="auto_explain">Not repeating</span> <a class="toggler D_change D_swap_out"><strong>edit</strong></a>
</div>
</div>
<div class="togglee isBody">
<div style="margin-left:1em;" class="element element_lastInGroup">
<p><em>You can always change the details of individual Meetups in the series at any time.</em></p>
<div class="input" id="autoSchedulerContainer">
<div class="clearfix" id="autosched_choices" style="padding:.75em"><p style="margin: 0pt 0pt 10px;" class="error">You need to pick a date for your first Meetup.</p>
<span class="D_radio">
<span class="D_radioInner selected"><input type="radio" disabled="" checked="checked" id="recur_type_none" value="none" name="recur_type" class="isRadioSelector freqSelect"> <label for="recur_type_none">Don't repeat</label></span>
</span>
<span class="D_radio">
<span class="D_radioInner"><input type="radio" disabled="" id="recur_type_weekly" value="weekly" name="recur_type" class="isRadioSelector freqSelect"> <label for="recur_type_weekly">By week(s)</label></span>
</span>
<span class="monthly D_radio">
<span class="D_radioInner"><input type="radio" disabled="" id="recur_type_monthly" value="monthly" name="recur_type" class="isRadioSelector freqSelect">
<label for="recur_type_monthly">By month(s)</label>
</span></span>

</div>
<div class="recur_type_none disabled" id="autoScheduler">
<input type="hidden" disabled="" value="" id="recurring" name="recurring">
<div class="freqContainer">
<div class="freqAdv weeklyBox">
<span class="repeatLbl">Repeat every
<select disabled="" style="width:7em;" name="num_weeks">
<option value="1">1 week</option>

<option value="2">2 weeks</option>

<option value="3">3 weeks</option>

<option value="4">4 weeks</option>

<option value="5">5 weeks</option>

<option value="6">6 weeks</option>

<option value="7">7 weeks</option>

<option value="8">8 weeks</option>

<option value="9">9 weeks</option>

<option value="10">10 weeks</option>

</select>
on:</span>
<div id="autoWeeks" class="weekBoxes">
<div class="weekBox">
<strong><label title="Sunday" for="Sun">Sun</label></strong>
<input type="checkbox" disabled="" value="0" id="Sun" name="Sun" class="weekCheck">
</div>
<div class="weekBox">
<strong><label title="Monday" for="Mon">Mon</label></strong>
<input type="checkbox" disabled="" value="1" id="Mon" name="Mon" class="weekCheck">
</div>
<div class="weekBox">
<strong><label title="Tuesday" for="Tue">Tue</label></strong>
<input type="checkbox" disabled="" value="2" id="Tue" name="Tue" class="weekCheck">
</div>
<div class="weekBox">
<strong><label title="Wednesday" for="Wed">Wed</label></strong>
<input type="checkbox" disabled="" value="3" id="Wed" name="Wed" class="weekCheck">
</div>
<div class="weekBox">
<strong><label title="Thursday" for="Thur">Thu</label></strong>
<input type="checkbox" disabled="" value="4" id="Thur" name="Thur" class="weekCheck">
</div>
<div class="weekBox">
<strong><label title="Friday" for="Fri">Fri</label></strong>
<input type="checkbox" disabled="" value="5" id="Fri" name="Fri" class="weekCheck">
</div>
<div class="weekBox selected">
<strong><label title="Saturday" for="Sat">Sat</label></strong>
<input type="checkbox" disabled="" value="6" id="Sat" name="Sat" class="weekCheck">
</div>
</div>
</div>
<div class="freqAdv noneBox" id="noneBox">
<p><strong>Not repeating this Meetup</strong></p>
</div>
<div class="freqAdv monthlyBox" id="monthlyBox">
<span class="repeatLbl">

Repeat on the <select disabled="" id="month_freq_week" name="month_freq_week">
<option value="1">first</option>
<option value="2">second</option>
<option value="3">third</option>
<option value="4">fourth</option>
<option value="5">last</option>
</select> 
<select disabled="" id="month_freq_DOW" name="month_freq_DOW">
<option value="0">Sunday</option>
<option value="1">Monday</option>
<option value="2">Tuesday</option>
<option value="3">Wednesday</option>
<option value="4">Thursday</option>
<option value="5">Friday</option>
<option value="6">Saturday</option>
</select>
 of every <select disabled="" id="num_months" name="num_months">
<option value="1">1 month</option>

<option value="2">
2 months
</option>

<option value="3">
3 months
</option>

<option value="4">
4 months
</option>

<option value="5">
5 months
</option>

<option value="6">
6 months
</option>

<option value="7">
7 months
</option>

<option value="8">
8 months
</option>

<option value="9">
9 months
</option>

<option value="10">
10 months
</option>

<option value="11">
11 months
</option>

<option value="12">
12 months
</option>

</select>
</span>
<input type="hidden" disabled="" id="month_freq_opt1" value="opt1" name="monthlyFreq">
</div>
<div class="freqAdv yearlyBox">
<p>Repeat this Meetup on <strong><span id="annual_monthDate">October 15</span></strong> every year.</p>
<input type="hidden" disabled="" value="" id="year_recur_month" name="year_recur_month">
<input type="hidden" disabled="" value="" id="year_recur_day" name="year_recur_day">
</div>
</div>
 
 
 
 
 

 




<div class="D_boxcols divby5">
	
 
 
 
 
 
 
 
 
 






<div class="D_col spans4">
	<div class="D_colbody">
		
<div class="D_previewCalContainer" id="mini_preview_cal">
<div id="preview_calendar"></div>
<div id="change_preview" class="D_previewBounds">
<strong>Stop repeating:</strong> <em><span id="stop_date"></span></em> <a class="D_signal_appear_to_stopDialog D_smChange" id="change_stop">Change</a>
</div>
</div>

	</div>
</div>

 
 
 
 
 
 
 
 
 






<div class="D_col">
	<div class="D_colbody">
		
<div class="storytime" id="emailReminderSplain">
 
 
 
 
 
 

 


	
		
	
		
	
		
	
		
	
		
	
		
	





<div class="D_boxsection isNotDivided ">
	
<div><strong>Your first Meetup</strong></div>
<em><span id="start_date">Pick a date.</span></em>

</div>



 
 
 
 
 
 

 






<div class="D_boxsection ">
	
<div class="D_splain splainRegistered">
<table class="inputs">
<tbody><tr>
<td style="padding-left:0!important;"><div><input type="checkbox" disabled="" checked="checked" value="1" id="reminderToggle"></div></td>
<td>
<label style="display:block" id="reminderText" for="reminderToggle">

Automatic Email Reminders<a style="" class="splainOver" title="Learn more"><img style="vertical-align:top;" alt="learn more" class="D_smIcon sprite sprite_pixel information_sm_icon" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif"></a>
</label>
</td>
</tr>
</tbody></table>

</div>

</div>



</div>

	</div>
</div>


</div>


</div>
<div class="disabled" style="margin-top:1em;" id="recurEnd">

<input type="hidden" value="" id="eventEndDatePicker_month" name="eventEndDatePicker.month">
<input type="hidden" value="" id="eventEndDatePicker_day" name="eventEndDatePicker.day">
<input type="hidden" value="" id="eventEndDatePicker_year" name="eventEndDatePicker.year">
<input type="hidden" value="" id="endFormattedDate">
</div>

</div>
</div>
</div>
</div>
-->
<!-- Charging for this Meetup-->
<!--
<div class="elementGroup toggleGroup D_showHide">
<div class="elementGroupHeader toggler">
<div class="D_icon">
<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3 style="display:inline;">Charging for this Meetup?</h3></div>
<div class="D_headerExplain">
<span id="payments_explain">You aren't charging for this Meetup.</span> <a class="toggler D_change D_swap_out"><strong>edit</strong></a>
</div>
</div>

<div id="paymentBox" class="element element_lastInGroup togglee isBody D_swap_out">
<div class="label">
<a name="payments"></a>
<p style="display: none; " class="explain amazonRelated">

</p>
</div>
<div class="input">
<table class="inputs">
<tbody>
<tr>
<td class="input">
<input type="checkbox" value="1" class="isRadioSelector" name="fee_mode" id="fee_mode_yes">
</td>

<td>
<label for="fee_mode_yes"><strong>Yes,</strong> I'd like to charge my members</label>
<input type="hidden" class="checkForUpdate" value="" id="payment_method" name="payment_method">
<div id="paymentOpts">
<table class="inputs">
<tbody><tr>
<td><label>Collect payment using:</label></td>
<td>
<div style="padding:0.5em 1em;" class="D_splain splainRegistered">
<label for="payment_amazon" class="hasLearnMore payLabel pay_for_payment_amazon">
<input type="radio" value="amazon" id="payment_amazon" class="isRadioSelector paymentSelector" dependson="fee_mode_yes" name="payment_method_type" style="vertical-align:middle">
<img style="padding-left:0.5em;vertical-align:middle;" alt="Collect payment with Amazon Payments" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/p3.gif">
</label>
<a style="" class="splainOver" title="Learn more">
<img style="vertical-align:top;" alt="learn more" class="D_smIcon sprite sprite_pixel information_sm_icon" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif">
</a>

</div>
</td>
<td id="paypalPayment">
<div style="padding:0.5em 1em;" class="D_splain splainRegistered">
<label for="payment_paypal" class="hasLearnMore payLabel pay_for_payment_paypal">
<input type="radio" value="paypal" id="payment_paypal" class="isRadioSelector paymentSelector" dependson="fee_mode_yes" name="payment_method_type" style="vertical-align:middle">
<img border="0" style="padding-left:0.5em;vertical-align:middle;" alt="Collect payment with PayPal" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/PayPal_mark_60x38.gif">
</label>
<a style="" class="splainOver" title="Learn more">
<img style="vertical-align:top;" alt="learn more" class="D_smIcon sprite sprite_pixel information_sm_icon" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif">
</a>

</div>
<input type="hidden" value="" id="canReqPay" name="canReqPay">
</td>
<td>
<div style="padding:0.5em 1em;">
<label class="payLabel pay_for_payment_cash" for="payment_cash">
<input type="radio" value="cash" id="payment_cash" class="isRadioSelector paymentSelector" dependson="fee_mode_yes" style="vertical-align:middle" name="payment_method_type">
<span style="padding-left:0.5em;font-size:1.1em;font-weight:bold;">Offline</span> <span class="D_less">(Cash/Check)</span>
</label>
</div>
</td>
</tr>
</tbody></table>
</div>

<div style="margin:0 0 0.5em 0;display:none" id="paypal_settings" class="storytime">
<div style="margin:0.5em 0">
<div style="float:none;" class="element ">
<div class="label">
<label style="font-weight:bold">Link your PayPal account to collect payment</label>
</div>
<div class="input">
<table class="inputs">
<tbody><tr>
<td class="label"><label>Enter your PayPal email address:</label></td>
<td><input type="text" value="" id="email" name="email"></td>
</tr>
</tbody></table>
<p class="D_less">
<label style="font-weight:normal;" for="accept">
<input type="checkbox" style="vertical-align:middle" value="accept" id="accept" name="accept"> I've read and agree to the <a class="D_signal D_signal_appear_to_paypalTerms" id="agreeLink" href="javascript:void(0);">Terms of service</a>
<label>
</label></label></p>


</div>
</div>
</div>
</div>

<div id="feeWrap">
<table class="" id="feePhrase">
<tbody><tr id="mainFee">
<td class="noLeft D_nobr">Attendees pay a <input type="text" dependson="fee_mode_yes" maxlength="25" size="8" value="Price" id="fee_label" name="fee_label" class="text lesserTextInput isRadioSelector"> of
</td>
<td>
<div style="margin-top:-3px;">
<span class="cashRelated">
<select dependson="fee_mode_yes" class="isRadioSelector lesserTextInput" id="fee_currency" name="fee_currency">
<option selected="selected" value="USD">US$</option>
<option value="CAD">CA$</option>
<option value="AUD">AU$</option>
<option value="GBP">GBP</option>
<option value="EUR">EUR</option>
<option value="BRL">BRL</option>
</select>
</span>

<span style="display: none; " class="amazonRelated">$ </span><input type="text" dependson="fee_mode_yes" maxlength="9" size="5" value="20.00" id="amountYouCharge" name="fee" class="text lesserTextInput isRadioSelector" style="vertical-align:top;">
<span>
<input type="text" dependson="fee_mode_yes" maxlength="25" size="9" value="per person" name="fee_desc" style="vertical-align:top;" class="text lesserTextInput isRadioSelector">
</span>
</div>
</td>
</tr>
</tbody></table>
<p class="D_legalese">All payments collected online are subject to transaction fees. <a target="_blank" class="compare_pop" href="http://www.meetup.com/help/about_charging/?paypal=true#calc">Calculate fees</a></p>
</div>
<div id="feeWrap">
<table class="inputs">
<tbody><tr>
<td class="input">
<input type="checkbox" value="1" name="require_payment" dependson="fee_mode_yes" class="isRadioSelector" id="require_payment_yes">
</td>
<td>
<div style="padding-top:0!important;" class="D_splain splainRegistered">
<label class="hasLearnMore" for="require_payment_yes"><strong>Require</strong> payment to attend</label> <a style="" class="splainOver" title="Learn more"><img alt="learn more" class="D_smIcon sprite sprite_pixel information_sm_icon" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif"></a><p></p>


</div>
</td>
</tr>
</tbody></table>
</div>
<div id="refundPolicy">
<div class="input">

<table class="inputs">
<tbody><tr>
<input type="hidden" value="1" name="refund_policy_optin_mode">
<td class="input"><input type="checkbox" value="1" class="isRadioSelector" dependson="fee_mode_yes" name="yes_i_have_refund_policy" id="refund_policy_yes"></td>
<td>
<div style="padding-top:0" class="D_splain hasLearnMore splainRegistered">
<label class="hasLearnMore" for="refund_policy_yes"><strong>Yes</strong>, I will offer a refund.</label> <a style="" class="splainOver" title="Learn more"><img alt="learn more" class="D_smIcon sprite sprite_pixel information_sm_icon" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif"></a>

</div>
<div class="label">
<p class="explain">Members will read and accept this when they say they are going.</p>
</div>
<div style="display: none; " id="refund_offered">
<div>I will refund if...</div>
<div style="margin-left:1.5em">
<table class="inputs">
<tbody><tr>
<td class="input"><input type="checkbox" value="1" dependson="refund_policy_yes" class="isRadioSelector" name="refund_event_cancellation_yes" id="refund_event_cancellation_yes"></td>
<td><label for="refund_event_cancellation_yes">the Meetup is cancelled</label></td>
</tr>
<tr>
<td class="input"><input type="checkbox" value="1" dependson="refund_policy_yes" class="isRadioSelector" name="refund_event_reschedule_yes" id="refund_event_reschedule_yes"></td>
<td><label for="refund_event_reschedule_yes">the Meetup is rescheduled</label></td>
</tr>
<tr>
<td class="input"><input type="checkbox" value="1" dependson="refund_policy_yes" class="isRadioSelector" name="refund_member_cancellation_yes" id="refund_member_cancellation_yes"></td>
<td><label>the member cancels <input type="text" dependson="refund_member_cancellation_yes" class="isRadioSelector" size="2" value="0" name="refund_member_cancellation_days" id="refund_member_cancellation_days"> day(s) in advance of the Meetup</label></td>
</tr>
<tr>
<td colspan="2">
<label for="refund_policy">Additional refund notes:</label>
<textarea class="hasMaxLen maxChars255 maxLenAdded" rows="3" cols="60" id="refund_policy" name="refund_policy"></textarea><div class="limit-container" style="display: none; "><span id="charCount_refund_policy" class="limit">255 characters left</span></div>
</td>
</tr>
</tbody></table>
</div>
</div>
</td>
</tr>
</tbody></table>

</div>
</div>


</td>

</tr>
</tbody>
</table>
</div>
</div>
</div>
--->
<!-- RSVP settings-->

<div class="elementGroup toggleGroup D_showHide">
<div class="elementGroupHeader toggler">
<div class="D_icon">
<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3><?php print t('RSVP settings'); ?></h3></div>
<div class="D_headerExplain">
<span id="attendees_explain"></span> <a class="toggler D_change D_swap_out"><strong></strong></a>
</div>
</div>
<div class="togglee isBody" id="attendee_inputs">
	<div class="element">
		<div class="label">
		活动限制人数， 0表是不限制人数
		</div>
		<div class="input">
			<?php print drupal_render($form['attendee_limit']);  ?> 
		</div>
	</div>
	<div class="element element_lastInGroup">
		<div class="label">
		是否允许带客人？ 0表示不允许带客人参加
		</div>
		<div class="input">
			<?php print drupal_render($form['quests_number']);  ?> 
		</div>
	</div>
</div>
</div>
	<!-- Email settings-->
<div class="elementGroup toggleGroup D_showHide">
<div class="elementGroupHeader toggler">
<div class="D_icon">
<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3>邮件通知设置</h3>
</div>
<div class="D_headerExplain">
<span id="email_settings_explain">报名提醒: 打开. 自动提醒： 打开.</span> <a class="toggler D_change"><strong></strong></a>
</div>
</div>
<div id="email_settings" class="togglee isBody">
<div class="element element_lastInGroup D_splain splainRegistered">
<div class="input">
<table class="inputs">
<tbody><tr>
<td class="input">
<?php print drupal_render($form['email_setting_auto_reminder']);  ?>
</td>
</tr>
<tr>
<td class="input">
<?php print drupal_render($form['email_setting_email_rsvp']);  ?>

</td>

</tr>
</tbody></table>
</div>

</div>
</div>
</div>
<!-- Ask Questions -->
<!--
<div class="elementGroup toggleGroup D_showHide">
<div class="elementGroupHeader toggler">
<div class="D_icon">
<img alt="plus" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_closed.png" class="closed togglee"><img src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/arrow_open.png" class="togglee open" alt="-">
</div>
<div class="D_title"><h3>Ask questions when members RSVP</h3></div>
<div class="D_headerExplain">
<span id="questions_explain">No questions.</span> <a class="toggler D_change D_swap_out"><strong>edit</strong></a>
</div>
</div>
<div class="togglee isBody">

<div class="element element_lastInGroup ">
<div class="label">
<p class="explain">
Only Event Hosts will be able to see the answers
</p>
</div>
<div class="input">

<input type="hidden" value="true" name="pre_event_survey" id="pre_event_survey_yes">
<div class="questionRelated" id="survey_questions_container">
<div id="survey_questions">

<div id="pre_event_survey_div_question_1" style="float:none;" class="element">
<div class="label">
<label for="pre_event_survey_question_1">Question 1
<a style="display:none;" class="D_inlineAction removeSurveyQuestion" id="question_removelink_1"><img alt="remove" class="png sprite sprite_pixel bullet_delete_icon" style="margin-bottom:-4px" src="<?php  print $GLOBALS['base_url'].'/'.path_to_theme(); ?>/images/1x1.gif"> <span>remove</span></a>
</label>
</div>
<div class="input">
<input type="text" value="" class="isRadioSelector hasMaxLen maxChars250 firstQuestion maxLenAdded" dependson="pre_event_survey_yes" name="pre_event_survey_question_1" id="pre_event_survey_question_1"><div class="limit-container" style="display: none; "><span id="charCount_pre_event_survey_question_1" class="limit">250 characters left</span></div>
</div>
</div>

</div>
<div class="survey_action">
<ul style="margin-top:.25em;" class="D_actions hasIcons">
<li class="canDo"><a class="sprite sprite_action add_icon" id="add_rsvp_question">Add a question</a></li>
</ul>
<input type="hidden" value="1" id="numQuestions" name="numQuestions">
</div>
</div>

</div>
</div>
</div>
</div>
-->
<!-- foot , buttons -->
<div style="padding-top:2em!important;" class="footElement">

<?php print drupal_render($form['buttons']['preview']);  ?>
<?php print drupal_render($form['buttons']['submit']);  ?>
<?php print drupal_render($form['buttons']['delete']);  ?>
<!--
<div class="D_altAction">
<a class="otherpath" target="_top" href="http://www.meetup.com/Beijing-Soccer-Lovers/?success=event_canceladd">Cancel</a>
</div>
-->
</div>
	</div>
	<!-- box session end -->
	<?php print drupal_render($form);  ?>
	</div>	
</div>