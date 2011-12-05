<?php

/**
 * Implementation of hook_ctools_plugin_api().
 */
function teemeet_heartbeat_ctools_plugin_api() {
  list($module, $api) = func_get_args();
  if ($module == "context" && $api == "context") {
    return array("version" => 3);
  }
}

/**
 * Implementation of hook_heartbeat_message_info().
 */
function teemeet_heartbeat_heartbeat_message_info() {
  $messages = array();

  // Exported heartbeat message: custom_add_node
  $messages['custom_add_node'] = array (
    'message' => 'NEW !node_type
    !username has added !node_title
    !post_time !user_picture',
    'message_concat' => '',
    'message_id' => 'custom_add_node',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User adds a node',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );

  // Exported heartbeat message: custom_add_comment
  $messages['custom_add_comment'] = array (
    'message' => 'NEW COMMENT
    !user 
    commented on !content
    !time !picture',
    'message_concat' => '',
    'message_id' => 'custom_add_comment',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User adds a comment',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );

  // Exported heartbeat message: custom_user_approved
  $messages['custom_user_approved'] = array (
    'message' => 'New Member !user joined !avatar !time',
    'message_concat' => '',
    'message_id' => 'custom_user_approved',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User approved by og admin',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );

  // Exported heartbeat message: custom_user_signup_event
  $messages['custom_user_signup_event'] = array (
    'message' => '!picture!user !time  is going to a meetup with !group in !address',
    'message_concat' => '',
    'message_id' => 'custom_user_signup_event',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User signed up an event',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );

  // Exported heartbeat message: custom_add_greeting
  $messages['custom_add_greeting'] = array (
    'message' => '!author posted a greeting for !recipient in !group
  !message
  !time',
    'message_concat' => '',
    'message_id' => 'custom_add_greeting',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
        2 => '0',
        3 => '0',
        4 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User submit a new greeting or reply a greeting',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );

  // Exported heartbeat message: custom_delete_greeting
  $messages['custom_delete_greeting'] = array (
    'message' => '!author deleted a greeting for !recipient in !group
  !message
  !time',
    'message_concat' => '',
    'message_id' => 'custom_delete_greeting',
    'concat_args' => 
    array (
      'type' => 'single',
      'group_by' => 'none',
      'group_target' => '',
      'group_by_target' => '',
      'group_num_max' => '',
      'merge_separator' => '',
      'merge_end_separator' => '',
      'roles' => 
      array (
        0 => '0',
        1 => '0',
        2 => '0',
        3 => '0',
        4 => '0',
      ),
      'merge_separator_t' => '0',
      'merge_end_separator_t' => '0',
    ),
    'description' => 'Custom: User delete a greeting',
    'perms' => '1',
    'custom' => 1,
    'variables' => 
    array (
    ),
  );


  return $messages;
}

/**
 * Implementation of hook_rules_defaults().
 */
function teemeet_heartbeat_rules_defaults() {
  return array(
    'rules' => array(
      'rules_custom_add_node_in_group' => array(
        '#type' => 'rule',
        '#set' => 'event_node_insert',
        '#label' => 'Custom: when user adds a node in group',
        '#active' => 1,
        '#weight' => '0',
        '#categories' => array(
          '0' => 'custom',
          'teemeet_heartbeat' => 'teemeet_heartbeat',
        ),
        '#status' => 'default',
        '#conditions' => array(
          '0' => array(
            '#weight' => 0,
            '#info' => array(
              'label' => 'Content is a group post',
              'arguments' => array(
                'group' => array(
                  'type' => 'node',
                  'label' => 'Group post',
                ),
              ),
              'module' => 'Organic groups',
            ),
            '#name' => 'og_rules_condition_content_is_group_post',
            '#settings' => array(
              '#argument map' => array(
                'group' => 'node',
              ),
            ),
            '#type' => 'condition',
          ),
          '1' => array(
            '#type' => 'condition',
            '#settings' => array(
              '#argument map' => array(
                'node' => 'node',
              ),
            ),
            '#name' => 'rules_condition_content_is_published',
            '#info' => array(
              'label' => 'Created content is published',
              'arguments' => array(
                'node' => array(
                  'type' => 'node',
                  'label' => 'Content',
                ),
              ),
              'module' => 'Node',
            ),
            '#weight' => 0,
          ),
        ),
        '#actions' => array(
          '0' => array(
            '#weight' => 0,
            '#info' => array(
              'label' => 'Logs activity for single users adding a group post',
              'label callback' => FALSE,
              'eval input' => array(
                '0' => 'uid_param',
                '1' => 'uid_target_param',
                '2' => 'nid_param',
                '3' => 'nid_target_param',
                '4' => 'message_id_param',
                '5' => 'variables_param',
              ),
              'module' => 'heartbeat',
            ),
            '#name' => 'heartbeat_rules_default_action',
            '#settings' => array(
              'uid_param' => '[node:author-uid]',
              'uid_target_param' => '0',
              'nid_param' => '[node:nid]',
              'nid_target_param' => '[node:og-id]',
              'message_id_param' => 'custom_add_node',
              'variables_param' => '@node_type=|=[node:type-name]-|-@username=|=[node:author-name-url]-|-@node_title=|=[node:title-link]-|-@post_time=|=[node:date]-|-@user_picture=|=[author:heartbeat-user-picture]-|-',
              '#eval input' => array(
                'token_rules_input_evaluator' => array(
                  'uid_param' => array(
                    '0' => 'node',
                    '1' => ':global',
                  ),
                  'uid_target_param' => array(
                    '0' => ':global',
                  ),
                  'nid_param' => array(
                    '0' => 'node',
                    '1' => ':global',
                  ),
                  'nid_target_param' => array(
                    '0' => 'node',
                    '1' => ':global',
                  ),
                  'message_id_param' => array(
                    '0' => ':global',
                  ),
                  'variables_param' => array(
                    '0' => 'node',
                    '1' => 'author',
                    '2' => ':global',
                  ),
                ),
              ),
            ),
            '#type' => 'action',
          ),
        ),
        '#version' => 6003,
      ),
      'rules_custom_when_user_adds_a_comment' => array(
        '#type' => 'rule',
        '#set' => 'event_comment_publish',
        '#label' => 'Custom: when user adds a comment',
        '#active' => 1,
        '#weight' => '0',
        '#categories' => array(
          '0' => 'custom',
          'teemeet_heartbeat' => 'teemeet_heartbeat',
        ),
        '#status' => 'default',
        '#conditions' => array(),
        '#actions' => array(
          '0' => array(
            '#weight' => 0,
            '#info' => array(
              'label' => 'Logs activity for single users adding a comment',
              'label callback' => FALSE,
              'eval input' => array(
                '0' => 'uid_param',
                '1' => 'uid_target_param',
                '2' => 'nid_param',
                '3' => 'nid_target_param',
                '4' => 'message_id_param',
                '5' => 'variables_param',
              ),
              'module' => 'heartbeat',
            ),
            '#name' => 'heartbeat_rules_default_action',
            '#settings' => array(
              'uid_param' => '[comment_author:uid]',
              'uid_target_param' => '0',
              'nid_param' => '[node:og-id]',
              'nid_target_param' => '0',
              'message_id_param' => 'custom_add_comment',
              'variables_param' => '@user=|=[comment_author:user-name-url]-|-@content=|=[node:title-link]-|-@time=|=[comment:comment-date]-|-@picture=|=[comment_author:heartbeat-user-picture]-|-',
              '#eval input' => array(
                'token_rules_input_evaluator' => array(
                  'uid_param' => array(
                    '0' => 'comment_author',
                    '1' => ':global',
                  ),
                  'uid_target_param' => array(
                    '0' => ':global',
                  ),
                  'nid_param' => array(
                    '0' => 'node',
                    '1' => ':global',
                  ),
                  'nid_target_param' => array(
                    '0' => ':global',
                  ),
                  'message_id_param' => array(
                    '0' => ':global',
                  ),
                  'variables_param' => array(
                    '0' => 'comment',
                    '1' => 'comment_author',
                    '2' => 'node',
                    '3' => ':global',
                  ),
                ),
              ),
            ),
            '#type' => 'action',
          ),
        ),
        '#version' => 6003,
      ),
      'rules_custom_when_user_approved_by_og_admin' => array(
        '#type' => 'rule',
        '#set' => 'event_og_user_approved',
        '#label' => 'Custom: when user approved by og admin',
        '#active' => 1,
        '#weight' => '0',
        '#categories' => array(
          '0' => 'custom',
          'teemeet_heartbeat' => 'teemeet_heartbeat',
        ),
        '#status' => 'default',
        '#conditions' => array(),
        '#actions' => array(
          '0' => array(
            '#weight' => 0,
            '#info' => array(
              'label' => 'Logs activity for single users when approved by og admin',
              'label callback' => FALSE,
              'eval input' => array(
                '0' => 'uid_param',
                '1' => 'uid_target_param',
                '2' => 'nid_param',
                '3' => 'nid_target_param',
                '4' => 'message_id_param',
                '5' => 'variables_param',
              ),
              'module' => 'heartbeat',
            ),
            '#name' => 'heartbeat_rules_default_action',
            '#settings' => array(
              'uid_param' => '[user:uid]',
              'uid_target_param' => '0',
              'nid_param' => '[group:nid]',
              'nid_target_param' => '0',
              'message_id_param' => 'custom_user_approved',
              'variables_param' => '@user=|=[account:user-name-url]-|-@avatar=|=[account:heartbeat-user-picture]-|-@time=|=[account:user-created-date]-|-',
              '#eval input' => array(
                'token_rules_input_evaluator' => array(
                  'uid_param' => array(
                    '0' => 'user',
                    '1' => ':global',
                  ),
                  'uid_target_param' => array(
                    '0' => ':global',
                  ),
                  'nid_param' => array(
                    '0' => 'group',
                    '1' => ':global',
                  ),
                  'nid_target_param' => array(
                    '0' => ':global',
                  ),
                  'message_id_param' => array(
                    '0' => ':global',
                  ),
                  'variables_param' => array(
                    '0' => 'account',
                    '1' => ':global',
                  ),
                ),
              ),
            ),
            '#type' => 'action',
          ),
        ),
        '#version' => 6003,
      ),
      'rules_custom_when_user_signing_up_an_event' => array(
        '#type' => 'rule',
        '#set' => 'event_signup_rules_event_insert',
        '#label' => 'Custom: when user signing up an event',
        '#active' => 1,
        '#weight' => '0',
        '#categories' => array(
          '0' => 'custom',
          'teemeet_heartbeat' => 'teemeet_heartbeat',
        ),
        '#status' => 'default',
        '#conditions' => array(),
        '#actions' => array(
          '0' => array(
            '#weight' => 0,
            '#info' => array(
              'label' => 'Logs activity for single users signing up an event',
              'label callback' => FALSE,
              'eval input' => array(
                '0' => 'uid_param',
                '1' => 'uid_target_param',
                '2' => 'nid_param',
                '3' => 'nid_target_param',
                '4' => 'message_id_param',
                '5' => 'variables_param',
              ),
              'module' => 'heartbeat',
            ),
            '#name' => 'heartbeat_rules_default_action',
            '#settings' => array(
              'uid_param' => '[user:uid]',
              'uid_target_param' => '0',
              'nid_param' => '[node:nid]',
              'nid_target_param' => '0',
              'message_id_param' => 'custom_user_signup_event',
              'variables_param' => '@picture=|=[user:heartbeat-user-picture]-|-@user=|=[user:user-name-url]-|-@time=|=[signup:signup-date-short]-|-@group=|=[node:ogname-title-link]-|-@address=|=<?php print $node->field_event_where[0][\'province\'];?>-|-',
              '#eval input' => array(
                'token_rules_input_evaluator' => array(
                  'uid_param' => array(
                    '0' => 'user',
                    '1' => ':global',
                  ),
                  'uid_target_param' => array(
                    '0' => ':global',
                  ),
                  'nid_param' => array(
                    '0' => 'node',
                    '1' => ':global',
                  ),
                  'nid_target_param' => array(
                    '0' => ':global',
                  ),
                  'message_id_param' => array(
                    '0' => ':global',
                  ),
                  'variables_param' => array(
                    '0' => 'user',
                    '1' => 'node',
                    '2' => 'signup',
                    '3' => ':global',
                  ),
                ),
                'rules_input_evaluator_php' => array(
                  'variables_param' => array(
                    '0' => 'node',
                  ),
                ),
              ),
            ),
            '#type' => 'action',
          ),
        ),
        '#version' => 6003,
      ),
    ),
  );
}
