<?php
class Content_Model_Frontend
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
	public $lang;
	public $contentFields;
	public $categoriesFields;
    
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
        $this->lang = $this->abstractModel->lang;
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
    
    public function getDymanicContentList($category = null)
    {
    	if(is_null($category)){
    		return array();
    	}
    	
    	$select = $this->db->select();
    	$select->from(
    		array('content' => $this->content),
    		array(
    	      	'id' => 'content.id',
    	       	'title' => 'content.title',
    	       	'introtext' => 'content.introtext',
    	       	'fulltext' => 'content.fulltext',
    	    )
    	);
    	$select->where('content.published = 1');
    	$select->order('content.ordering');

    	$select->joinLeft(
    		array('category' => $this->categories),
    			"category.id = content.parent_id",
    		array(
    	       	"cat_title" => "category.title",
    	       	"cat_alias" => "category.title_alias"
    		)
    	);
    	$select->where("category.published = 1");
    	$select->where("category.title_alias = ?", $category);
    	
    	return $this->db->fetchAll($select);
    }
    
    public function getDefaultContentItem($id, $lang = null)
	{
		if(is_null($lang)){
			$lang = $this->lang;
		}
		
		$select = $this->db->select();
		$select->from(
			array("content" => $this->content),
			array(
				"id" => "content.id",
				"title" => "content." . $this->contentFields[$lang]['title'],
				"alias" => "content.title_alias",
				"introtext" => "content." . $this->contentFields[$lang]['introtext'],
				"fulltext" => "content." . $this->contentFields[$lang]['fulltext'],
				"image" => "content.image",
				"images" => "content.images",
				"created" => "content.created",
				"hits" => "content.hits",
			)
		);
		$select->where("content.published = 1");
		$select->where("content.id = ?", $id);
		$select->joinLeft(
			array("parent" => $this->categories),
			"parent.id = content.parent_id",
			array(
				"parent_title" => "parent." . $this->categoriesFields[$lang]['title'],
				"parent_alias" => "parent.title_alias"
			)
		);
		$select->where("parent.published = 1");
		return $this->db->fetchRow($select);
	}
	
	public function getNewsIndexList($lang = null)
	{
		if(is_null($lang)){
			$lang = $this->lang;
		}
		$select = $this->db->select();
		$select->from(
			array("news" => $this->content),
			array(
				"id" => 'news.id',
				"title" => 'news.' . $this->contentFields[$lang]['title'],
				"introtext" => 'news.' . $this->contentFields[$lang]['introtext'],
				"fulltext" => 'news.' . $this->contentFields[$lang]['fulltext'],
				"image" => 'news.image',
				"date" => 'news.publish_up'
			)
		);
		$select->where("news.published = 1");
		$select->where('news.' . $this->contentFields[$lang]['introtext'] . ' != ?', '');
		$select->order("news.ordering");
		
		$select->joinLeft(
			array("parent" => $this->categories),
			"parent.id = news.parent_id",
			array(
				"parent_title" => "parent." . $this->categoriesFields[$lang]['title'],
				"parent_alias" => "parent.title_alias"
			)
		);
		$select->where("parent.published = 1");
		$select->where("parent.parent_id = 0");
		$select->where("parent.title_alias = ?", 'news');
		
		return $this->db->fetchAll($select);
	}
	
	public function getAreasOfActivityList($lang = null)
	{
		if(is_null($lang)){
			$lang = $this->lang;
		}
		$select = $this->db->select();
		$select->from(
		array("news" => $this->content),
		array(
					"id" => 'news.id',
					"title" => 'news.' . $this->contentFields[$lang]['title'],
					"introtext" => 'news.' . $this->contentFields[$lang]['introtext'],
					"fulltext" => 'news.' . $this->contentFields[$lang]['fulltext'],
					"image" => 'news.image',
					"date" => 'news.publish_up'
		)
		);
		$select->where("news.published = 1");
		$select->where('news.' . $this->contentFields[$lang]['introtext'] . ' != ?', '');
		$select->order("news.ordering");
	
		$select->joinLeft(
		array("parent" => $this->categories),
				"parent.id = news.parent_id",
		array(
					"parent_title" => "parent." . $this->categoriesFields[$lang]['title'],
					"parent_alias" => "parent.title_alias"
		)
		);
		$select->where("parent.published = 1");
		$select->where("parent.parent_id = 0");
		$select->where("parent.title_alias = ?", 'areas_of_activity');
	
		return $this->db->fetchAll($select);
	}
	
    public function getStaticContent($alias = null, $lang = null)
	{
		if(is_null($alias)){
			return array();
		}	
		if(is_null($lang)){
			$lang = $this->lang;
		}
		
		$select = $this->db->select();
		$select->from(
			array("content" => $this->content),
			array(
				"id" => "content.id",
				"title" => 'content.' . $this->contentFields[$lang]['title'],
				"alias" => "content.title_alias",
				"introtext" => 'content.' . $this->contentFields[$lang]['introtext'],
				"fulltext" => 'content.' . $this->contentFields[$lang]['fulltext'],
				"image" => "content.image",
				"images" => "content.images",
				"created" => "content.created",
				"hits" => "content.hits",
			)
		);
		$select->where("content.published = 1");
		$select->where("content.parent_id = 0");
		$select->where("content.title_alias = ?", $alias);
		$select->limit(1);
		
		return $this->db->fetchRow($select);
	}
}