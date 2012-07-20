<?php

class Content_AdminController extends Zend_Controller_Action
{
    private $model;
    private $help;
	private $img;
	private $nowdate;
    
	public function init()
    {
        $this->model = new Content_Model_Frontend();
        $this->img = new img();
        $this->nowdate = $this->model->abstractModel->nowdate;
		$this->abstractModel = $this->model->abstractModel;
        $this->help = $this->model->abstractModel->help;
		$this->view->help = $this->help;
    }
	
	public function addconsultingrequestAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		$this->help->arrayTrans($params);
		
		$form = new Application_Form_Consulting(); 
		
		$towns = array(
			"1" => 1,
			"454" => 'sdfsdf',
			"fdgdfg1" => 'dfgfg'
		);
		$form->town->addMultioptions($towns);
		//$form->town->setValue('454');
		
		$cats = array(
			"1d" => 1343432,
			"454" => 'sdfsdfssdfsdf',
			"fdgdfg1" => 'dsdfsdffgfg'
		);
		$form->cat->addMultioptions($cats);
		//$form->town->setValue('454');
		
		$consultants = array(
			"1d" => 1343432,
			"454" => 'sdfsdfssdfsdf',
			"fdgdfg1" => 'dsdfsdffgfg'
		);
		$form->consultant->addMultioptions($consultants);
		//$form->town->setValue('454');
		
		
		
		$this->view->name_group = $form->getDisplayGroup('name_group');
		$this->view->email = $form->email;
		$this->view->phone = $form->phone;
		$this->view->town = $form->town;
		$this->view->cat = $form->cat;
		$this->view->consultant = $form->consultant;
		$this->view->comment = $form->comment;
		$this->view->captcha = $form->captcha;
		$this->view->submit = $form->submit;
		$this->view->widgets = $params['widgets'];
	}
}