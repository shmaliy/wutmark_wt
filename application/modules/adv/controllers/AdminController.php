<?php 
class News_AdminController extends Zend_Controller_Action
{
private $model;
	private $help;
	private $img;
	private $month;
	private $renamer;
	private $nowdate;
	private $abstractModel;

	public function init()
	{
		$this->model = new Gossip_Model_Frontend();
		$this->abstractModel = new Application_Model_Abstract();
		$ajaxContext = $this->_helper->getHelper('AjaxContext');
		$ajaxContext->addActionContext('add', 'json');
		$ajaxContext->addActionContext('edit', 'json');
		$ajaxContext->addActionContext('publishing', 'json');
		$ajaxContext->addActionContext('delete', 'json');
		$ajaxContext->initContext('json');
		$this->help = $this->abstractModel->help;
		$this->renamer = new renamer();
		$this->nowdate = $this->abstractModel->nowdate;
	}
	
	public function addAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		$this->view->tags = $this->model->tagList();
		$this->view->help = $this->help;
		if($request->isXmlHttpRequest() || $request->isPost()){
			if($params['action'] == 'add'){
				//$this->view->params = $params;
				$params = $this->help->encToFrontend($params);
				$title = strip_tags($params['title']);
				$text = $params['text'];
	
				$errors = array();
	
				// Валидация заголовка
				if(!$this->help->isValidTitle($title)){
					$errors[] = array(
							'place' => 'title_error', 
							'value' => 'Пустой или некорректный заголовок! Прочтите <a href="#">правила</a> добавления новости.'
					);
				}
	
				// Валидация текста
				if(!$this->help->isValidTextSimple($text)){
					$errors[] = array(
							'place' => 'text_error', 
							'value' => 'Не введен текст.'
					);
				} else {
					$text = str_replace('<a href="', '<a target="_blank" href="', $text);
				}
	
				// Валидация согласия с правилами
				if(!isset($params['agree']) || $params['agree'] != 'on'){
					$errors[] = array(
							'place' => 'agree_error', 
							'value' => 'Не согласные с <a href="#">правилами сайта</a> новостей не публикуют! ))'
					);
				}
				
				if(!empty($errors)){
					$this->view->errors = $this->help->encToServer($errors);
					return false;
				} else {
					$this->view->errors = 'none';
				}
	
				$publ = 0;
				if($_SESSION['cms']['authorized'] == 1){
					$publ = 1;
				}
	
				$insert = array(
						"parent_id" => 20,
						"title" => $title,
						"introtext" => $text,
						"created" => $this->nowdate,
						"published" => $publ,
						"checked_out" => 0,
						"hits" => 0,
						"param3" => 0,
						"param4" => 0,
						"param6" => $params['town'],
						"param7" => $_SERVER['REMOTE_ADDR']
				);
	
				$images = $this->help->imgarray('contents/tmp_load/' . $params['dir']);
				if(!empty($images)){
					$insertId = $this->abstractModel->insert($this->model->content, $insert);
				} else {
					$errors[] = array(
							'place' => 'photos_error', 
							'value' => 'Возникла ошибка при загрузке изображений, или вы сочиняли сплетню больше 3-х часов и система удалила ваши файлы. Загрузите картинки снова!'
					);
					$this->view->errors = $this->help->encToServer($errors);
					return false;
				}
	
				if($insertId){
					$newdir = 'contents/news/' . $insertId;
					$files = $this->help->copyImagesToPlace($images, $newdir, $params['dir']);
					
					if(is_array($files)){
						if(!isset($params['mainimage'])){
							$params['mainimage'] = 0;
						}
						$mainimage = $files[$params['mainimage']];
						unset($files[$params['mainimage']]);
						
						if(!empty($files)){
							$update = array(
								"image" => $mainimage,
								"images" => implode('|', $files)
							);
						} else {
							$update = array( "image" => $mainimage );
						}
						$this->abstractModel->update($insertId, $this->model->content, $update);
					}
				}
			}
		}
	}
	
	public function editAction()
	{
	
	}
	
	public function publishingAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		$item = $this->model->getGossip($params['id']);
		if($item['published'] == 1){
			$update = array(
					"published" => 0
			);
			$status = 0;
		} else {
			$update = array(
					"published" => 1
			);
			$status = 1;
		}
		$this->abstractModel->update($params['id'], $this->model->content, $update);
		$this->view->status = $status;
	}
	
	public function deleteAction()
	{
		$request = $this->getRequest();
		$params = $request->getParams();
		$gossip = $this->model->getGossip($params['id']);
		$file[] = ltrim($gossip['image'], '/');
		$dir = explode('/', ltrim($gossip['image'], '/'));
		unset($dir[count($dir)-1]);
		$dir = implode('/', $dir);
		$this->help->RemoveDir($dir);
		$this->abstractModel->delete($params['id'], $this->model->content);
	}
	
}