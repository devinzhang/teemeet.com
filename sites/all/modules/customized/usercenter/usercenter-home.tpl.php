<div id="homepage-user-<?php echo $user->uid; ?>" class="homepage">
    <div class="welcome">
        <b><?php echo t('Last login'); ?>：<?php echo format_date($user->login,'small'); ?> </b><?php echo t('Welcome back') . ', ' . $user->name; ?>.
    </div>

  
    <?php if($shortcuts): ?>
     <div class="shortcut">
		<h2 class="homepage-block-title"><?php echo t('I Want To'); ?> ... </h2>
        <div class= "homepage-block-body">
        <?php echo $shortcuts; ?>
        </div>
     </div>
	<?php endif; ?>

 	<?php if($interest): ?>
     <div class="interest">
		<h2 class="homepage-block-title"><?php echo t('You may be interest with the following ...'); ?> </h2>
        <div class= "homepage-block-body">
        <?php echo $interest; ?>
        </div>
     </div>
	<?php endif; ?>

</div>
