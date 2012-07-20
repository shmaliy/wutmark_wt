<?php $this->headTitle($this->item['title']); ?>

<div class="staticContainer">
	<h1><?php echo $this->item['title']; ?></h1>
	<div class="info">
		<div class="router">
			<a href="/">Главная</a>
		</div>
		<div class="infoBlock">
			Добавлено <?php echo date("d", $this->item['created']); ?> <?php echo $this->help->russianMonth($this->item['created']);?> <?php echo date("Y", $this->item['created']); ?> года,
			<?php echo $this->item['hits']; ?> просмотров
		</div>
		<div class="clear"></div>
	</div>
	<div class="text"><?php echo $this->item['fulltext']; ?></div>
	<?php echo $this->action('likes', 'index', 'default');?>
	<?php echo $this->action('comments', 'index', 'default');?>
</div>
<div class="otherPagesMainMenu"><?php echo $this->action('index', 'index', 'menu');?></div>
<div class="clear"></div>

<?php 
	$params = array(
		"url" => $_SERVER['REQUEST_URI'],
		"title" => strip_tags($this->item['title']),
		"text" => strip_tags($this->item['fulltext'])
	);
	echo $this->action('capture', 'index', 'indexation', $params); 
?>