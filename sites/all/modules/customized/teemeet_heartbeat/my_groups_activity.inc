<?php

/**
 * @file
 *   HeartbeatAccess stream object for organic group activity happened in current user's groups.
 */


heartbeat_include('HeartbeatAccess');

/**
 * Class MyGroupsActivity
 * Concrete class to prepare messages for the current user's groups.
 *
 */
class MyGroupsActivity extends HeartbeatAccess {

  /**
   * Skip active user.
   * We never want to skip the active user.
   */
  public function skipActiveUser() {
    return FALSE;
  }

  /**
   * hasAccess
   *
   * Checks access for this stream.
   */
  protected function hasAccess() {
    return TRUE;
  }

  /**
   * dressUpMessages
   *
   * @param HeartbeatParser $heartbeat
   *   The parser for the messages in this stream.
   */
  public function dressUpMessages(HeartbeatParser $heartbeat) {
  	global $user;
	$groups = $user->og_groups;
	$groupids = array();
	$str_groupids = '';

	if (!empty($groups)) {
		foreach ($groups as $nid => $group) {
			$groupids[] = $nid;
		}

		$str_groupids = implode(',',$groupids);
	}

    $sql = " AND ua.nid <> 0 AND (ua.nid in (%s) OR ua.nid_target in (%s)) ";
    $heartbeat->raw_messages = $this->resultSql($sql, array($str_groupids, $str_groupids));

    return $heartbeat;
  }
}
