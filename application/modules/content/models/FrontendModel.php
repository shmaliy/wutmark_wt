<?php
class Content_Model_FrontendModel extends Application_Model_ModelAbstract
{
	
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function getDefaultContentItem($alias = null)
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
		return $this->_getMenuTreeSorted('ordering');
	}
	
	public function getCategoriesItems()
	{
		return $this->_getCategoriesTree($this->_getCategoriesItems());
	}
	
}
