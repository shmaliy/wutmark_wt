<?php

class Indexation_IndexController extends Zend_Controller_Action
{
    private $help;
    private $abstractModel;
	
	public function init()
    {
        $this->abstractModel = new Application_Model_Abstract();
        $this->help = $this->abstractModel->help;
		$this->nowdate = $this->abstractModel->nowdate;
		$this->tbl = $this->abstractModel->indexation;
    }
    
	public function indexAction()
	{
		
	}
	
    public function captureAction()
    {
        $request = $this->getRequest();
		$params = $request->getParams();
		//$this->help->arrayTrans($params);
		
		$text_prepare = preg_replace('|\b[\d\w]{1,3}\b|i', ' ', $params['text']);	
		$text_prepare = preg_replace('|[^\d\w ]+|i', ' ', $text_prepare);	
		$text_prepare = preg_replace('|[\s]+|i', ' ', $text_prepare);
		
		$exist = $this->abstractModel->indexationCaptureCheck($params['url']);
		if(empty($exist)){
			$insert = array(
				"url" => $params['url'],
				"title" => $params['title'],
				"title_hash" => md5($params['title']),
				"text" => $params['text'],
				"prepared_text" => $text_prepare,
				"text_hash" => md5($params['text']),
				"created" => $this->nowdate
			);
			$this->abstractModel->insert($this->tbl, $insert);
			//$this->help->arrayTrans($insert);
		} else {
			//$this->help->arrayTrans($exist);
			$update = array();
			if($exist['title'] != md5($params['title'])){
				$update['title'] = $params['title'];
				$update['title_hash'] = md5($params['title']);
			}
			if($exist['text'] != md5($params['text'])){
				$update['text'] = $params['text'];
				$update['prepared_text'] = $text_prepare;
				$update['text_hash'] = md5($params['text']);
			}
			if(!empty($update)){
				$update['created'] = $this->nowdate;
				$this->abstractModel->update($exist['id'], $this->tbl, $update);
			}
		}
	}   
}