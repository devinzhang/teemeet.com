<link rel="stylesheet" href="http://static2.meetupstatic.com/5329144513340382224270/style/meetup.css" type="text/css" />
<?php print $scripts ?>
<div class="D_box">
  <div class="D_boxbody">
  
  <? echo $content ?>
  
  
  
  
  
    <form method="post" name="create" id="create" action="http://www.meetup.com/create/basics/">
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
#C_document { margin:0;}/* hack by spirit8 */
</style>
        <!--[if IE 7]>
<style type="text/css">
	#janPromo .wrap{
		font-size: 17px;
	}
</style>
<![endif]-->
        <div id="janPromo">
          <div class="wrap"> Save <strong>40%</strong> on Organizer Dues when you start a Meetup Group today! </div>
        </div>
        <h1>Set up your new Meetup Group</h1>
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
              <div class="D_step D_selectedStep" id="step_basics">
                <div class="stepHead"> <span class="stepNum">1</span> <span class="stepName">The basics</span> </div>
              </div>
            </div>
          </div>
          <div class="D_col spans1">
            <div class="D_colbody">
              <div class="D_step D_futureStep" id="step_theme">
                <div class="stepHead"> <span class="stepNum">2</span> <span class="stepName">Pick a theme</span> </div>
              </div>
            </div>
          </div>
          <div class="D_col spans1">
            <div class="D_colbody">
              <div class="D_step D_futureStep" id="step_tags">
                <div class="stepHead"> <span class="stepNum">3</span> <span class="stepName">Find the right members</span> </div>
              </div>
            </div>
          </div>
          <div class="D_col spans1">
            <div class="D_colbody">
              <div class="D_step D_futureStep" id="step_subscribe">
                <div class="stepHead"> <span class="stepNum">4</span> <span class="stepName">Organizer Dues</span> </div>
              </div>
            </div>
          </div>
          <div class="D_col spans1">
            <div class="D_colbody">
              <div class="D_step D_futureStep" id="step_members">
                <div class="stepHead"> <span class="stepNum">5</span> <span class="stepName">A few more things...</span> </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div style="margin-top: -1.25em; border-top: 1px solid #fff; border-bottom: 1px solid #ccc; margin-bottom: 1.25em;">
        <style type="text/css">
