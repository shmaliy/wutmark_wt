<?php
class Production_Model_FrontendModel extends My_Model_Abstract
{
	
	public function __construct()
	{
		
		parent::__construct();
	}
	
	public function getCategoriesTree($rootId = null)
	{
		if (is_null($rootId)) {
			return array();
		}
		
		$items = $this->_getCategoriesTree($this->_getCategoriesItems(), $rootId);
		return $items;
	}
	
	public function getGoods($parentId)
	{
		return $this->_getContentListByCategoryId(array($parentId));
	}
	
}
