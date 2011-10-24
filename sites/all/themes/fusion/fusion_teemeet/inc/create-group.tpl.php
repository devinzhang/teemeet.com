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
  
  
  <? if(!$user->uid): //?>
	<div class="no-create-group">
		<h3>您没有足够的权限来创建小组,您可以继续下面的操作</h3>
		
		请先在这里注册帐号，然后再创建小组
		<ul>
			<li><a href="<?php print url('user/register'); ?>">加入Teemeet</a></li>
			<li><a href="<?php print url('search/node/'); ?>">随便浏览，查看其他小组</a></li>
		</ul>
		
	</div>
  <? endif; ?>  
  </div>
</div>
