<?php
/**
 * @package   System plugin to redirect administrator after login
 * @version   0.0.1
 * @author    https://www.brainforge.co.uk
 * @copyright Copyright (C) 2020 Jonathan Brain. All rights reserved.
 * @license   GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

// no direct access
defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\CMSPlugin;

class plgSystemBfadminlogin extends CMSPlugin {
	/**
	 * Constructor
	 *
	 * @param object  &$subject The object to observe
	 * @param array $config An optional associative array of configuration settings.
	 *                      Recognized key values include 'name', 'group', 'params', 'language'
	 *                      (this list is not meant to be comprehensive).
	 *
	 * @since   11.1
	 */
	public function __construct(&$subject, $config = array()) {
		parent::__construct($subject, $config);
	}

	/**
	 */
	public function onUserAfterLogin()
	{
		$app = Factory::getApplication();

		if ($app->isClient('administrator'))
		{
			$favouriteURL = trim($this->params->get('favouriteurl'));
			if (!empty($favouriteURL))
			{
				$app->redirect($favouriteURL);
			}
		}
	}
}
