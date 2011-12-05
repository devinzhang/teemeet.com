<?php

/**
 * Implementation of hook_user_default_permissions().
 */
function teemeet_heartbeat_user_default_permissions() {
  $permissions = array();

  // Exported permission: sign up for content
  $permissions['sign up for content'] = array(
    'name' => 'sign up for content',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  // Exported permission: view all signups
  $permissions['view all signups'] = array(
    'name' => 'view all signups',
    'roles' => array(
      '0' => 'authenticated user',
    ),
  );

  return $permissions;
}
