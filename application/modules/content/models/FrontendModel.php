<?php
class Content_Model_FrontendModel extends My_Model_Abstract
{
	
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function getStaticContentItem($alias = null)
	{
		if (is_null($alias)) {
			return array();
		}
		$item = $this->_getContentItemByAlias($alias);
		
		if (!empty($item['image'])) {
			
		}

		if (!empty($item['images'])) {
				
		}
		
		return $item;
	}
	
	public function getMenuItems()
	{
		return $this->_getMenuTree($this->_getMenuItems(), $this->_getMenuItemIdByAlias('mainmenu'));
	}
	
	public function getCategoriesItems()
	{
		return $this->_getCategoriesTree($this->_getCategoriesItems());
	}
	
}
