<?php
class Content_NewIndexController extends Zend_Controller_Action
{
	private $_model;
	private $helper;
	
	public function init()
	{
		$this->_model = new Content_Model_FrontendModel();
		$this->helper = $this->_model->helper;
		$this->view->helper = $this->_model->helper;
		
		$context = $this->_helper->AjaxContext();
		$context->addActionContext('last-news', 'json');
		$context->initContext('json');
	}
	
	public function indexAction()
	{
		
	}
	
	public function staticContentItemAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		
		
		$item = $this->_model->getStaticContentItem($params[2]);
		$this->view->item = $item;
		$this->view->alias = $params[2];
		
		//$this->helper->arrayTrans($item);
	}
	
	public function lastNewsAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		$page = new Zend_Session_Namespace('page');
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			$root = $this->_model->getRootCategoryEntryByAlias($params['category'], $params['lang']);
			$items = $this->_model->getNews(array($root['id']));
			
			$first = $request->getParam('first', 'false');
			
			if(!isset($page->limit) || $first == 'false') $page->limit = $params['limit'];
			else $params['limit'] = $page->limit;
			
			if(!isset($page->offset) || $first == 'false') $page->offset = $params['offset'];
			else $params['offset'] = $page->offset;
			
			if(!isset($page->page) || $first == 'false') $page->page = $params['page'];
			else $params['page'] = $page->page;
			
			$this->view->count = count($items);
			
			if ($this->view->count/$params['limit'] != floor($this->view->count/$params['limit'])) 
			$this->view->pages = floor($this->view->count/$params['limit']) + 1;
			else $this->view->pages = $this->view->count/$params['limit'];
			
			
			$this->view->current = $params['page'];
			$this->view->limit = $params['limit'];
			$this->view->lang = $params['lang'];
			
			
			$news = array();
			for ($i = $params['offset']; $i < $params['limit']+$params['offset']; $i++) {
				if ($i < $this->view->count) {
					$news[] = $items[$i];
				}
			}
			
			$this->view->items = $news;
			
			$this->_helper->layout()->disableLayout();
			$this->render('last-news-inner');
		} else {
			$this->render('last-news');
		}
		
	}
	
	public function lastReferenceAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
	
		$page = new Zend_Session_Namespace('page');
	
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			$root = $this->_model->getRootCategoryEntryByAlias($params['category'], $params['lang']);
			$items = $this->_model->getReferences(array($root['id']));
				
			$first = $request->getParam('first', 'false');
				
			if(!isset($page->limit) || $first == 'false') $page->limit = $params['limit'];
			else $params['limit'] = $page->limit;
				
			if(!isset($page->offset) || $first == 'false') $page->offset = $params['offset'];
			else $params['offset'] = $page->offset;
				
			if(!isset($page->page) || $first == 'false') $page->page = $params['page'];
			else $params['page'] = $page->page;
				
			$this->view->count = count($items);
				
			if ($this->view->count/$params['limit'] != floor($this->view->count/$params['limit']))
			$this->view->pages = floor($this->view->count/$params['limit']) + 1;
			else $this->view->pages = $this->view->count/$params['limit'];
				
				
			$this->view->current = $params['page'];
			$this->view->limit = $params['limit'];
			$this->view->lang = $params['lang'];
				
				
			$news = array();
			for ($i = $params['offset']; $i < $params['limit']+$params['offset']; $i++) {
				if ($i < $this->view->count) {
					$news[] = $items[$i];
				}
			}
				
			$this->view->items = $news;
				
			$this->_helper->layout()->disableLayout();
			$this->render('last-reference-inner');
		} else {
			$this->render('last-reference');
		}
	
	}
	
	
	public function newsIndexAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
				
		$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
		$this->view->title = $root['title'];
		
		$items = $this->_model->getNewsList(array($root['id']));
		$this->view->count = count($items);
		
		$page = $request->getParam('page', 1);
		$this->view->page = $page;
		$limit = 8;
		$offset = ($page-1)*$limit;
		
		if($this->view->count / $limit == floor($this->view->count / $limit)) {
			$this->view->pagecount = floor($this->view->count / $limit);
		} else {
			$this->view->pagecount = floor($this->view->count / $limit) + 1;
		}
		
		$front = array();
		
		for ($i = $offset; $i < $offset+$limit; $i++) {
			if ($i < $this->view->count) {
				$front[] = $items[$i];
			}
		}
		
		$this->view->front = $front;
	}
	
	public function newsItemAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
		$item = $this->_model->getContentItemById($params['id']);
		$this->view->item = $item;
		//$this->helper->arrayTrans($item);
	}
	
	public function areasOfUseIndexAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
		$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
		//$this->helper->arrayTrans($root);
		
		$this->view->title = $root['title'];
	}
	
	public function referenceIndexAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
				
		$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
		$this->view->title = $root['title'];
		
		$items = $this->_model->getReferenceList(array($root['id']));
		$this->view->count = count($items);
		
		$page = $request->getParam('page', 1);
		$this->view->page = $page;
		$limit = 8;
		$offset = ($page-1)*$limit;
		
		if($this->view->count / $limit == floor($this->view->count / $limit)) {
			$this->view->pagecount = floor($this->view->count / $limit);
		} else {
			$this->view->pagecount = floor($this->view->count / $limit) + 1;
		}
		
		$front = array();
		
		for ($i = $offset; $i < $offset+$limit; $i++) {
			if ($i < $this->view->count) {
				$front[] = $items[$i];
			}
		}
		
		$this->view->front = $front;
	}
	
	public function referenceItemAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
		$item = $this->_model->getContentItemById($params['id']);
		$this->view->item = $item;
		//$this->helper->arrayTrans($item);
	}
}