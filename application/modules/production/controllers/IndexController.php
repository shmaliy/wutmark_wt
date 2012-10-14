<?php

class Production_IndexController extends Zend_Controller_Action
{
    private $_model;
    private $_help;
	
	public function init()
    {
		$this->_model = new Production_Model_FrontendModel();
		$this->_help = $this->_model->helper;
    }
    
    public function indexAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
    	$this->view->title = $root['title'];
	}
	
	public function categoryAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->_help->arrayTrans($params);
		
		$rootCategory = $params['module'];
		$category = $params['cat_alias'];
		$subCategory = $request->getParam('subcat_alias', false);
		
		// Получаем инфо о корневой категории
		$rootCategory = $this->_model->getRootCategoryEntryByAlias($rootCategory);	
		$this->view->root = $rootCategory;
		//$this->_help->arrayTrans($rootCategory);
		
		// Получаем текущую категорию первого уровня
		$category = $this->_model->getDependedCategoryEntryByParent($category, $rootCategory['id']);
		$this->view->category = $category;
		//$this->_help->arrayTrans($category);
		
		// Проверяем наличие товаров в категории
		$goods_first =  $this->_model->getGoods($category['id']);	
		$this->view->goods_first = $goods_first;
		$this->_help->arrayTrans($goods_first);
		
		// Вынимаем сптсок подкатегорий
		if($subCategory == false) {
			$subcats = $this->_model->getDependedCategoriesListByParent($category['id']);
			$this->view->sucats_list = $subcats;
			$this->_help->arrayTrans($subcats);
		}
		
		
		// Получаем инфо о подкатегории
		if($subCategory != false) {
			$subCategory = $this->_model->getDependedCategoryEntryByParent($subCategory, $category['id']);
			$this->view->sub_cat = $subCategory;
			//$this->_help->arrayTrans($subCategory);
			
			// Получаем товары из подкатегории
			$goods_second =  $this->_model->getGoods($subCategory['id']);
			$this->view->goods_second = $goods_second;
			$this->_help->arrayTrans($goods_second);
		}
		
		
	}
	
	public function indexCategoriesWidgetAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
		//$this->_help->arrayTrans($root);
		
		
		$items = $this->_model->getCategoriesTree($root['id']);
		//$this->_help->arrayTrans($items);
		$this->view->title = $root['title'];
		$this->view->items = $items;
		$this->view->root = '/' . $this->_model->getLang() . '/' . $params['alias'];
	}
	
	public function indexSelectByOuterBrandAction()
	{
		
	}

}