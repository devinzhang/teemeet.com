<?php

function alipay_setting()
{
    //$default = array();
    $aliapy_config = variable_get('alipay_settings', array());
    $form['partner'] = array
    (
        '#title' => t('合作者id'),
        '#type' => 'textfield',
        '#size' => 16,
        '#description' => t('合作身份者id，以2088开头的16位纯数字'),
        '#default_value' => $aliapy_config['partner']
    );
    
    $form['key'] = array
    (
        '#title' => t('安全检验码'),
        '#type' => 'textfield',
        '#size' => 32,
        '#description' => t('安全检验码，以数字和字母组成的32位字符'),        
        '#default_value' => $aliapy_config['key']
    );
    
    $form['seller_email'] = array
    (
        '#title' => t('支付宝帐号'),
        '#type' => 'textfield',
        '#size' => 32,
        '#default_value' => $aliapy_config['seller_email'],
        '#description' => t('签约支付宝账号或卖家支付宝帐户')
    );
        
    $form['transport'] = array
    (
        '#title' => t('访问模式'),
        '#type' => 'radios',
        '#options' => array
        (
            'http' => 'http',  
            'https' => 'https'
        ),
        '#default_value' => $aliapy_config['transport'],
        '#description' => t('根据自己的服务器是否支持ssl访问，若支持请选择https；若不支持请选择http')
    );
    
    $form['return_url'] = array
    (
        '#type' => 'textfield',
        '#size' => 32,
        '#default_value' => $aliapy_config['return_url'],
        '#title' => t('页面跳转同步通知页面路径'),
        '#description' => t('要用 http://格式的完整路径，不允许加?id=123这类自定义参数, 域名不能写成http://localhost/ ，否则会导致return_url执行无效')
    );
    
    $form['notify_url'] = array
    (
        '#type' => 'textfield',
        '#size' => 32,
        '#default_value' => $aliapy_config['notify_url'],
        '#title' => t('服务器异步通知页面路径'),
        '#description' => t('服务器异步通知页面路径，要用 http://格式的完整路径，不允许加?id=123这类自定义参数')
    );  
      
    $form['submit'] = array
    (
        '#type' => 'submit',
        '#value' => t('Save')
    );
    return $form;
}

function alipay_setting_submit($form, &$form_state)
{
    $aliapy_config = array
    (
        'partner' => $form_state['values']['partner'],
        'key' => $form_state['values']['key'],
        'seller_email' => $form_state['values']['seller_email'],
        'return_url' => $form_state['values']['return_url'],
        'notify_url' => $form_state['values']['notify_url'],
        'sign_type' => 'MD5',
        'input_charset' => 'utf-8',
        'transport' => $form_state['values']['transport']
    );
    variable_set('alipay_settings', $aliapy_config);
    drupal_set_message(t('Settings Saved.'));
}