<?php
// $Id: siteactivity.inc,v 1.1.2.5 2010/02/21 22:45:26 stalski Exp $

/**
 * @file
 *   Siteactivity example class.
 */

heartbeat_include('HeartbeatAccess');

/**
 * Class SiteActivity
 * Concrete class to prepare messages for whole site,
 * to be customized UI wise
 *
 */
class SiteUserActivity extends HeartbeatAccess {

  protected function hasAccess() {
    return TRUE;
  }

  public function skipActiveUser() {
    return FALSE;
  }
  /**
   * Implementation of dressUpMessages().
   *
   * @param object HeartbeatParser $heartbeat
   *   The heartbeat parser object
   * @return object HeartbeatParser $heartbeat
   */
  public function dressUpMessages(HeartbeatParser $heartbeat) {
    $sql = " AND ua.access > 0 ";
    $sql .= " AND ua.message_id = 'user_signup_event' ";
    //$sql .= " AND ua.message_id = 'heartbeat_add_content_story' ";
    $heartbeat->raw_messages = $this->resultSql($sql);
    return $heartbeat;
  }

  /**
   * Function to add a part of a sql to a query built by views
   *
   * @param object $view The view handler object by reference to add our part to the query
   */
  public function addViewQuery(&$view) {
    // Make the sql limited to the access
    $field = "$view->table_alias.$view->real_field";
    $view->query->add_where('andgroup', "$field > %d  AND $view->table_alias.access > 0", 0);
  }
}
