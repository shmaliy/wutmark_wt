<?php $this->headTitle($this->item['title']); ?>
<div class="staticContainer">
	<h1><?php echo $this->item['title']; ?></h1>
	<div class="router">
		<a href="/">Главная</a> //
		<a href="<?php echo $this->url(array(), 'services');?>">Услуги</a>
	</div>
	<div class="text"><?php echo $this->item['fulltext']; ?></div>
</div>
<div class="otherPagesMainMenu"><?php echo $this->action('index', 'index', 'menu');?></div>
<div class="clear"></div>
<?php 
	$params = array(
		"url" => $_SERVER['REQUEST_URI'],
		"title" => strip_tags($this->item['title']),
		"text" => strip_tags($this->item['introtext'])
	);
	echo $this->action('capture', 'index', 'indexation', $params); 
?>