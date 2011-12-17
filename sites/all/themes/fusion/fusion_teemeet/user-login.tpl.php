
<div class="D_boxbody">
	<div id="helloPanes">
		<div class="D_boxhead">
			<h1>用户登录</h1>
				<ul class="D_actions">
				<li class="canDo">
				还没有注册？
				<a class="omnCamp omnrg_login" href="<?php print url('user/register'); ?>">注册</a>
				</li>
				</ul>

		</div>
		<div class="D_boxsection isMeetup">
<div class="D_form embiggen">
<div class="element">
<div class="label">
<label>用户名或者邮件地址:</label>
</div>
<div class="input">
<?php  print drupal_render($form['name']); ?>
</div>
</div>
<div class="element">
<div class="label">
<label>
密码:
</label>
<p class="explain">

<a href="<?php print url('user/password'); ?>">
忘记密码?
</a>

</p>
</div>
<div class="input">
<?php  print drupal_render($form['pass']); ?>

</div>
<div class="input">
<table class="inputs" summary="">
<tbody><tr class="last">
<td>
<?php  print drupal_render($form['remember_me']); ?>
</td>
</tr>
</tbody></table>
</div>
</div>
<div style="text-align: left;" class="footElement">
<?php print drupal_render($form['submit']);?>
</div>
</div>

</div>
	</div>	
</div>

<?php print drupal_render($form['form_build_id']);?>
<?php print drupal_render($form['form_token']);?>
<?php print drupal_render($form['form_id']);?>
