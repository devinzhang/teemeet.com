<div class="D_boxsection " style="border-top:0px solid #CCC; width:780px;">
    <div class="D_box clearfix">
        <div class="D_boxbody">
            <div class="D_boxhead">
                <h2 id="alerts">您的帐户信息</h2>
            </div>
        
            <div class="D_boxcols divby3">
   
                <div class="D_col spans2 first">
                    <div class="D_colbody">		
                        <table summary="Personal information" class="fields D_personalInformation">
                            <tbody>
                            <tr> <td class="fieldname"> <strong>姓名:</strong> </td>
                            <td><?php print $user->name; ?><a class="D_inlineAction" href="<?php print url('account/' . $user->uid . '/name');?>">编辑</a></td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>用户编号:</strong>
                            </td><td>
                            # <?php print $user->uid ; ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>邮件地址:</strong>
                            </td><td>
                            <?php print $user->mail; ?>
                            <a class="D_inlineAction" href="<?php print url('account/' . $user->uid . '/email');?>">编辑</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>密码:</strong>
                            </td><td>
                            (隐藏)
                            <a class="D_inlineAction" href="<?php print url('account/' . $user->uid . '/pass');?>">编辑</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>地址:</strong>
                            </td><td>
                           <?php  $account = user_load($user->uid); print '<span class="locality">'.$account->locations[0]['city'].'</span>&nbsp<span class="region">'.$account->locations[0]['province_name'].'</span>'; ?>
                            <a class="D_inlineAction" href="<?php print url('account/' . $user->uid . '/location');?>">编辑</a>
                            </td>
                            </tr>
                          <!--  <tr>
                            <td class="fieldname">
                            <strong>Hometown:</strong>
                            </td><td>
                            Not entered
                            <a class="D_inlineAction" href="http://www.meetup.com/account/city/">edit</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>Language:</strong>
                            </td><td>
                            English (US)
                            <a class="D_inlineAction" href="<?php print url('account/' . $user->uid . '/language');?>">edit</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>Bio:</strong>
                            </td><td>

                            <a class="D_inlineAction" href="http://www.meetup.com/account/bio/">add</a>
                            </td>
                            </tr>
                            <tr class="last">
                            <td class="fieldname">
                            <strong>Follow me on:</strong>
                            </td><td>



                            <a class="D_inlineAction" href="http://www.meetup.com/account/services/">add</a>

                            </td>
                            </tr>-->
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="D_col spans1 last">
                    <div class="D_colbody">
                        <?php if($user->picture !=''){
							print theme('imagecache','avator_50x50',$user->picture );
							}else{
							print theme('imagecache','avator_50x50',drupal_get_path('theme','fusion_teemeet').'/images/default_avator.png');
							}
							?>
                        <ul class="D_actions">
                            <li class="shouldDo">
                                <a class="D_meta" href="<?php print url('user/'.$user->uid.'/photos'); ?>"><?php print t('Manage your photos');?></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
