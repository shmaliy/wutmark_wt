<?php

class Content_IndexController extends Zend_Controller_Action
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
        $this->help = $this->model->abstractModel->help;
		$this->view->help = $this->help;
    }
    
    public function indexAction()
    {
        
	}   
	
	public function staticAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		//$this->help->arrayTrans($params);
		
		$item = $this->model->getStaticContent($params[2]);

		//$this->help->arrayTrans($item);
		
		$this->view->item = $item;
	}
	
	public function servicesAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		$static = $this->model->getStaticContent($params['action']);
		$this->view->item = $static;
		
		$dynamic = $this->model->getDymanicContentList($params['action']);
		$this->view->list = $dynamic;
		
	}
	
	public function servicesitemAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		
		$item = $this->model->getDefaultContentItem($params['id']);
		$this->view->item = $item;
	}
	
	public function defaultcontenthowAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->help->arrayTrans($params);
		
		$item = $this->model->getDefaultContentItem($params['itemid']);
		
		if(empty($item)){
			$this->view->error = 1;
			return false;
		}
		if(!empty($item['image'])){
			$item['image_lnk'] = $this->help->createSquareLink($item['image'], 64);
		}
		
		if(!empty($item['alias'])){
			$alias = explode("-", $item['alias']);
			$item['created'] = mktime(0, 0, 0, $alias[1], $alias[0], $alias[2]);
		}
		
		try {
		    $viwedItems = new Zend_Session_Namespace('viewed_items');
		} catch (Zend_Session_Exception $e) { }
		
		if(!isset($viwedItems->$params['itemid'])){
			$this->model->abstractModel->addHit($params['itemid']);
			$viwedItems->$params['itemid'] = 1;
		}
		$this->view->item = $item;
		$this->view->category = $catInfo;
		$this->view->page = $params['page'];
		$this->view->cat = $params['cat'];
		$this->view->widgets = $params['widgets'];
	}
	
	public function seoAction()
	{
		$text = $this->model->getStaticContent('seo');
		$this->view->title = $text['title'];
		$this->view->text = $text['introtext'];
	}
	
	public function menumainAction()
	{
		$items = $this->model->getMenuTree();
		
		
		foreach ($items as &$item) {
			if(!empty($item['category_image'])){
				$image = explode('/', ltrim($item['category_image'], '/'));
				$image[count($image) - 1] = 'big/' . $image[count($image) - 1];
				$item['category_image_big'] = '/' . implode('/', $image);
			}
		}
		
		//$this->help->arrayTrans($items);
		
		$this->view->items = $items;
	}
	
	public function menucategoryAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		//$this->help->arrayTrans($params);
		
		$items = $this->model->getMenuTree($params['category']);
		//$this->help->arrayTrans($items);
		
		$exist = array();
		$groups = array();
		foreach($items as $item){
			if(!isset($exist[$item[group_alias]])){
				$exist[$item[group_alias]] = 1;
				$groups[] = $item[group_alias];
			}
		}
		
		$groups = '["' . implode('", "', $groups) . '"]';
		//$this->help->arrayTrans($groups);
		
		$columns = array(
			"food_weight" => "Выход",
			"food_price" => "Цена",
			"drink_50g_price" => "50 гр.",
			"drink_100g_price" => "100 гр.",
			"drink_100g_price" => "100 гр.",
			"drink_bottle_price" => "Бутылка",
		
		);
		
		$this->view->columns = $columns;
		$this->view->items = $items;
		$this->view->groups = $groups;
	}
}