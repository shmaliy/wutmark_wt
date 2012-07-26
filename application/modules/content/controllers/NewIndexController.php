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
		
		$this->helper->arrayTrans($this->_model->getMenuItems());
		
		$this->helper->arrayTrans($this->_model->getDefaultContentItem($params[2]));
	}
}