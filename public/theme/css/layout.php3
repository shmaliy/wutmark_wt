<?php echo $this->doctype('XHTML1_TRANSITIONAL'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script>
	var lang = '<?php echo Zend_Registry::get('lang'); ?>';
</script>
<?php $this->headTitle('Wutmarc')->setSeparator(' | '); ?>

<?php $this->headLink()->appendStylesheet('/theme/css/style.css')
					   ->appendStylesheet('/theme/css/swf.css')
					   ->headLink(array('rel' => 'favicon', 'href' => '/favicon.png'), 'PREPEND'); ?>
<?
	$this->headMeta()->appendName('keywords', '')
                     ->appendName('description', '')
                     ->appendName('robots', 'index, follow')
                     ->appendName('revisit', 'after 1 days')
					 ->appendHttpEquiv('Content-Type', 'text/html; charset=utf-8')
                     ->appendName('document-state', 'dynamic');					 					 					 		
?>
<?php echo $this->headMeta();?>
<?php echo $this->headTitle(); ?>
<?php echo $this->headLink(); ?>

<?php
	$this->headScript()->appendFile('/js/jquery/jquery-1.7.2.min.js');
	$this->headScript()->appendFile('/js/jquery/jquery-ui-1.8.20.custom/jquery-ui-1.8.20.custom.min.js');
	$this->headScript()->appendFile('/js/jquery/jquery.jqGrid-4.3.3/i18n/grid.locale-ru.js');
	$this->headScript()->appendFile('/js/jquery/jquery.swfupload/swfupload.js');
	$this->headScript()->appendFile('/js/jquery/jquery.swfupload.js');
	$this->headScript()->appendFile('/js/project_frontend.js');
	$this->headScript()->appendFile('/js/script.js');
	$this->headScript()->appendFile('/js/index.js');
	$this->headScript()->appendFile('/js/content.js');
	echo $this->headScript();
?>

</head>
<body>
<div class="header">
    <div class="header_resize">
    	<a class="logo" href="/<?php echo Zend_Registry::get('lang'); ?>"></a>
    	<?php echo $this->action('langselector', 'index', 'default'); ?>
    	<?php echo $this->action('sitesselector', 'index', 'default'); ?>
    	<div class="clear"></div>
    	<?php echo $this->action('top-menu', 'index', 'menu', array('rootAlias' => 'mainmenu')); ?>
    </div>
</div>
<div class="body">
	<div class="push1"></div>
	<?php echo $this->layout()->content;?>
    <div class="push2"></div>    
</div>
<div class="footer">
	<div class="footer_resize">
		<?php echo $this->action('footertext', 'index', 'default'); ?>
		<?php echo $this->action('bottom-menu', 'index', 'menu', array('rootAlias' => 'mainmenu')); ?>
		<div class="clear"></div>
		<?php echo $this->action('footercounters', 'index', 'default'); ?>
	</div>
</div>
</body>
</html>