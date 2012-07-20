<?php

class Menu_AdminController extends Zend_Controller_Action
{
        
    public function init()
    {
        $this->model = new Application_Model_Menu();
    }
    
    public function indexAction()
    {
        $this->view->menu_result = $this->model->ReturnMenuItems('admin_menu'); 
    }
    
    
}