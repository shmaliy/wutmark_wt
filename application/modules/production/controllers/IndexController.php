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
        
	}

	public function indexCategoriesWidgetAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		$items = $this->_model->getCategoriesTree($params['alias']);
		//$this->_help->arrayTrans($items);
		$this->view->items = $items;
		$this->view->root = '/' . $this->_model->getLang() . '/' . $params['alias'];
		$this->view->title = $this->_model->getInterfaceWord('OUR_PRODUCTION');
	}

}