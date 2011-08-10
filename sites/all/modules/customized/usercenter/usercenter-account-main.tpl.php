<div class="D_boxsection ">
    <div class="D_box clearfix">
        <div class="D_boxbody">
            <div class="D_boxhead">
                <h2 id="alerts">Your Account</h2>
            </div>
        
            <div class="D_boxsection divby3">
   
                <div class="D_col spans2 first">
                    <div class="D_colbody">		
                        <table summary="Personal information" class="fields D_personalInformation">
                            <tbody>
                            <tr> <td class="fieldname"> <strong>Name:</strong> </td>
                            <td><?php print $user->name; ?><a class="D_inlineAction" href="">edit</a></td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>User ID:</strong>
                            </td><td>
                            user <?php print $user->uid ; ?>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>Email address:</strong>
                            </td><td>
                            <?php print $user->mail; ?>
                            <a class="D_inlineAction" href="http://www.meetup.com/account/email/">edit</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>Password:</strong>
                            </td><td>
                            (Hidden)
                            <a class="D_inlineAction" href="https://secure.meetup.com/account/password">edit</a>
                            </td>
                            </tr>
                            <tr>
                            <td class="fieldname">
                            <strong>Location:</strong>
                            </td><td>
                            Potomac, MD
                            <a class="D_inlineAction" href="http://www.meetup.com/account/city/">edit</a>
                            </td>
                            </tr>
                            <tr>
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
                            <a class="D_inlineAction" href="http://www.meetup.com/account/language/">edit</a>
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
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="D_col spans1 last">
                    <div class="D_colbody">
                        <a href=""><img title="" alt="Add your photo!" src="<?php global $base_url; print $base_url.'/'.$user->picture;?> "></a>
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
