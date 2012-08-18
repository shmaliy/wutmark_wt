<?php
class Content_Model_FrontendModel extends My_Model_Abstract
{
	private $_image;
	
	public function __construct()
	{
		$this->_image = new My_Image_Image();
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
	
	public function getContentItemById($id)
	{
		return $this->_getContentItemById($id);
	}
	
	
	public function getCategoriesItems()
	{
		return $this->_getCategoriesTree($this->_getCategoriesItems());
	}
	
	public function getNews($id)
	{
		$items = $this->_getContentListByCategoryId($id, 'created', 'desc');
		
		foreach ($items as &$item) {
			$item['image'] = $this->_image->setImage($item['image'], 'thumbs_65px')->resizeToWidth(65);
		}
		
		return $items;
	}
	
	public function getNewsList($id)
	{
		$items = $this->_getContentListByCategoryId($id, 'created', 'desc');
	
		foreach ($items as &$item) {
			$item['image'] = $this->_image->setImage($item['image'], 'thumbs_100px')->resizeToWidth(100);
		}
	
		return $items;
	}
	
	public function getReferenceList($id)
	{
		$items = $this->_getContentListByCategoryId($id, 'created', 'desc');
	
		foreach ($items as &$item) {
			$item['image'] = $this->_image->setImage($item['image'], 'thumbs_100px')->resizeToWidth(100);
		}
	
		return $items;
	}
	
	public function getReferences($id)
	{
		$items = $this->_getContentListByCategoryId($id, 'created', 'desc');
	
		foreach ($items as &$item) {
			$item['image'] = $this->_image->setImage($item['image'], 'thumbs_65px')->resizeToWidth(65);
		}
	
		return $items;
	}
	
}
