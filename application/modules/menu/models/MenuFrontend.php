<?php

class Menu_Model_MenuFrontend extends My_Model_Abstract
{
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function getMenuItems($alias, $nickname = null, $age = null)
	{
		$cacheEntrie = $this->getCacheEntry($nickname, $age);
		
		if (!empty($cacheEntrie)) {
			return $cacheEntrie;
		} else {
			$items = $this->_getMenuTree($this->_getMenuItems(), $this->_getMenuItemIdByAlias($alias));
			echo $this->setCacheEntry($nickname, $items);
		}
		return $items;
	}
}
