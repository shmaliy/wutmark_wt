<?php
class Adv_Model_Frontend
{
    public $content; 
    public $categories;
    public $tags;
    public $db;
    public $nowdate;
    public $help;
    public $obl;
    public $gorod;
	public $categoryAlias;
    
    public function __construct()
    {
		$this->abstractModel = new Application_Model_Abstract();
        $this->content = $this->abstractModel->content;
        $this->categories = $this->abstractModel->categories;
        $this->tags = $this->abstractModel->tags;
        $this->obl = $this->abstractModel->obl;
        $this->gorod = $this->abstractModel->gorod;
        $this->db = $this->abstractModel->db;
        $this->nowdate = $this->abstractModel->nowdate;
        $this->help = $this->abstractModel->help;
    }
	
	public function getFooterButtons()
	{
		$select = $this->db->select();
		$select->from(
			array("content" => $this->content),
			array(
				"title" =>"content.title",
				"url" => "content.title_alias",
				"img" => "content.image"
			)
		);
		$select->where("content.published = 1");
		$select->where("content.title_alias != ?", '');
		$select->where("content.image != ?", '');
		$select->order("content.ordering");
		
		$select->joinLeft(
			array("child" => $this->categories),
			"content.parent_id = child.id",
			array(
				"child.alias" => "child.title_alias"
			)
		);
		$select->where("child.title_alias = ?", '88x31');
		$select->where("child.published = 1");
		
		$select->joinLeft(
			array("parent" => $this->categories),
			"child.parent_id = parent.id",
			array(
				"parent.alias" => "parent.title_alias"
			)
		);
		$select->where("parent.title_alias = ?", 'adv');
		$select->where("parent.published = 1");
		
		return $this->db->fetchAll($select);
	}
}