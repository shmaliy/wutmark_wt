<?php

class Menu_IndexController extends Zend_Controller_Action
{
	private $_model;
	public $helper;
	
	public function init()
    {
        $this->_model = new Menu_Model_MenuFrontend();
        $this->helper = $this->_model->helper;
    }
    
 	public function topMenuAction()
 	{
 		$request = $this->getRequest();
 		$params = $request->getParams();
 		
 		$items = $this->_model->getMenuItems($params['rootAlias'], 'topMenu', '60');
 		//$this->helper->arrayTrans($items);
 		$this->view->items = $items;
 	}
 	
 	public function bottomMenuAction()
 	{
 		$request = $this->getRequest();
 		$params = $request->getParams();
 			
 		$items = $this->_model->getMenuItems($params['rootAlias'], 'bottomMenu', '60');
 		//$this->helper->arrayTrans($items);
 		$this->view->items = $items;
 	}
    
    public function indexAction()
    {

    } 
	
}