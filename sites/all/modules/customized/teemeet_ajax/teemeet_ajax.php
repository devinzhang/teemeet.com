<?php

function teemeet_ajax()
{
    //定义允许执行的函数列表
    $func_list = array
    (
        'pathCheck', //path检查ajax
        'scheduleMeetup', //添加meetup表单ajax
        'scheduleMeetup_save', //添加meetup保存
    );
    
    //执行函数返回结果
    if($_GET['func'] and function_exists($_GET['func']) and in_array($_GET['func'], $func_list))
    {
        eval($_GET['func'] . '();');
    }
    else
    {
        drupal_goto('<front>');
    }
}

function pathCheck()
{
    if(!$_GET['path'] or $path = drupal_lookup_path('source', $_GET['path']))
    {     
        echo drupal_json(1);   
    } 
    else
    {
        echo drupal_json(0); 
    }
}

function scheduleMeetup()
{
    $output = '';
    $path = drupal_get_path('module', 'jquery_ui');
    $output.= '<script src="/' . $path . '/jquery.ui/ui/ui.datepicker.js"></script>';    
    $path = drupal_get_path('module', 'date_popup');
    $output.= '<script src="/' . $path . '/lib/jquery.timeentry.pack.js"></script>'; 
    $output .= <<<EOF
<div class="lma-form" id="lma-form">
  <form action="#" method="post" id="lmaform">
    <div class="lma-field line  lma-hide">
      <p class="lma-question lma-hide edit "> 我们干点啥? <span class="required">(必填)</span> </p>
      <input type="text" name="title" id="title" value="" class="textInputTip hasMaxLen maxChars80 require ghost maxLenAdded validate" title="Let's Meetup and...">
      <div style="display: none; " class="limit-container"><span class="limit" id="charCount_title">61 characters left</span></div>
    </div>
    <div class="lma-field line  lma-hide" id="lma_descr">
      <p class="lma-question">详细信息:</p>
      <textarea name="descr" id="descr" class="hasMaxLen maxChars50000 maxLenAdded"></textarea>
      <div style="display: none; " class="limit-container"><span class="limit" id="charCount_descr">50,000 characters left</span></div>
    </div>
    <div class="lma-field line  lma-hide" id="lma_when">
      <p class="unit size3of5 lma-question"><span class="">时间:</span> <input type='text' name='when' id='date' /> 
      
      </p>
      <p class="unit lastUnit"></p>
    </div>
    <div class="lma-field line lma-hide" id="lma_where">
      <p class="unit size3of5 lma-question"><span class="">地点:</span> <input type='text' name='where' id='where'/></p>
    </div>
    
    <div class="lma-hide lma-foot">      
      <input type="hidden" name="gid" id="gid" value="{$_GET[gid]}">
      <input type="submit" id="lma-submit" class="D_submit_grad" value="创建这个活动">
      <input type="button" id="lma-close" class="D_submit_grad" value="取消">
    </div>
  </form>
  <div id="dialog" style="position: fixed; width: 340px; height: auto; top: 162.5px; left: 504.5px; color: black; background-color: white; border: 3px solid black; z-index: 101; padding-left: 15px; padding-right: 15px; display: none;">
test
  </div>
</div>
EOF;

    $output .= <<<EOF
    <script>
    $(document).ready(function(){
        $('#date').datepicker();
        $('#lma-form').submit(function(){
            $.ajax({
                type: "POST",
                async: true,
                url: "/ajax?func=scheduleMeetup_save",
                data: {title: $('#title').val(), descr : $('#descr').val(), when : $('#date').val(), where : $('#where').val(), gid : $('#gid').val()},
                success: function(msg){
                    $('#dialog').show(1000);
                    $('#dialog').html(msg);
                    $(document).mousedown(function(){
                         window.location.reload();
                         $('#dialog').hide(1000);
                         
                    });
                }
            });
            
            return false;
        }) 
        $('#lma-close').click(function(){
            $('#lma-form').hide(1000);
            
        });       
    });
    </script>
    
EOF;
    echo $output;
}

function scheduleMeetup_save()
{
    if(!$_POST['title'])
    {
        echo t('新建活动失败!');
    }
    
    global $user;
    $date = explode('/', $_POST['when']);
    $d = $date[2] . '-' . $date[0] . '-' . $date[1];
    $node = new stdClass;
    $node->type = 'event';
    $node->uid = $user->uid;

    $node->event = array
    (
        'start' => $d . ' 00:00:00',
        'end' => $d . ' 00:00:00',
        'start_exploded' => array
        (
            'year' => $date[2],
            'month' => $date[0],
            'day' => $date[1],
            'hour' => 00,
            'minute' => 00,
            'second' => 00
        ),
        'start_orig' =>  $d . ' 00:00:00',
        'end_orig' =>  $d . ' 00:00:00',
        'timezone' => '230',
        'offset' => '08:00:00',
        'offset_dst' => '08:00:00',
        'dst_region' => 0,
        'has_time' => 1,
        'node_type' => 'event'    
    );
    $node->body = $_POST['desc'];
    $node->title = $_POST['title'];
    $node->og_groups = array($_POST['gid'] => $_POST['gid']);
    $node->location = array('additional'=>  $_POST['where']);
    $node->locations = array($node->location);
    $node->is_featured = false;
    //print_r($node);
    node_save($node);
    if($node->nid)
    {        
        echo t('新建活动成功!');
    }
    else
    {
        echo t('新建活动失败!');
    }

    //$node->og_groups_both
}