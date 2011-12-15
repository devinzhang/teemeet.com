<?php
 /* sponsorships landing page 
 **
 */
 
 ?>
<div class="D_box" id="sponsorSplash"> 
<div class="D_boxsection isNotDivided ">
	
<div id="blurb">

<p>发现新客户，提升你的品牌或者仅仅是支持下你们本地的社团.提供一个福利给你们的小组! </p>
</div>
<div class="clearfix" id="groups">
<div class="group">
<div id="group1" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/pupsAndUpPlayGroup.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
来自青岛市的登山户外商品店
</div>
<div class="followup">
正在提供 <strong>15%的打折折扣</strong>
给青岛登山小组的会员
</div>
</div>
<div class="group">
<div id="group2" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/southFloridaScubaMUG.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
北京足球俱乐部
</div>
<div class="followup">
正在提供<strong>10%折扣和免费饮料</strong>
给会员来自北京海淀回龙观小区足球爱好者小组
</div>
</div>
<div class="group">
<div id="group3" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/nycOutdoorFitness.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
时尚你我公司
</div>
<div class="followup">
正在提供<strong>100%现金支持</strong>
给上海爱美女士俱乐部小组
</div>
</div>
<div class="group">
<div id="group4" style="background: url(&quot;<?php global $base_url; echo $base_url.'/'.drupal_get_path('module','usercenter');?>/images/PortlandMahJongMUG.jpg&quot;) no-repeat scroll center center rgb(102, 102, 102);" class="photo">
</div>
<div class="main">
深圳iphone开发协会
</div>
<div class="followup">
提供<strong>测试用itouch</strong>
深圳iOS爱好者的会员
</div>
</div>
</div>
<div class="clearfix" id="chooseYourOwnAdventure">
<!--<div id="fullserv">
<h3>想做的更大点么?</h3>
<p>想获取每月10000RMB的收入？想获得更大推广？那就和你和你的组员们来加入吧.</p>
<a class="trampoline" href="">查找更多 →</a>
</div>
-->
<div id="selfserv">
<h3>提供一个福利给小组!</h3>
<ol>
<li>提供一个竞争力的折扣或者会员福利.</li>
<li>我们会来评估，批准并提供给相关的小组.</li>
<li>免费.<br><strong></strong></li>
</ol>

<div class="trampoline">
<?php
    
    if($sponsor){
    $ret =l(t('Go to your Sponsor Home →'),'node/'.$sponsor->nid);
    } else {
    $ret = l(t('Get Started  →'),'sponsor/create'); 
    }
    echo $ret;
    ?>
</div>

</div>
</div>

</div>
</div>