#paymentInfo{
font-size: .9em; text-align: left; padding: .75em .75em .75em 3em; background: #F5F5F2 url(http://img2.meetupstatic.com/76268993023127546532/img/thirdparty/fff/silk/help.png) 1em 3px no-repeat;
}
</style>
        <div id="paymentInfo"> <span id="paymentInfo_didYouKnow"><strong>Did you know?</strong></span> <span id="paymentInfo_orgsPay">Organizers pay Organizer Dues. <strong><span id="feeExplainLink" class="linked D_signal D_signal_appear_to_feeExplain">Learn more</span></strong></span> </div>
      </div>
      <div class="D_boxsection isNotDivided ">
        <div id="previewEditor">
          <div id="previewSettings">
            <div class="D_form">
              <div class="element" id="loc">
                <div class="label">
                  <label>Your new Meetup Group's hometown:</label>
                </div>
                <div class="input">
                  <input type="hidden" name="initialCountryValue" class="initialCountryValue" value="us">
                  <input type="hidden" name="initialCityValue" class="initialCityValue" value="">
                  <input type="hidden" name="initialZipValue" class="initialZipValue" value="">
                  <div class="inlineForm locMenu " id="locMenu" title="">
                    <div class="D_form_compact" id="formLocation">
                      <div class="element coPicker"> <span class="label">
                        <label for="co">Country</label>
                        </span> <span class="input">
                        <select name="country" id="co" class="locNameUpdateCountry">
                          <option value="us">USA</option>
                          <option value="ca">Canada</option>
                          <option value="gb">United Kingdom</option>
                          <option value="it">Italy</option>
                          <option value="au">Australia</option>
                          <option value="">----------------</option>
                          <option value="af">Afghanistan</option>
                          <option value="al">Albania</option>
                          <option value="dz">Algeria</option>
                          <option value="as">American Samoa</option>
                          <option value="ad">Andorra</option>
                          <option value="ao">Angola</option>
                          <option value="ai">Anguilla</option>
                          <option value="aq">Antarctica</option>
                          <option value="ag">Antigua &amp; Barbuda</option>
                          <option value="ar">Argentina</option>
                          <option value="am">Armenia</option>
                          <option value="aw">Aruba</option>
                          <option value="au">Australia</option>
                          <option value="at">Austria</option>
                          <option value="az">Azerbaijan</option>
                          <option value="bs">Bahamas</option>
                          <option value="bh">Bahrain</option>
                          <option value="bd">Bangladesh</option>
                          <option value="bb">Barbados</option>
                          <option value="by">Belarus</option>
                          <option value="be">Belgium</option>
                          <option value="bz">Belize</option>
                          <option value="bj">Benin</option>
                          <option value="bm">Bermuda</option>
                          <option value="bt">Bhutan</option>
                          <option value="bo">Bolivia</option>
                          <option value="ba">Bosnia-Herzegovina</option>
                          <option value="bw">Botswana</option>
                          <option value="br">Brazil</option>
                          <option value="bn">Brunei</option>
                          <option value="bg">Bulgaria</option>
                          <option value="bf">Burkina Faso</option>
                          <option value="bi">Burundi</option>
                          <option value="kh">Cambodia</option>
                          <option value="cm">Cameroon</option>
                          <option value="ca">Canada</option>
                          <option value="cv">Cape Verde</option>
                          <option value="ky">Cayman Islands</option>
                          <option value="cf">Central Africa</option>
                          <option value="td">Chad</option>
                          <option value="cl">Chile</option>
                          <option value="cn">China</option>
                          <option value="co">Colombia</option>
                          <option value="km">Comoros</option>
                          <option value="cg">Congo</option>
                          <option value="cd">Congo (Dem. Rep.)</option>
                          <option value="ck">Cook Islands</option>
                          <option value="cr">Costa Rica</option>
                          <option value="hr">Croatia</option>
                          <option value="cu">Cuba</option>
                          <option value="cy">Cyprus</option>
                          <option value="cz">Czech Republic</option>
                          <option value="dk">Denmark</option>
                          <option value="dj">Djibouti</option>
                          <option value="dm">Dominica</option>
                          <option value="do">Dominican Republic</option>
                          <option value="tp">East Timor</option>
                          <option value="ec">Ecuador</option>
                          <option value="eg">Egypt</option>
                          <option value="sv">El Salvador</option>
                          <option value="gq">Equatorial Guinea</option>
                          <option value="er">Eritrea</option>
                          <option value="ee">Estonia</option>
                          <option value="et">Ethiopia</option>
                          <option value="fk">Falkland Islands</option>
                          <option value="fo">Faroe Islands</option>
                          <option value="fj">Fiji</option>
                          <option value="fi">Finland</option>
                          <option value="fr">France</option>
                          <option value="gf">French Guiana</option>
                          <option value="pf">French Polynesia</option>
                          <option value="ga">Gabon</option>
                          <option value="gm">Gambia</option>
                          <option value="ge">Georgia</option>
                          <option value="de">Germany</option>
                          <option value="gh">Ghana</option>
                          <option value="gi">Gibraltar</option>
                          <option value="gr">Greece</option>
                          <option value="gl">Greenland</option>
                          <option value="gd">Grenada</option>
                          <option value="gp">Guadeloupe</option>
                          <option value="gu">Guam</option>
                          <option value="gt">Guatemala</option>
                          <option value="gn">Guinea</option>
                          <option value="gw">Guinea Bissau</option>
                          <option value="gy">Guyana</option>
                          <option value="ht">Haiti</option>
                          <option value="hn">Honduras</option>
                          <option value="hu">Hungary</option>
                          <option value="is">Iceland</option>
                          <option value="in">India</option>
                          <option value="id">Indonesia</option>
                          <option value="ir">Iran</option>
                          <option value="iq">Iraq</option>
                          <option value="ie">Ireland</option>
                          <option value="il">Israel</option>
                          <option value="it">Italy</option>
                          <option value="ci">Ivory Coast</option>
                          <option value="jm">Jamaica</option>
                          <option value="jp">Japan</option>
                          <option value="jo">Jordan</option>
                          <option value="kz">Kazakhstan</option>
                          <option value="ke">Kenya</option>
                          <option value="ki">Kiribati</option>
                          <option value="kp">Korea (North)</option>
                          <option value="kr">Korea (South)</option>
                          <option value="kw">Kuwait</option>
                          <option value="kg">Kyrgyzstan</option>
                          <option value="la">Laos</option>
                          <option value="lv">Latvia</option>
                          <option value="lb">Lebanon</option>
                          <option value="ls">Lesotho</option>
                          <option value="lr">Liberia</option>
                          <option value="ly">Libya</option>
                          <option value="li">Liechtenstein</option>
                          <option value="lt">Lithuania</option>
                          <option value="lu">Luxembourg</option>
                          <option value="mk">Macedonia</option>
                          <option value="mg">Madagascar</option>
                          <option value="mw">Malawi</option>
                          <option value="my">Malaysia</option>
                          <option value="mv">Maldives</option>
                          <option value="ml">Mali</option>
                          <option value="mt">Malta</option>
                          <option value="mh">Marshall Islands</option>
                          <option value="mq">Martinique</option>
                          <option value="mr">Mauritania</option>
                          <option value="mu">Mauritius</option>
                          <option value="yt">Mayotte</option>
                          <option value="mx">Mexico</option>
                          <option value="fm">Micronesia</option>
                          <option value="md">Moldova</option>
                          <option value="mc">Monaco</option>
                          <option value="mn">Mongolia</option>
                          <option value="ma">Morocco</option>
                          <option value="mz">Mozambique</option>
                          <option value="mm">Myanmar</option>
                          <option value="na">Namibia</option>
                          <option value="nr">Nauru</option>
                          <option value="np">Nepal</option>
                          <option value="nl">Netherlands</option>
                          <option value="an">Netherlands Antilles</option>
                          <option value="nc">New Caledonia</option>
                          <option value="nz">New Zealand</option>
                          <option value="ni">Nicaragua</option>
                          <option value="ne">Niger</option>
                          <option value="ng">Nigeria</option>
                          <option value="nu">Niue</option>
                          <option value="no">Norway</option>
                          <option value="om">Oman</option>
                          <option value="pk">Pakistan</option>
                          <option value="pw">Palau</option>
                          <option value="ps">Palestine</option>
                          <option value="pa">Panama</option>
                          <option value="pg">Papua New Guinea</option>
                          <option value="py">Paraguay</option>
                          <option value="pe">Peru</option>
                          <option value="ph">Philippines</option>
                          <option value="pl">Poland</option>
                          <option value="pt">Portugal</option>
                          <option value="qa">Qatar</option>
                          <option value="re">Réunion</option>
                          <option value="ro">Romania</option>
                          <option value="ru">Russia</option>
                          <option value="rw">Rwanda</option>
                          <option value="eh">Sahara</option>
                          <option value="ws">Samoa</option>
                          <option value="sm">San Marino</option>
                          <option value="sa">Saudi Arabia</option>
                          <option value="sn">Senegal</option>
                          <option value="yu">Serbia</option>
                          <option value="sc">Seychelles</option>
                          <option value="sl">Sierra Leone</option>
                          <option value="sg">Singapore</option>
                          <option value="sk">Slovakia</option>
                          <option value="si">Slovenia</option>
                          <option value="sb">Solomon Islands</option>
                          <option value="so">Somalia</option>
                          <option value="za">South Africa</option>
                          <option value="es">Spain</option>
                          <option value="lk">Sri Lanka</option>
                          <option value="sh">St. Helena</option>
                          <option value="kn">St. Kitts &amp; Nevis</option>
                          <option value="lc">St. Lucia</option>
                          <option value="sd">Sudan</option>
                          <option value="sr">Suriname</option>
                          <option value="sz">Swaziland</option>
                          <option value="se">Sweden</option>
                          <option value="ch">Switzerland</option>
                          <option value="sy">Syria</option>
                          <option value="tw">Taiwan</option>
                          <option value="tj">Tajikistan</option>
                          <option value="tz">Tanzania</option>
                          <option value="tf">Terres Australes</option>
                          <option value="th">Thailand</option>
                          <option value="tg">Togo</option>
                          <option value="tk">Tokelau</option>
                          <option value="to">Tonga</option>
                          <option value="tt">Trinidad &amp; Tobago</option>
                          <option value="tn">Tunisia</option>
                          <option value="tr">Turkey</option>
                          <option value="tm">Turkmenistan</option>
                          <option value="tv">Tuvalu</option>
                          <option value="ae">U.A.E.</option>
                          <option value="ug">Uganda</option>
                          <option value="ua">Ukraine</option>
                          <option value="gb">United Kingdom</option>
                          <option value="uy">Uruguay</option>
                          <option value="us" selected="selected">USA</option>
                          <option value="uz">Uzbekistan</option>
                          <option value="vu">Vanuatu</option>
                          <option value="va">Vatican</option>
                          <option value="ve">Venezuela</option>
                          <option value="vn">Vietnam</option>
                          <option value="vg">Virgin Islands</option>
                          <option value="wf">Wallis &amp; Futuna</option>
                          <option value="ye">Yemen</option>
                          <option value="zm">Zambia</option>
                          <option value="zw">Zimbabwe</option>
                        </select>
                        <input type="hidden" name="locationPickerRef" id="locationPickerRef" value="0">
                        <input type="hidden" class="dbval" name="dbCo" id="dbCo" value="us">
                        <input type="hidden" class="dbval" name="dbOutsideUsLink" value="">
                        </span> </div>
                      <div class="sometimesImHere"></div>
                      <div id="locPicker" class="element">
                        <div id="locSwitchable"><span class="label">
                          <label for="zip" id="zipLabel">ZIP code</label>
                          </span><span class="input">
                          <input type="text" id="zip" name="zip" value="" class="locNameUpdateZip">
                          </span></div>
                      </div>
                      <script type="text/javascript">
