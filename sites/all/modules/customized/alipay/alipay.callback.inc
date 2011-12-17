<?php

function alipay_notify()
{
    //添加进去
    $info = explode('-', $_GET['subject']);
    $service = node_load($info[1]);
    $group = node_load($info[2]);
    
    $group->field_deal_record[]['nid'] = $service->nid;
    if(!$group->field_date_valuable[0]['value'])
    {
        $group->field_date_valuable[0]['value'] = date('Y-m-d', time());
    }
    $group->status = 1;
    $group->field_date_valuable[0]['value'] = group_addTime($group->field_date_valuable[0]['value'], $service->field_period_valuable[0]['value']);    

    node_save($group);

    drupal_set_message(t('小组续费成功！'));
    drupal_goto(url('node/' . $group->nid));
}


function alipay_return()
{
    echo 'return';die;
}

//todo move the function to group module
function group_addTime($time, $addition)
{
    $orgTime_0 = explode(' ', $time);    

    $orgTime = explode('-', $orgTime_0[0]);
    $addTime = explode('-', $addition);

    for($i = 0; $i < 3; $i ++)
    {
        $new[$i] = $orgTime[$i] + $addTime[$i];
    }

    $return = implode('-', $new);
    if($orgTime_0[1])  $return .= ' ' . $orgTime_0[1];
    return $return;
}