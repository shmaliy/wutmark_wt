<?php

class Menu_IndexController extends Zend_Controller_Action
{
	private $_model;
	public $helper;
	
	public function init()
    {
        $this->_model = new Menu_Model_MenuFrontend();
        $this->helper = $this->_model->helper;
    }
    
 	public function topMenuAction()
 	{
 		$request = $this->getRequest();
 		$params = $request->getParams();
 		
 		$items = $this->_model->getMenuItems($params['rootAlias'], 'topMenu', '60');
 		foreach ($items as &$item) {
 			if ($item['title_alias'] == 'production') {
 				$item['childs'] = array();
 				$root = $this->_model->getRootCategoryEntryByAlias('production');
 				$tree = $this->_model->prodTree($root['id']);
 				//$this->helper->arrayTrans($tree);
 				foreach ($tree as $branch) {
 					if (!empty($branch['childs']) && isset($branch['childs'])) {
 						$subsubmenu = array();
 						foreach ($branch['childs'] as $child) {
 							$subsubmenu[] = array(
 							'title' => $child['title'],
 							'link' => '/' . Zend_Registry::get('lang') . '/production/' . $branch['title_alias'] . '/' . $child['title_alias'],
 							);
 						}
 					}
 					
 					$item['childs'][] = array(
 						'title' => $branch['title'],
 						'link' => '/' . Zend_Registry::get('lang') . '/production/' . $branch['title_alias'],
 						'childs' => $subsubmenu
 					);
 				}
 			}
 		}
 		
 		//$this->helper->arrayTrans($items);
 		$this->view->items = $items;
 	}
 	
 	public function bottomMenuAction()
 	{
 		$request = $this->getRequest();
 		$params = $request->getParams();
 			
 		$items = $this->_model->getMenuItems($params['rootAlias'], 'bottomMenu', '60');
 		//$this->helper->arrayTrans($items);
 		$this->view->items = $items;
 	}
    
    public function indexAction()
    {

    } 
	
}