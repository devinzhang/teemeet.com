<link rel="stylesheet" href="http://static2.meetupstatic.com/5329144513340382224270/style/meetup.css" type="text/css" />
<?php // print $scripts ?>
<style type="text/css">
.form-item label {
display: block;
font-weight: bold;
font-size: 1.1em;
}

.form-item {
border-bottom: 1px dotted #CCC;
margin-bottom: 1em;
padding-bottom: 1em;
}
#C_document {margin:0}
#edit-scheme-wrapper,#palette .form-item {width:290px}

</style>


<div class="D_box">
  <div class="D_boxbody">
  <? echo $message?>
  <? echo $content ?>
  
  
  <? if(!$user->uid): //若未登录不能建立小组 ?>
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
<tbody><tr class="last">
<td class="input"><input type="checkbox" name="rememberme" id="rememberme"></td>
<td><label for="rememberme">Remember me on this computer</label></td>
</tr>
</tbody></table>
</div>
</div>
<div class="element element_lastInGroup">
<div class="">
<div class="input">
<table class="inputs">
<tbody><tr class="last">
<td class="input"><input type="checkbox" name="pbm" id="pbm" value="agreed"></td>
<td><label for="pbm">I pledge to create real, face-to-face community</label></td>
</tr>
</tbody></table>
<input type="hidden" name="pbmSplit" value="true">

</div>
</div>
</div>
</div>
  <? endif; ?>  
  </div>
</div>
