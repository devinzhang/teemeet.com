<?php

function teemeet_ajax()
{
    //��������ִ�еĺ����б�
    $func_list = array
    (
        'pathCheck'
    );
    
    //ִ�к������ؽ��
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