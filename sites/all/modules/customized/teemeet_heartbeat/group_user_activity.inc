<?php
// $Id: siteactivity.inc,v 1.1.2.5 2010/02/21 22:45:26 stalski Exp $

/**
 * @file
 *   Groupactivity example class.
 */

heartbeat_include('HeartbeatAccess');

/**
 * Class GroupActivity
 * Concrete class to prepare messages for whole site,
 * to be customized UI wise
 *
 */
class GroupUserActivity extends HeartbeatAccess {

  protected $_gid = 0;
  protected $_group_access = FALSE;
  protected $group = NULL;

  public function construct() {

    // Where the user id is a member of the group
    // and where the nid target is the group nid
    $this->setGroup();

  }

  public function skipActiveUser() {
    return FALSE;
  }

  /**
   * hasAccess
   *
   * Checks access for this stream.
   */
  protected function hasAccess() {

    // if the user has access to this node (member or public group)
    //og_set_group_context($this->group);
    if (isset($this->group) && (og_is_group_member($this->group) || $this->group->og_private == 0)) {
      $this->_group_access = TRUE;
    }

    if (!isset($this->group)) {
      $this->setError('We are not in a group context.');
    }

    return $this->_group_access;
  }

  /**
   * setGroup
   *
   * Sets the group for a given node ID.
   * @param Integer $nid
   *   The group node ID.
   */
  private function setGroup($nid = 0) {

    if ($nid != 0) {
      $this->_gid = $nid;
      $this->group = node_load($nid);
      return;
    }
    if(module_exists('spaces_og')) {
      if($space = spaces_get_space()) {
        if($space->type == 'og') {
          $this->_gid = $space->id;
          $this->group = $space->group;
          return;
        }
      }
    }
    if (arg(0) == 'node' && is_numeric(arg(1))) {

      $node = node_load(arg(1));

      if (og_is_group_type($node->type)) {
        $this->_gid = arg(1);
        $this->group = $node;
      }
      elseif (og_is_group_post_type($node->type)) {
        $this->_gid = current($node->og_groups);
        $this->group = node_load($this->_gid);
      }
    }

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
    $sql .= " AND ua.message_id = '0g_user_approved_to_a_group_by_admin' ";
    //$sql .= " AND ua.message_id = 'heartbeat_add_content_story' ";
//    $sql .= " AND (ua.nid = %d OR ua.nid_target = %d) ";
//    $heartbeat->raw_messages = $this->resultSql($sql, array($this->_gid, $this->_gid));
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
