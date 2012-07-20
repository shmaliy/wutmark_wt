<?php

class Adv_IndexController extends Zend_Controller_Action
{
    private $model;
    private $help;
	private $img;
	private $nowdate;
    
	public function init()
    {
        $this->model = new Adv_Model_Frontend();
        $this->img = new img();
        $this->nowdate = $this->model->abstractModel->nowdate;
        $this->help = $this->model->abstractModel->help;
		$this->view->help = $this->help;
    }
    
    
    public function footerbuttonsAction()
    {
        $items = $this->model->getFooterButtons();
		//$this->help->arrayTrans($items);
		$this->view->items = $items;
	}   
}