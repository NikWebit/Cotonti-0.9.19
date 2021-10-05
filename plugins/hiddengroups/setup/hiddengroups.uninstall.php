<?php

/**
 * Hidden groups
 *
 * @package HiddenGroups
 * @copyright (c) Cotonti Team
 * @license https://github.com/Cotonti/Cotonti/blob/master/License.txt
 */

defined('COT_CODE') or die('Wrong URL');

global $db_groups;

$dbres = $db->query("SHOW COLUMNS FROM `$db_groups` WHERE `Field` = 'grp_hidden'");
if ($dbres->rowCount() == 1)
{
	$db->query("ALTER TABLE `$db_groups` DROP COLUMN `grp_hidden`");
}
$dbres->closeCursor();

$cache && $cache->db->remove('cot_groups', 'system');
