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
	}
	
	public function subCategoryAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
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