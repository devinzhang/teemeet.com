<?php 
 //echo '<pre>';
 //print_r ($form);
 //echo '</pre>';

?>

<div class="D_box">
    <div class="D_boxbody">
        <div class="D_boxhead">
            <h1>发起新的讨论贴</h1>
                <p><strong>这个帖子会被所有的人看到</strong></p>
        </div>
        <div class="D_boxsection">
            <div class="D_form">
                <div class="element">
                   <?php print drupal_render($form['title']); ?>
                </div>    
                
                <div class="element">
                   <?php print drupal_render($form['body_field']); ?>
                </div> 
                
            </div>
        </div>
    </div>
</div>
<?php print drupal_render($form);  ?>