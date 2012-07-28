<?php

class IndexController extends Zend_Controller_Action
{
    private $_model;
    private $_contentModel;
    
    public $helper;
	
	public function init()
    {
        $this->_model = new Application_Model_Default();
        $this->_contentModel = new Content_Model_FrontendModel();
        $this->helper = $this->_model->helper;
    	
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
       // $ajaxContext->addActionContext('indexnews', 'json');
        $ajaxContext->initContext('json');
	}

    public function indexAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    }
    
    public function langselectorAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    } 
    
    public function sitesselectorAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    }
    
    public function flashPresentationAction()
    {
    	$this->view->lang = $this->_model->getLang();
    }
    
    public function seoAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	//$this->help->arrayTrans($params);
    	
    	$item = $this->_contentModel->getStaticContentItem($params['alias']);
    	$this->view->item = $item;
    	
    	//$this->help->arrayTrans($item);
    }
    
    public function footertextAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    }
    
    public function footercountersAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    }
}



