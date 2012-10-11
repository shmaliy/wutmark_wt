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
    	
    	$form = new Application_Form_Sites();
    	$form->getElement('sites')->setMultiOptions($form->sites('http://wt.wutmarc.com'));
    	$form->getElement('sites')->setAttrib(array('class'=>'sites'));
    	
    	$this->view->form = $form;
    }
    
    public function flashPresentationAction()
    {
   		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
				
		$root = $this->_model->getRootCategoryEntryByAlias($params['cat']);
		
		$items = $this->_contentModel->getAreasList(array($root['id']));
		
		$this->view->items = array();
		foreach ($items as $item) {
			if(!empty($item['images'])) {
				
				$imgarray = explode('|', $item['images']);
				
				$this->view->items[] = array(
					'id' => $item['id'],
					'title' => $item['title'],
					'cat' => $params['cat'],
					'image' => $imgarray[0]
				);
			
			}
		}

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
    
    public function cacheManagerAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$this->view->authorized = 0;
    	
    	if ($_SESSION['cms']['authorized'] == '1') {
    		
    		$this->view->authorized = 1;
    		
	    	if (isset($params['mode'])) {

	    		if($params['mode'] == 'on') {
	    			$this->view->enable = $this->_model->enableCache();
	    		}
	    		
	    		if($params['mode'] == 'off') {
	    			$this->view->disable = $this->_model->disableCache();
	    		}
	    		
	    		if($params['mode'] == 'clear') {
	    			$this->view->clear = $this->_model->clearCache();
	    		}
	    	}
	    	$this->view->status = $this->_model->getCache();
    	
    	}
    }
}