Meetup.LocPicker.Menu.ELEM_TAG = "div";
Meetup.LocPicker.initialZip = "";
Meetup.LocPicker.initialCountry = "us";
Meetup.LocPicker.initialState = "";
</script> 
                      <script type="text/javascript">
Meetup.Copy.locPickerZipCode = "ZIP code";
Meetup.Copy.locPickerPostalCode = "Postal Code";
Meetup.Copy.locPickerPostcode = "Postcode";
Meetup.Copy.locPickerCity = "City";
Meetup.Copy.locPickerloadingCities = "Loading cities&hellip;";
Meetup.Copy.locPickerProvince = "Province";
Meetup.Copy.locPickerSelectProvince = "Select a Province";
Meetup.Copy.locPickerSelectCity = "Select a City";
Meetup.DOMReady.ready(function(){
if(Meetup.LocPicker) Meetup.LocPicker.__init__();
});
</script> 
                    </div>
                  </div>
                </div>
              </div>
              <div class="element J_hasHelp" id="groupName">
                <div class="label">
                  <label class="th">Group name</label>
                </div>
                <div class="input">
                  <input type="text" name="name" id="name" value="" maxlength="60" class="J_helped hasMaxLen maxChars60 text maxLenAdded">
                  <div style="display: none; " class="limit-container"><span class="limit" id="charCount_name">60 characters left</span></div>
                  <div class="J_help D_help" id="J_locNameExample">
                    <div class="D_help_head" style="width: 250px;"> A great group name tells <u>where you are</u> and <u class="D_nobr">what you're about</u>, like… </div>
                    <div class="D_help_body">
                      <ul>
                        <li>The <span class="J_cityName">New York</span> Moms Meetup Group</li>
                        <li>The <span class="J_cityName">Chicago</span> Hiking Meetup Group</li>
                        <li>The <span class="J_cityName">London</span> Chihuahua Meetup Group</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="element" id="headline">
                <div class="label">
                  <label class="th">Home page headline</label>
                </div>
                <div class="input">
                  <input type="text" name="headline" id="headline" value="Welcome!" maxlength="60" class="hasMaxLen maxChars60 text maxLenAdded">
                  <div style="display: none; " class="limit-container"><span class="limit" id="charCount_headline">52 characters left</span></div>
                </div>
              </div>
              <div class="element J_hasHelp" id="desc">
                <div class="label">
                  <label class="th">Group description</label>
                </div>
                <div class="input">
                  <textarea name="short_desc" id="short_desc" class="J_helped"></textarea>
                  <div class="J_help D_help">
                    <div class="D_help_head"> A great group description explains… </div>
                    <div class="D_help_body">
                      <ul>
                        <li>why you decided to start the group</li>
                        <li>the purpose of the group</li>
                        <li>who should join</li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="element" id="who">
                <div class="label">
                  <label class="th">What are members called?</label>
                  <p class="explain">Ex: Knitters, Hikers, Moms, Chihuahua Lovers</p>
                </div>
                <div class="input">
                  <input type="text" id="who" name="who" value="Members" maxlength="32" class="hasMaxLen maxChars32 text maxLenAdded">
                  <div style="display: none; " class="limit-container"><span class="limit" id="charCount_who">25 characters left</span></div>
                </div>
              </div>
              <div class="urlPicker element">
                <div class="label">
                  <label class="th">Web address</label>
                  <p class="explain">Customize the web address of your group! <a href="http://www.meetup.com/help/?sub=urlname&amp;op=popup" target="_blank" class="popFAQ">Learn more</a>.</p>
                </div>
                <div class="input">
                  <div class="D_urlPreview"> <span class="noEdit">meetup.com/</span>
                    <input type="text" id="new_urlname" name="new_urlname" value="" class="maxChars60 text" autocomplete="off">
                  </div>
                  <input type="hidden" name="chapter_id" value="0">
                </div>
              </div>
              <div class="calltoaction" style="background: #f2f2f2; text-align: left; border-radius: 0 0 3px 3px; -moz-border-radius: 0 0 3px 3px; margin-top: -1em; margin-bottom: 1em; padding-top: 1em;">
                <div class="element">
                  <div class="label">
                    <label>Your name:</label>
                  </div>
                  <div class="input">
                    <input style="width: 90% !important" type="text" class="text" name="realname" value="">
                  </div>
                </div>
                <div class="element">
                  <div class="label">
                    <label>Your email:</label>
                  </div>
                  <div class="input">
                    <input style="width: 90% !important" type="text" class="text" name="email" value="">
                  </div>
                </div>
                <div class="element">
                  <div class="label">
                    <label>Create a password:</label>
                  </div>
                  <div class="input">
                    <input style="width: 90% !important" type="password" class="text" name="password" value="">
                  </div>
                  <div class="input">
                    <table class="inputs">
                      <tbody>
                        <tr class="last">
                          <td class="input"><input type="checkbox" name="rememberme" id="rememberme"></td>
                          <td><label for="rememberme">Remember me on this computer</label></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="element element_lastInGroup">
                  <div class="">
                    <div class="input">
                      <table class="inputs">
                        <tbody>
                          <tr class="last">
                            <td class="input"><input type="checkbox" name="pbm" id="pbm" value="agreed"></td>
                            <td><label for="pbm">I pledge to create real, face-to-face community</label></td>
                          </tr>
                        </tbody>
                      </table>
                      <input type="hidden" name="pbmSplit" value="true">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="D_boxfoot">
        <table align="center">
          <tbody>
            <tr>
              <td><div style="text-align: center">
                  <input type="submit" class="D_submit" id="submitAll" name="goto" value="Next" tabindex="0">
                  <input type="hidden" name="Next" value="theme">
                </div></td>
            </tr>
          </tbody>
        </table>
        <input type="hidden" name="couponcode" value="">
        <input type="hidden" name="s" value="">
        <input type="hidden" name="memberId" value="">
        <input type="hidden" name="chapterId" value="0">
        <input type="hidden" name="token" value="13149251863550.11783932327660429">
        <input type="hidden" name="startPoint" value="">
        <input type="hidden" name="createPage" value="">
        <input type="hidden" name="showsub" value="">
        <p class="D_less" style="margin-top: 8px;"><strong> By submitting this form, you agree to Meetup's <a href="http://www.meetup.com/terms/" target="_blank">Terms of Service</a> </strong></p>
      </div>
    </form>
    
    
    
    
  </div>
</div>
