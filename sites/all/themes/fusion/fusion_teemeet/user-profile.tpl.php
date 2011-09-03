<?php
// $Id: user-profile.tpl.php,v 1.2.2.2 2009/10/06 11:50:06 goba Exp $

/**
 * @file user-profile.tpl.php
 * Default theme implementation to present all user profile data.
 *
 * This template is used when viewing a registered member's profile page,
 * e.g., example.com/user/123. 123 being the users ID.
 *
 * By default, all user profile data is printed out with the $user_profile
 * variable. If there is a need to break it up you can use $profile instead.
 * It is keyed to the name of each category or other data attached to the
 * account. If it is a category it will contain all the profile items. By
 * default $profile['summary'] is provided which contains data on the user's
 * history. Other data can be included by modules. $profile['user_picture'] is
 * available by default showing the account picture.
 *
 * Also keep in mind that profile items and their categories can be defined by
 * site administrators. They are also available within $profile. For example,
 * if a site is configured with a category of "contact" with
 * fields for of addresses, phone numbers and other related info, then doing a
 * straight print of $profile['contact'] will output everything in the
 * category. This is useful for altering source order and adding custom
 * markup for the group.
 *
 * To check for all available data within $profile, use the code below.
 * @code
 *   print '<pre>'. check_plain(print_r($profile, 1)) .'</pre>';
 * @endcode
 *
 * Available variables:
 *   - $user_profile: All user profile data. Ready for print.
 *   - $profile: Keyed array of profile categories and their items or other data
 *     provided by modules.
 *
 * @see user-profile-category.tpl.php
 *   Where the html is handled for the group.
 * @see user-profile-item.tpl.php
 *   Where the html is handled for each item in the group.
 * @see template_preprocess_user_profile()
 */
?>
<div class="profile">
    <div class="D_col spans2 first">
        <div class="D_colbody">		
            <div id="D_memberProfileAside">
                <div id="image_<?php print $user->uid; ?>">
                    <?php print $profile['user_picture']; ?>
                    <span class="D_inlineAction D_firstInlineAction"><?php print l(t('Manage Photos'), 'user/'.$user->uid.'/photos');?></span>
                </div>
                <div class="D_memberProfileContentChunk">
                    <h4>Follow me on:</h4>
                    <p class="D_less"><a href="">Add/edit links</a></p>
                </div>
            </div>
        </div>    
    </div>
    <div class="D_col spans4 last">
        <div class="D_colbody">
            <div id="D_memberProfileMain">
                <?php print $profile['Personal Infomation']; ?>
            </div>
        </div>    
    </div>
       
</div>

<div class="D_docsection divby5">
    <div class="D_col D_docCol spans3 first">
        <div class="D_colbody">
            <?php print $profile['summary']; ?>
        </div>
    </div>    
    <div class="D_col D_docCol spans2 last IE_lastCol">
        <div class="D_colbody">
		
        </div>
    </div>    
</div>
