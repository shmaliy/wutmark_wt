<?php

class Menu_IndexController extends Zend_Controller_Action
{
    private $model;
    private $img;
    private $help;
    private $lang;
	
	public function init()
    {
        $this->model = new Menu_Model_Frontend();
		$this->abstractModel = new Application_Model_Abstract();
        $this->img = new img();
        $this->help = $this->model->help;
        $this->lang = Zend_Registry::get('lang');
    }
    
    public function checkCurrent($position)
    {
    	$url = $_SERVER['REQUEST_URI'];
    	$url = trim($url, '/');
    	$url = parse_url($url);
    	$url = $url['path'];
    	//$this->help->arrayTrans($url);
    }
    
    public function languageDetector($str = null)
    {
    	if(is_null($str)){
    		return false;
    	}
    	$str = explode('|', trim($str, '|'));
    	$ret = array(
    			"ru" => $str[0],
    			"en" => $str[1],
    			"de" => $str[2]
    	);
    	return $ret;
    }
    
    public function indexAction()
    {
        $result = $this->model->ReturnMenuItems('mainmenu');
        foreach ($result as &$item) {
        	$title = $this->languageDetector($item['title']);
        	$item['title'] = $title[$this->lang];
        	$item['link'] = str_replace(':lang:', $this->lang, $item['link']);
        } 	
        //$this->help->arrayTrans($result);
		$this->view->menu_result = $result;
	} 
	
	public function bottomAction()
	{
		$result = $this->model->ReturnMenuItems('mainmenu');
		foreach ($result as &$item) {
			$title = $this->languageDetector($item['title']);
			$item['title'] = $title[$this->lang];
			$item['link'] = str_replace(':lang:', $this->lang, $item['link']);
		}
		//$this->help->arrayTrans($result);
		$this->view->menu_result =  $result;
	}
}