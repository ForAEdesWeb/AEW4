<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_remoteimage
 *
 * @copyright   Copyright (C) 2012 Asikart. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      Generated by AKHelper - http://asikart.com
 */

// no direct access
defined('_JEXEC') or die;

include_once dirname(__FILE__).'/../includes/core.php' ;


/**
 * Remoteimage helper.
 */
class RemoteimageHelper extends AKProxy
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($vName = '')
	{		
		jimport('joomla.filesystem.folder');
		jimport('joomla.filesystem.file');
		$app = JFactory::getApplication() ;
		
		/*
		JHtmlSidebar::addEntry(
			JText::_('COM_REMOTEIMAGE_MANAGER'),
			'index.php?option=com_remoteimage&view=manager',
			$vName == 'manager'
		);
		
		if(JVERSION >= 3):			
			
			$folders = JFolder::folders(JPATH_ADMINISTRATOR.'/components/com_remoteimage/views');
			
			foreach( $folders as $folder ){
				if( substr($folder, -2) == 'is' || substr($folder, -1) == 's'){
					JHtmlSidebar::addEntry(
						ucfirst($folder) . ' ' . JText::_('COM_REMOTEIMAGE_TITLE_LIST'),
						'index.php?option=com_remoteimage&view='.$folder,
						$vName == $folder
					);
				}
			}
		
		else:
			
			$folders = JFolder::folders(JPATH_ADMINISTRATOR.'/components/com_remoteimage/views');
			
			foreach( $folders as $folder ){
				if( substr($folder, -2) == 'is' || substr($folder, -1) == 's'){
					JSubMenuHelper::addEntry(
						ucfirst($folder) . ' ' . JText::_('COM_REMOTEIMAGE_TITLE_LIST'),
						'index.php?option=com_remoteimage&view='.$folder,
						$vName == $folder
					);
				}
			}
			
		endif;
		*/
	}
	
	
	/**
	 * Gets a list of the actions that can be performed.
	 *
	 * @return	JObject
	 * @since	1.6
	 */
	public static function getActions($option = null)
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_remoteimage';

		$actions = array(
			'core.admin', 
			'core.manage', 
			'core.create', 
			'core.edit', 
			'core.edit.own', 
			'core.edit.state', 
			'core.delete'
		);

		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}

		return $result;
	}
	
	
	/*
	 * function getVersion
	 * @param 
	 */
	
	public static function getVersion()
	{
		return JVERSION ;
	}
	
	
	/*
	 * function getFTP
	 * @param 
	 */
	
	public static function getFTP($host = null, $port = null, $options = null, $user = null, $pass = null)
	{
		$params = JComponentHelper::getParams('com_remoteimage') ;
		$host = $host ? $host : $params->get('Ftp_Host', '127.0.0.1') ;
		$port = $port ? $port : $params->get('Ftp_Port', 21) ;
		$user = $user ? $user : $params->get('Ftp_User') ;
		$pass = $pass ? $pass : $params->get('Ftp_Password') ;
		
		//include_once AKHelper::_('path.getAdmin', 'com_remoteimage') . '/includes/class/ftp.php';
		//$ftp = RMFTP::getInstance($host, $port, array('pasv' => false), $user, $pass);
		//return $ftp ;
	}
}


class RMHelper extends RemoteimageHelper
{}
