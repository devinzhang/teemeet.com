<tr class="bdMsgHead D_header">
                            <td id="<?php echo $topic['nid'];?> >" class="D_member first">
                            <a href=""><?php echo $topic['name']; ?></a>
                            </td>

                            <td class="last">
                                <div class="D_boardPostActions">
                                    <div class="D_timestamp">
                                        <span class="nobr"><?php echo t('Posted @time',array('@time'=>format_date($topic['created']))); ?></span>
                                    </div>
                                    <div style="float: right;">
                                        <ul class="D_boardActions">
                                            <li>
                                         <!--   <a href="">
                                            Link to this discussion
                                            </a>
                                            </li>
                                            -->
                                            <li><a href="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/view/editpost?post=53200342&amp;offset=0" class="orgTool">Edit</a></li>
                                            <li><a href="http://www.meetup.com/Beijing-Soccer-Lovers/messages/boards/view/deletethread?thread=15411132" class="orgTool"><?php echo $topic['ispost']? t('Delete thread') : t('Delete thread'); ?></a></li>
                                            <li><a href="">Quote in reply</a></li>
                                         </ul>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr class="bdMsgBody D_body">
                            <td class="D_member">
                                <a class="" href="<?php echo url($group->path.'/member/'.$topic['uid'].'/ingroup/'.$group->nid);?>"><img width="80px" height="80px" alt="" src="<?php global $base_url; echo $base_url.'/'.$topic['picture']; ?>"></a>
                                <div>
                                user <?php echo $topic['uid']?><br> <?php echo $topic['grouprole']; ?><br>
                                    <a href=""><?php echo $topic['location']; ?></a><br></div>
                                <div>
                                    <a title="Send an Email" class="" href=""><img height="16" width="15" class="D_icon mailTip" alt="Send an Email" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme','fusion_teemeet').'/images';?>/icon_envelope.gif"></a> 
                                    <span class="boardShout">
                                        <a title="Post a Greeting" href="<?php echo url($group->path.'/member/'.$topic['uid'].'/ingroup/'.$group->nid.'/greeting');?>"><img alt="Post a Greeting" src="<?php global $base_url; echo $base_url.'/'.drupal_get_path('theme','fusion_teemeet').'/images'; ?>.'/1x1.gif" class="D_icon shoutTip D_shoutIcon sprite sprite_pixel comment_icon"></a>
                                    </span>
                                </div>
                            </td>
                            <td class="last main">
                                <div class="D_bbcode">
                                    <?php echo $topic['content']; ?><br>
                                </div>
                            </td>
                        </tr>
                    