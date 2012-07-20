<?php 
class Application_Model_Abstract
{
	public $content; 
    public $categories;
    public $tags;
    public $db;
    public $nowdate;
    public $help;
    public $obl;
    public $gorod;
    public $month;
	public $indexation;
	public $subscript;
	public $lang;
	public $contentFields;
	public $categoriesFields;
    
    public function __construct()
    {
    	$this->content = "cmscontent";
    	$this->categories = "cmscategories";
    	$this->tags = "tags";
    	$this->obl = "regions_obl";
    	$this->gorod = "regions_gorod";
		$this->indexation = "indexation";
		$this->subscript = 'subscription';
    	$this->db = Zend_Registry::get('db');
        $this->nowdate = mktime(date("H"), date("i"), date("s"), date("n"), date("j"), date("Y"));
        $this->help = new myHelpers();
        $this->lang = Zend_Registry::get('lang');
        $this->month = array(
                	'1' => 'января',
                	'2' => 'февраля',
                	'3' => 'марта',
                	'4' => 'апреля',
                	'5' => 'мая',
                	'6' => 'июня',
                	'7' => 'июля',
                	'8' => 'августа',
                	'9' => 'сентября',
                	'10' => 'октября',
                	'11' => 'ноября',
                	'12' => 'декабря'
        );
        $this->contentFields = array(
        	"ru" => array (
        				"title" => "title",
        				"introtext" => "introtext",
        				"fulltext" => "fulltext",
        			),
        	"en" => array (
            			"title" => "param1",
            			"introtext" => "param2",
            			"fulltext" => "param3",
        			),
        	"de" => array (
            			"title" => "param4",
                		"introtext" => "param5",
                    	"fulltext" => "param6",
        			),
        );
        
        $this->categoriesFields = array(
            "ru" => array (
             	"title" => "title",
             	"description" => "description"
        	),
             "en" => array (
             	"title" => "param1",
             	"description" => "param2",
            ),
             "de" => array (
             	"title" => "param3",
                "description" => "param4",
        	),
        );
    }
    public function insert($tbl, $array)
    {
    	$this->db->insert($tbl, $array);
    	return $this->db->lastInsertId();
    }
    
    public function update($id, $tbl, $array)
    {
    	$this->db->update($tbl, $array, 'id = ' . $id);
    }
    
    public function delete($id, $tbl)
    {
    	$this->db->delete($tbl, 'id = ' . $id);
    }
	
	public function getRootCategoryInfo($alias = null)
	{
		if(is_null($alias)){
			return array();
		}	
		
		$select = $this->db->select();
		$select->from(
			array("cat" => $this->categories),
			array(
				"indexLimit" => "cat.param1",
				"listLimit"  => "cat.param2",
				"title"      => "cat.title",
				"alias"      => "cat.title_alias"
			)
		);
		$select->where("cat.published = 1");
		$select->where("cat.parent_id = 0");
		$select->where("cat.title_alias = ?", $alias);
		$select->limit(1);
		$result = $this->db->fetchRow($select);
		if(!empty($result)){
			return $result;
		} else {
			return array();
		}
	}
	
	public function countItems($categoryAlias = null)
	{
		if(is_null($categoryAlias)){
			return 0;
		}	
		$select = $this->db->select();
		$select->from(
			array("item" => $this->content),
			array("id" => "item.id")
		);
		$select->where("item.published = 1");
		$select->joinLeft(
			array("parent" => $this->categories),
			"parent.id = item.parent_id",
			array("alias" => "parent.title_alias")
		);
		$select->where("parent.title_alias = ?", $categoryAlias);
		$select->where("parent.published = 1");
		$result = $this->db->fetchAll($select);
		return count($result);	
	}
	
	public function indexationCaptureCheck($url)
	{
		$select = $this->db->select();
		$select->from(
			array("saved" => $this->indexation),
			array(
				"id"    => 'saved.id',
				"title" => 'saved.title_hash',
				"text"  => 'saved.text_hash'
			)
		);
		$select->where("saved.url = ?", $url);
		return $this->db->fetchRow($select);
	} 
	
	public function addHit($id)
	{
		$array = array(
			"hits" => new Zend_Db_Expr($this->db->quoteIdentifier('hits') . ' + 1')
		);	
		$this->db->update($this->content, $array, 'id = ' . $id);
	}
	
	public function countConsultingItems($cat = 'all')
	{
		$select = $this->db->select();
		$select->from(
			array("content" => $this->content),
			array(
				"id" => "content.id",
				"title" => "content.title",
				"alias" => "content.title_alias",
				"introtext" => "content.introtext",
				"image" => "content.image",
				"created" => "content.created",
				"hits" => "content.hits",
			)
		);
		$select->where("content.published = 1");
		$select->where("content.fulltext != ?", '');
		$select->order("content.created desc");
		
		$select->joinLeft(
			array('child' => $this->categories),
			"child.id = content.parent_id",
			array(
				"child_title" => "child.title",
				"child_alias" => "child.title_alias"
			)
		);
		if($cat !='all')  {
			$select->where("child.title_alias = ?", $cat);
		}
		$select->where("child.published = 1");
		
		$select->joinLeft(
			array("parent" => $this->categories),
			"parent.id = child.parent_id",
			array(
				"parent_title" => "parent.title",
				"parent_alias" => "parent.title_alias"
			)
		);
		$select->where("parent.title_alias = ?", 'consulting_room');
		$select->where("parent.published = 1");
		
		$result = $this->db->fetchAll($select);
		
		return count($result);
	}
	
	public function checkSubscript($email = null)
	{
		if(is_null($email)){
			return array();
		}
		
		$select = $this->db->select();
		$select->from(
			array("user" => $this->subscript),
			array(
				"id" => "user.id",
				"name" => "user.name",
				"mail" => "user.mail",
				"phone" => "user.phone"
			)
		);
		$select->where("user.mail = ?", $email);
		
		return $this->db->fetchRow($select);
	}
}