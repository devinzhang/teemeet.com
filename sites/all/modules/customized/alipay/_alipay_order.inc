<?php

function alipay_order_confirm() 
{
    $form['subject'] = array
    (
        '#type' => 'textfield',
        '#title' => t('商品/服务名称')
    );
    
    $form['total_fee'] = array
    (
        '#type' => 'textfield',
        '#title' => t('总金额')
    );
    
    $form['alibody'] = array
    (
        '#type' => 'textfield',
        '#title' => t('备注'),
    );
    
    $form['submit'] = array
    (
        '#type' => 'submit',
        '#value' => t('订单提交')
    );
    
    
    return $form;
}

function alipay_order_confirm_submit($form, &$form_state)
{
    $alipay_config = variable_get('alipay_settings', array());
    if(empty($alipay_config))
    {
        drupal_set_message(t('请先设置支付宝即时到帐相关参数'));
        drupal_goto(url('admin/settings/alipay/setting'));
    }
    
    module_load_include('php', 'alipay', '/lib/alipay_service.class');
    $out_trade_no = date('Ymdhis');
    $subject      = $form_state['values']['subject'];
    $body         = $form_state['values']['alibody'];
    $total_fee    = $form_state['values']['total_fee'];
   
    $parameter = array
    (
		"service"			=> "create_direct_pay_by_user",
		"payment_type"		=> "1",
		
		"partner"			=> trim($alipay_config['partner']),
		"_input_charset"	=> trim(strtolower($alipay_config['input_charset'])),
        "seller_email"		=> trim($alipay_config['seller_email']),
        "return_url"		=> trim($alipay_config['return_url']),
        "notify_url"		=> trim($alipay_config['notify_url']),
		
		"out_trade_no"		=> $out_trade_no,//请与贵网站订单系统中的唯一订单号匹配
		"subject"			=> $subject,//订单名称，显示在支付宝收银台里的“商品名称”里，显示在支付宝的交易管理的“商品名称”的列表里。
		"body"				=> $body,//订单描述、订单详细、订单备注，显示在支付宝收银台里的“商品描述”里
		"total_fee"			=> $total_fee, //订单总金额，显示在支付宝收银台里的“应付总额”里
		
		"paymethod"			=> '',
		"defaultbank"		=> '',
		
    );

    //构造即时到帐接口
    $alipayService = new AlipayService($alipay_config);
    $html_text = $alipayService->create_direct_pay_by_user($parameter);
    //return $html_text;
    //print_r($alipay_config);
    //print_r($parameter);die;
    //return $html_text;
    exit($html_text);
    
}