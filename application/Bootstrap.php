<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{	
    public function run()
    {
        try {
	    	$this->setConfig();	        
	    	$this->setLoader();	    	
	    	$this->setModules(); // merge config with modules config           
	    	$this->setView();
			$this->setPlugins();
	        $this->setDbAdapter();	    	
            $router = $this->setRouter();	    	
            $front = Zend_Controller_Front::getInstance();            
            $front->setRouter($router);            
            //$front->registerPlugin(new Ext_Controller_Plugin_ModuleBootstrap, 1);
            Zend_Registry::set('interface', $this->_options['interface']);
            
        } catch (Exception $e) {
        	echo $e->getMessage();
        }
        
    	parent::run();
    }
	
	public function setPlugins()
	{
		$front = Zend_Controller_Front::getInstance();
        $front->registerPlugin(new Custom_Controller_Plugin_IEStopper(array('ieversion' => 7)));
            
	}
	
    public function setConfig()
    {
        Zend_Registry::set('options', $this->_options);    	
    }
    
    /**
     * 
     */
	public function setLoader()
	{
		$autoLoader = Zend_Loader_Autoloader::getInstance();		
		$autoLoader->setFallbackAutoloader(true);
	}    
    
	/**
     * 
     */
	public function setView()
	{
	    $viewRenderer = Zend_Controller_Action_HelperBroker::getStaticHelper('ViewRenderer');
        $viewRenderer->setViewSuffix('php3');
				
		$layout = Zend_Layout::getMvcInstance();
		$url = parse_url($_SERVER['REQUEST_URI']);
		$url = $url['path'];
		$url = trim($url, '/');
		$url = explode('/', $url);
		
		if($url[0] == 'admin'){
			$layout->setLayout('admin');
		} else {
			$layout->setLayout('layout');
		}
	}    

	public function setDbAdapter()
	{
		$db = Zend_Db::factory(new Zend_Config($this->_options['resources']['db']));
		Zend_Db_Table_Abstract::setDefaultAdapter($db);
		Zend_Registry::set('db', $db);
		$db->getConnection();
	}
	
	public function setRouter()
	{
	    $router = new Zend_Controller_Router_Rewrite();
	    //$router->removeDefaultRoutes();
	    
	    $path = parse_url($_SERVER['REQUEST_URI']);
	    $path = $path['path'];
	    $path = explode('/', trim($path, '/'));
	    if(empty($path[0])){
	    	$lang = 'ru';
	    } else {
	    	$lang = $path[0];
	    }
	    Zend_Registry::set('lang', $lang);
	    
	    $cache = parse_ini_file('cache.ini');
	    Zend_Registry::set('cache', $cache['cache']);
	    
	    /*  Многоязычность на главной  */
	    $route = new Zend_Controller_Router_Route_Regex(
	    	'[a-z]{2}',
	    	array(
	    		'module' => 'default',
	    	    'controller' => 'index',
	    	    'action'     => 'index',
	    		'lang' => $lang
	    	)
	    );
	    $router->addRoute('index', $route);
	    /*-----------------------------*/
	    
		/* Статический контент */
		$route = new Zend_Controller_Router_Route_Regex(
        	'([^.]+)+\/([^.]+).html',
        	array(
	            'module' => 'content',
	    	   	'controller' => 'new-index',
	    	   	'action'     => 'static-content-item',
				'lang' => $lang
            )
        );
        $router->addRoute('static', $route);
        
        
        
        
        
        
        
        
        
        
        
        
        
        /*  Управление кешированием*/
        $route = new Zend_Controller_Router_Route(
        	'cachemanager/:mode',
        array(
        	'module' => 'default',
        	'controller' => 'index',
        	'action'     => 'cache-manager'
        	)
        );
        $router->addRoute('cache-manager-mode', $route);
        
        $route = new Zend_Controller_Router_Route(
        	'cachemanager',
        	array(
               	'module' => 'default',
               	'controller' => 'index',
               	'action'     => 'cache-manager'
        	)
        );
        $router->addRoute('cache-manager', $route);
        
        /*-------------------------*/
        
        /*  Аяксовое получение новостей */
        
        $route = new Zend_Controller_Router_Route(
        	'ajax_news/:lang/:page',
	        array(
				'module' => 'default',
	        	'controller' => 'index',
	        	'action'     => 'indexnews',
	    		'lang' => $lang
	        )
        );
        $router->addRoute('ajax_news', $route);
        
        /* non ajax news */
        $route = new Zend_Controller_Router_Route(
        	':lang/news',
	        array(
				'module' => 'default',
	        	'controller' => 'index',
	        	'action'     => 'news'
	        )
        );
        $router->addRoute('news', $route);
        
        /* non ajax news item */
        $route = new Zend_Controller_Router_Route(
        	':lang/news/:id',
	        array(
				'module' => 'default',
	        	'controller' => 'index',
	        	'action'     => 'newsitem'
	        )
        );
        $router->addRoute('newsitem', $route);
        
        /* non ajax directives */
        $route = new Zend_Controller_Router_Route(
        	':lang/areas_of_activity',
	        array(
				'module' => 'default',
	        	'controller' => 'index',
	        	'action'     => 'directives'
	        )
        );
        $router->addRoute('areas_of_activity', $route);
        //echo $lang;

	    return $router;
	}
	
	public function setModules()
	{
	    //$modules = new Ext_Modules_Load();
    	//Zend_Registry::set('modules', $modules->getList());
	}
}

