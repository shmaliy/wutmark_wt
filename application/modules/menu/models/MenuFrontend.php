<?php

class Menu_Model_MenuFrontend extends My_Model_Abstract
{
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function getMenuItems($alias)
	{
		return $this->_getMenuTree($this->_getMenuItems(), $this->_getMenuItemIdByAlias($alias));
	}
}
