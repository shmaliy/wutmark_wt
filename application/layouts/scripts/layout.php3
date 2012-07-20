<?php echo $this->doctype('XHTML1_TRANSITIONAL'); ?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->headTitle('Wutmarc')->setSeparator(' | '); ?>
<?php $this->headScript()->appendFile("/js/prototype/prototype.js"); ?>
<?php $this->headScript()->appendFile("/js/scriptaculous/scriptaculous.js"); ?>
<?php $this->headScript()->appendFile("/cms/js/tiny_mce/tiny_mce.js"); ?>
<?php $this->headScript()->appendFile("/js/tiny_mce_init.js"); ?>
<?php $this->headScript()->appendFile("/js/swfupload/swfupload.js"); ?>
<?php $this->headScript()->appendFile("/js/swfupload/js/swfupload.queue.js"); ?>
<?php $this->headScript()->appendFile("/js/swfupload/js/fileprogress.js"); ?>
<?php $this->headScript()->appendFile("/js/swfupload/js/handlers.js"); ?>
<?php $this->headScript()->appendFile("/js/lightbox2/js/lightbox.js"); ?>
<?php $this->headScript()->appendFile("/js/Prototype.UI.Accordion.js"); ?>
<?php $this->headLink()->appendStylesheet('/js/lightbox2/css/lightbox.css'); ?>
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
<?php echo $this->headScript(); ?>
<?php echo $this->headLink(); ?>

</head>
<body>
<div class="header">
    <div class="header_resize">
    	<a class="logo" href="/<?php echo Zend_Registry::get('lang'); ?>"></a>
    	<?php echo $this->action('langselector', 'index', 'default'); ?>
    	<?php echo $this->action('sitesselector', 'index', 'default'); ?>
    	<div class="clear"></div>
    	<?php echo $this->action('index', 'index', 'menu'); ?>
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
		<?php echo $this->action('bottom', 'index', 'menu'); ?>
		<div class="clear"></div>
		<?php echo $this->action('footercounters', 'index', 'default'); ?>
	</div>
</div>
</body>
</html>