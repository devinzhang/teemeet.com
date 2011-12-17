<?
function downloader_main_form(&$form_state)
{    
    //远程文件的url
    $form['remote_file_url'] = array
    (        
        '#type'           => 'textfield',
        '#title'          => t('远程url'),
        '#description'    => t('请输入远程文件的完整url'),
        '#size'           => 128,
        '#default_value'  => '', 
    );
    
    //下载到的路径，相对站点根目录
    /*$form['local_file_path'] = array
    (
        '#type' => 'radios', 
        '#title' => t('模块或者主题'),        
        '#options' => array(t('Modules文件夹'), t('Themes文件夹')),
        '#default_value'  => isset($form_state['post']['local_file_path']) ? $form_state['post']['local_file_path'] : 0, 
    );*/
    
    //是否解压
    $form['unzip'] = array
    (
        '#type'           => 'checkbox', 
        '#title'          => t('是否解压'),
        '#default_value'  => isset($form_state['post']['unzip']) ? $form_state['post']['unzip'] : 1, 
        '#attributes'     => array('class' => 'enabled'),
    );
    
    //是否删除压缩包
    $form['unlink'] = array
    (
        '#type'           => 'checkbox', 
        '#title'          => t('是否删除压缩包'),
        '#default_value'  => isset($form_state['post']['unzip']) ? $form_state['post']['unzip'] : 1, 
        '#attributes'     => array('class' => 'enabled'),
    );
    
    $form['download_dir'] = array
    (
        '#type'           => 'textfield',
        '#title'          => t('本地保存路径，相对于sites'),
        '#size'           => 128,
        '#default_value'  => variable_get('download_dir', 'all'), 
    );
    
    $form['submit'] = array('#type' => 'submit', '#value' => t('执行'));
    

    
    return $form;
}

function downloader_main_form_submit($form, &$form_state)
{    
    $dir = $form_state['values']['download_dir'];
    variable_set('download_dir', $dir);
    //drupal_set_message('本地 ' . $form_state['values']['local_file_path']);
    //drupal_set_message('是否解压缩 ' . $form_state['values']['unzip']);
    
    //获取远程文件
    $http = drupal_http_request($form_state['values']['remote_file_url']);
    if($http->code != 200)
    {
        //如不存在返回错误
        drupal_set_message('无效的远程地址 ' . $form_state['values']['remote_file_url']);
        return ;
    }
    else
    {
        //若存在则保存到路径
        $filename = basename($form_state['values']['remote_file_url']);
        $save_path = dirname($_SERVER['SCRIPT_FILENAME']) . '/sites/' . $dir . '/' . $filename;
        //drupal_set_message($save_path);
        /*switch($form_state['values']['local_file_path'])
        {
            case 0:
                $save_path = $path . '/modules/' . $filename;
            break;
            case 1:
                $save_path = $path . '/themes/' . $filename;
            break;
        }*/
        file_put_contents($save_path, $http->data);
        drupal_set_message('远程地址下载成功 ' . $form_state['values']['remote_file_url']);      
    }
    //若需要解压缩则解压缩    
    if($form_state['values']['unzip'])
    {
        drupal_set_message('解压缩' . $save_path);
        require_once('zip.class.inc');
        
        //判断文件后缀名
        $ext = pathinfo($form_state['values']['remote_file_url'], PATHINFO_EXTENSION);
        switch($ext)
        {
            case 'tar':
                $zipFile = new tar_file($save_path);
            break;
            case 'gz':
                $zipFile = new gzip_file($save_path);
            break;
            case 'zip':
                $zipFile = new zip_file($save_path);
            break;
        }
        $zipFile->set_options(array('overwrite' => 1, 'basedir' => dirname($save_path)));
        $zipFile->extract_files();
        foreach($zipFile->error as $error)
        {
            drupal_set_message($error);
        }
        if($form_state['values']['unlink'])
        {
            unlink($save_path);
            drupal_set_message('源文件删除成功');
        }
    }
}

