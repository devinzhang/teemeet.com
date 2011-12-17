<?php 

  //print_r ($form);
 


?>
<div class="" id="rsvpBox">
	<h3 class="rsvp-box-block"><?php print t('Will you attend?'); ?></h3>
	<div id="rsvp-box-action" class="rsvp-box-block rsvp-box-action validate">
			<?php print drupal_render($form['attend']); ?>		
		</div>
	<div class="rsvp-box-block rsvp-box-guest"><span class="rsvp-box-guest-plus">+</span>
		<?php print drupal_render($form['guest']); ?>
		<label for="guests">客人</label>
	</div>
	<div class="rsvp-box-block rsvp-box-comment">
		<?php print drupal_render($form['message']); ?>
	<!--	<div class="limit-container" style="display: none;">
			<span id="charCount_rsvpComments" class="limit">250 characters left</span>
		</div>
		-->
	</div>
	<div class="rsvp-box-section">
			<?php print drupal_render($form['rsvp_submit']); ?>
			<span class="rsvp-callout-flipcard days">
				<span class="rsvp-callout-flipcard-ring"></span>
					<span class="rsvp-callout-count"><?php print $form['reminder_days']['#value']; ?></span>
						<span class="rsvp-callout-leftcopy">
							天<br>
							剩余
							</span>
							</span>
	</div>
	
</div>

<?php print drupal_render($form);  ?>
