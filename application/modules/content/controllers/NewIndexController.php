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