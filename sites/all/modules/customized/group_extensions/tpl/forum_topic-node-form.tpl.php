<?php 
 //echo '<pre>';
 //print_r ($form);
 //echo '</pre>';

?>

<div class="D_box">
    <div class="D_boxbody">
        <div class="D_boxhead">
            <h1>Start new discussion</h1>
                <p><strong>This discussion will be viewable by everybody.</strong></p>
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