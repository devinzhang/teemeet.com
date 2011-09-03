<?
/*
 ** This file handle the group album function
 **
 */

 /*menu call back
  ** manage the profile questions
 **
 */
function og_album_album_list($gid){
    drupal_set_title(t(''));
    drupal_add_css(drupal_get_path('module','og_album').'/css/og_album.css');
    $output = '';
    $albums = og_album_get_albums($gid);
    $is_group_admin = og_album_is_group_admin($gid);
    if(empty($albums) && !og_album_is_group_admin($gid)){
    drupal_set_message(t('Since there are no albums, photos can\'t be added'),'warning');
    }   
    $group = $GLOBALS['current_group'];
    $output .= theme('og_album_list', $group, $albums, $is_group_admin);    
    return $output;
}

/*menu callback to upload a new photo
**
**
*/
function og_album_photo_upload($gid){
    $output = '';

    $output .= drupal_get_form('og_album_photo_upload_form', $gid);
    return $output; 
}


/* submit a new image form 
 *
 */
 
function og_album_photo_upload_form(&$form_state, $gid) {
 $form=array();   
 $albums = og_album_get_albums($gid, TRUE); 

 $select_options = array(
    t('Use Exist Album'), 
    t('Create a new Album'),
);
    $defaul_value = 0; 
 if(empty($albums)){
    unset($select_options[0]);
    $defaul_value = 1; 
    if(og_album_is_group_admin($gid)) {
    
    }
 } else{
     $form['album'] = array(
      '#type' => 'select',
      '#title' => t('Choose your album'),
      '#default_value' => '',
      '#options' => $albums   
    );
 }
 $form['album_select'] = array(
  '#type' => 'radios',
  '#title' => t('Select Album'),
  '#default_value' => $defaul_value,
  '#options' => $select_options,
  );

$form['album_title'] = array(
  '#type' => 'textfield',
  '#title' => t('Album title'),
  '#default_value' =>'' ,
  '#prefix' => '<div class="poll-form">',
  '#suffix' => '</div>',
  '#size' => 60,
  '#maxlength' => 128,
  '#required' => false,
);


 $form['image'] = array(
    '#type' => 'image_upload_element',
    '#title' => t('Add profile photo'),
    '#default_value' => '', // {files} object
    '#image_preview_size' => '200x200',
    '#file_validators' => array(         
          'file_validate_extensions' => array('txt gif jpg jpeg'),
        ),
      '#required' => true,    
  );
  $form['gid'] = array(
    '#type' => 'hidden', 
    '#value' => $gid
    
  );
  
$form['submit'] = array(
    '#type' => 'submit', 
    '#value' => t('Submit'),
);

  return $form;
}

function og_album_photo_upload_form_submit($form, &$form_state) {
    $value = $form_state['values'];
    if($value['album_select']) { // if this is a new created album
        $title = $value['album_title'];
        global $user; 
        $aid = og_album_create_album_node($title, $user); 
        $amout = db_result(db_query("select count(*) from ".OG_ALBUM_TABLE." where gid=%d",$value['gid']));
        $amout =  $amout +1; 
        db_query("INSERT INTO ".OG_ALBUM_TABLE." (aid, uid, gid, album_thumbnail, weight) VALUES (%d, %d, %d, %d, %d)", $aid, $user->uid, $value['gid'], 0, $amout);
        
    } else {
        $aid = $value['album'];
    }
    
    if($value['image']) {
      $image_id = upload_element_save($value['image'], 'upload_element', FILE_EXISTS_RENAME, 'imagecache_preset');
      $img_path=db_result(db_query("select f.filepath from {files} as f where f.fid=%d ", $image_id));
      $pid = og_album_create_photo_node($img_path,$user); 
      db_query("INSERT INTO ".OG_ALBUM_PHOTOS_TABLE." (pid, aid, fid,is_group_photo) VALUES (%d, %d, %d, %d)", $pid, $aid, $image_id,1);
       if($value['album_select']) { // if this is a new create album, then the first picture as a cover
        db_query("UPDATE ".OG_ALBUM_TABLE." SET album_thumbnail=%d where aid=%d", $image_id, $aid ); 
       }
    }
  
  drupal_goto('album/ingroup/'.$value['gid']);
    
}

/** menu callback to get a photo's all information
** @para $nid, the node nid
** @return , json format 
*/
function og_album_ajax_get_photo($nid){
    $node = node_load($nid);
    $album_thumbnail = db_result(db_query("select album_thumbnail from ".OG_ALBUM_TABLE." where aid=%d",$node->photo['aid'] )); 
    $is_group_photo = db_result(db_query("select is_group_photo from ".OG_ALBUM_PHOTOS_TABLE." where pid =%d", $pid) ); 
    $set_form = array('is_group_photo'=>$is_group_photo, 'is_ablum_thumbnail'=> ($album_thumbnail == $nid));
  
     drupal_json(array('status'=>'true','node'=>$node, 'set_form'=> $set_form));
   
}

/*menu callback 
** upload a photo into a albrm directly
** @aid, the album nid
*/
function og_album_upload_directly($aid) {
        echo drupal_get_form('og_album_upload_photo_directly_form', $aid); 
}
