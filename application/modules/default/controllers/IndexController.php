<?php

class IndexController extends Zend_Controller_Action
{
    private $abstractModel;
    private $model;
	private $contentModel;
    private $img;
    private $help;
	private $nowdate;
	private $receiver;
	
	public function init()
    {
        $this->model = new Application_Model_Default();
		$this->contentModel = new Content_Model_Frontend;
        $this->abstractModel = new Application_Model_Abstract();
        $this->nowdate = $this->model->abstractModel->nowdate;
        $this->help = $this->model->abstractModel->help;
		$this->view->help = $this->help;
        $this->img = new img();
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
    
    public function directivessliderAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$this->view->directives = $this->model->getAccordionContents($params['lang']);
    }
    
    public function indexnewsAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$items = $this->contentModel->getNewsIndexList($params['lang']);
    	//$this->help->arrayTrans($items);
    	//$items = $this->help->encToServer($items);
    			
    	foreach($items as &$item){
    		if(!empty($item['image'])){
    			$item['image'] = $this->help->createSquareLink($item['image'], 100);
    		}
    	}
    			
    	/*$countOfItems = count($items);
    	$limit = 2;
    	if($params['page'] == 1){
    		$offset = 0;
    	} else {
    		$offset = $limit*($params['page']-1);
    	}
    	$pages = floor($countOfItems/$limit);
    	if(floor($countOfItems/$limit) != $countOfItems/$limit){
    		$pages += 1;
    	}
    	$this->view->itemsCount = $countOfItems;
    	$this->view->pages = $pages;
    	$this->view->current = $params['page'];*/
    	//$this->view->items = array_slice($items, $offset, $limit);
    	$this->view->items = array_slice($items, 0, 3);
    
    }
    
    public function newsAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$items = $this->contentModel->getNewsIndexList($params['lang']);
    	//$this->help->arrayTrans($items);
    	
    	foreach($items as &$item){
    		if(!empty($item['image'])){
    			$item['image'] = $this->help->createSquareLink($item['image'], 100);
    		}
    	}
    	
    	$this->view->items = $items;
    }
    
    public function newsitemAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	 
    	$item = $this->contentModel->getDefaultContentItem($params['id'], $params['lang']);
    	//$this->help->arrayTrans($items);
    	 
    	$this->view->item = $item;
    }
    
    public function directivesAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	
    	$items = $this->contentModel->getAreasOfActivityList($params['lang']);
    	//$this->help->arrayTrans($items);
    	
    	foreach($items as &$item){
    		if(!empty($item['image'])){
    			//$item['image'] = $this->help->createSquareLink($item['image'], 100);
    		}
    	}
    	
    	$this->view->items = $items;
    }
    
    public function indexQuotesAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    }
    
    public function seoAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	//$this->help->arrayTrans($params);
    	
    	$item = $this->contentModel->getStaticContent('seo');
    	$this->view->item = $item;
    	
    	//$this->help->arrayTrans($item);
    }
    
    public function indexpartnersAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
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



