<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_breadcrumbs
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Include the syndicate functions only once
require_once __DIR__ . '/helper.php';

// Get the breadcrumbs
$list	= ModBreadCrumbsHelper::getList($params);
$count	= count($list);

// Set the default separator
$separator = ModBreadCrumbsHelper::setSeparator($params->get('separator'));
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require JModuleHelper::getLayoutPath('mod_breadcrumbs', $params->get('layout', 'default'));
