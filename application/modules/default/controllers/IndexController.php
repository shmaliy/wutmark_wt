<?php

class IndexController extends Zend_Controller_Action
{
    private $_model;
    private $_contentModel;
    private $_image;
    private $_receiver;
    
    public $helper;
	
	public function init()
    {
        $this->_model = new Application_Model_Default();
        $this->_contentModel = new Content_Model_FrontendModel();
        $this->helper = $this->_model->helper;
    	
        $ajaxContext = $this->_helper->getHelper('AjaxContext');
        $ajaxContext->addActionContext('support', 'json');
        $ajaxContext->initContext('json');
        $this->_image = new My_Image_Image();
        $this->_receiver = 'a.zelensky@ukrnichrom.com';
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
    
   	public function supportAction()
   	{
   		$request = $this->getRequest();
   		$params = $request->getParams();
   		//$this->view->params = $params;
   		
   		$form = new Application_Form_CustomerSupport();
   		$form->setAction($this->view->url(array('lang' => $params['lang']), 'ajax-support'));
   		
   		$form->getElement('name')->setLabel(CUSTOMER_SUPPORT_NAME);
   		$form->getElement('phone')->setLabel(CUSTOMER_SUPPORT_PHONE);
   		$form->getElement('email')->setLabel(CUSTOMER_SUPPORT_EMAIL);
   		$form->getElement('question')->setLabel(CUSTOMER_SUPPORT_QUESTION);
   		$form->getElement('submit')->setLabel(CUSTOMER_SUPPORT_SEND);
   		
   		if ($request->isXmlHttpRequest() || $request->isPost()) {
   			
   			if ($form->isValid($request->getParams())) {
   				$values = $form->getValues();
   				
   				$headers  = 'MIME-Version: 1.0' . "\r\n";
   				$headers .= 'Content-type: text/html; windows-1251' . "\r\n";
   				
   				// Additional headers
   				$headers .= 'To: <' . $this->_receiver . '>' . "\r\n";
   				$headers .= 'From: <feedback@' . $_SERVER['HTTP_HOST'] . '> ' . "\r\n";
   				
   				$subject = 'Обратная связь с сайта ' . $_SERVER['HTTP_HOST'];
   				$message = '<b>Имя</b> ' . $values['name'] . '<br />';
   				if (isset($values['phone']) && !empty($values['phone'])) {
   					$message .= '<b>Контактный телефон</b>' . $values['phone'] . '<br />';
   				}
   				$message .= '<b>Эл. адрес</b> ' . $values['email'] . '<br />';
   				$message .= '<b>Вопрос</b> ' . $values['question'];
   				$message =  iconv('utf-8', 'windows-1251', $message);
   				
   				mail($this->_receiver, $subject, $message, $headers);
				$this->view->success = CUSTOMER_SUPPORT_SUCCESS;   				
   			} else {
   				$this->view->formErrors        = $form->getErrors();
   				$this->view->formErrorMessages = $form->getMessages();
   			}
   		} else {
   			$this->view->form = $form;
   		}
   	}
    
   	public function indexSupportAction()
   	{
   		$request = $this->getRequest();
   		$params = $request->getParams();
   		//$this->view->params = $params;
   		
   		
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
    
    public function downloadBookAction()
    {
    	$request = $this->getRequest();
    	$params = $request->getParams();
    	//$this->helper->arrayTrans($params);
    	
    	$item = $this->_contentModel->getStaticContentItem($params['book']);
    	if (!empty($item)) {
	    	$item['image'] = $this->_image->setImage($item['image'], 'thumbs_200px')->resizeToWidth(200);
	    	//$this->helper->arrayTrans($item);
	    	
	    	$this->view->item = $item;
    	}
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



