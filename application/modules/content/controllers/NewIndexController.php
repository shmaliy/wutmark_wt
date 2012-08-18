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
		
		
		
		if ($request->isXmlHttpRequest() || $request->isPost()) {
			$root = $this->_model->getRootCategoryEntryByAlias($params['category'], $params['lang']);
			$items = $this->_model->getNews(array($root['id']));
			
			$this->view->count = count($items);
			
			if ($this->view->count/$params['limit'] != floor($this->view->count/$params['limit'])) {
				$this->view->pages = floor($this->view->count/$params['limit']) + 1;
			} else {
				$this->view->pages = $this->view->count/$params['limit'];
			}
			
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
			//var_export($news);
			//var_export($params);
			
			$this->_helper->layout()->disableLayout();
			$this->render('last-news-inner');
		} else {
			$this->render('last-news');
		}
		
	}
	
	public function newsIndexAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->helper->arrayTrans($params);
		
		$root = $this->_model->getRootCategoryEntryByAlias($params['alias']);
		//$this->helper->arrayTrans($root);
		
		$this->view->title = $root['title'];
	}
	
	public function newsItemAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
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
		//$this->helper->arrayTrans($root);
	
		$this->view->title = $root['title'];
	}
}