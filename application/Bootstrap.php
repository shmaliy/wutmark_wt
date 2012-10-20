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
	    	$lang = 'de';
	    } else {
	    	$lang = $path[0];
	    }
	    Zend_Registry::set('lang', $lang);
	    include('classes/interface_lang/' . $lang . '.php');
	    
	    $cache = parse_ini_file('cache.ini');
	    Zend_Registry::set('cache', $cache['cache']);
	    
	  	//session_start();
	   
	    
        
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
	    
	    /*  Области применения главная  */
	    $route = new Zend_Controller_Router_Route(
	    	':lang/deliveryforms.html',
	    	array(
	        	'module' => 'content',
	    	    'controller' => 'new-index',
	    	    'action'     => 'static-content-item',
	    		'lang' => $lang,
        		'2' => 'deliveryforms'
	    	)
	    );
	    $router->addRoute('deliveryforms', $route);
        
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
        
        
        
        
        /*  Новости главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/news',
        	array(
            	'module' => 'content',
                'controller' => 'new-index',
                'action'     => 'news-index',
        		'lang' => $lang,
        		'alias' => 'news'
       		)
        );
        $router->addRoute('news-index', $route);
        
        /*  Новости элемент  */
        $route = new Zend_Controller_Router_Route(
        	':lang/news/:id',
        	array(
            	'module' => 'content',
                'controller' => 'new-index',
                'action'     => 'news-item',
                'lang' => $lang
        	)
        );
        $router->addRoute('news-item', $route);
        
        /*  Ajax news  */
        $route = new Zend_Controller_Router_Route(
        	'content/new-index/last-news/*',
        	array(
               	'module' => 'content',
                'controller' => 'new-index',
                'action'     => 'last-news',
            )
        );
        $router->addRoute('ajax-last-news', $route);
        
        /*  Ajax news  */
        $route = new Zend_Controller_Router_Route(
        	'content/new-index/last-reference/*',
        	array(
            	'module' => 'content',
                'controller' => 'new-index',
               	'action'     => 'last-reference',
        	)
        );
        $router->addRoute('ajax-last-ref', $route);
        
        
        /*  Области применения главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/areas_of_use',
	        array(
	        	'module' => 'content',
	            'controller' => 'new-index',
	            'action'     => 'areas-of-use-index',
	            'lang' => $lang,
	            'alias' => 'areas_of_use'
	        )
        );
        $router->addRoute('areas-of-use-index', $route);
        
        /*  Области применения главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/areas_of_use/:id',
        	array(
        	   	'module' => 'content',
        	    'controller' => 'new-index',
        	    'action'     => 'areas-item',
        	    'lang' => $lang,
        	    'alias' => 'areas_of_use'
        	)
        );
        $router->addRoute('areas-of-use-item', $route);
        

        
        
        /*  Справка главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/reference',
        	array(
        		'module' => 'content',
        	    'controller' => 'new-index',
        	    'action'     => 'reference-category',
        	    'lang' => $lang,
        	    'alias' => 'reference'
        	)
        );
        $router->addRoute('reference-category', $route);
        
        /*  Формы поставки главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/forms-of-supply',
        	array(
            	'module' => 'default',
                'controller' => 'index',
                'action'     => 'index',
                'lang' => $lang,
                'alias' => 'reference'
        	)
        );
        $router->addRoute('forms-of-supply-category', $route);
        
        /*  Формы поставки просмотр  */
        $route = new Zend_Controller_Router_Route(
        	':lang/forms-of-supply/:id',
        	array(
              	'module' => 'default',
                'controller' => 'index',
                'action'     => 'index',
                'lang' => $lang,
                'alias' => 'reference'
        	)
        );
        $router->addRoute('forms-of-supply-view', $route);
        
        /*  Справка главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/reference/:cat',
        	array(
            	'module' => 'content',
                'controller' => 'new-index',
                'action'     => 'reference-index',
            	'lang' => $lang,
                'alias' => 'reference'
        	)
        );
        $router->addRoute('reference-index', $route);
        
        /*  Новости элемент  */
        $route = new Zend_Controller_Router_Route(
        	':lang/reference/:cat/:id',
        	array(
               	'module' => 'content',
                'controller' => 'new-index',
                'action'     => 'reference-item',
                'lang' => $lang
        	)
        );
        $router->addRoute('reference-item', $route);
        
        
        /*  Продукция главная  */
        $route = new Zend_Controller_Router_Route(
        	':lang/production',
       		array(
            	'module' => 'production',
                'controller' => 'index',
                'action'     => 'index',
                'lang' => $lang,
                'alias' => 'production'
        	)
        );
        $router->addRoute('production-index', $route);
        
        /*  Продукция подкатегория  */
        $route = new Zend_Controller_Router_Route(
        	':lang/production/:cat_alias/:subcat_alias',
        	array(
              	'module' => 'production',
               	'controller' => 'index',
                'action'     => 'category',
                'lang' => $lang,
                'alias' => 'production'
        	)
        );
        $router->addRoute('production-index-subcat', $route);
        
        /*  Продукция категория  */
        $route = new Zend_Controller_Router_Route(
        	':lang/production/:cat_alias',
        	array(
               	'module' => 'production',
            	'controller' => 'index',
                'action'     => 'category',
                'lang' => $lang,
                'alias' => 'production',
        		'cat-alias' => $cat_alias
        	)
        );
        $router->addRoute('production-index-cat', $route);
        
        
        
        
        /*  Управление кешированием*/
        $route = new Zend_Controller_Router_Route(
        	':lang/cachemanager/:mode',
        array(
        	'module' => 'default',
        	'controller' => 'index',
        	'action'     => 'cache-manager',
				'lang' => $lang
        	)
        );
        $router->addRoute('cache-manager-mode', $route);
        
        $route = new Zend_Controller_Router_Route(
        	':lang/cachemanager',
        	array(
               	'module' => 'default',
               	'controller' => 'index',
               	'action'     => 'cache-manager',
				'lang' => $lang
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
        
	    return $router;
	}
	
	public function setModules()
	{
	    //$modules = new Ext_Modules_Load();
    	//Zend_Registry::set('modules', $modules->getList());
	}
}

