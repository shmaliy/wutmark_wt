<?php $this->headTitle($this->item['title']); ?>
<div class="staticContainer">
	<h1><?php echo $this->item['title']; ?></h1>
	<div class="text"><?php echo $this->item['introtext']; ?></div>
	<?php if(!empty($this->list)) : ?>
	<div class="dynamicContainer">
		<div class="containerTitle">Подробнее о услугах</div>
		<?php foreach ($this->list as $list) : ?>
			<div class="dItemContainer">
				<?php if($list['fulltext'] != '') : ?>
					<a class="dItemTitle" href="<?php echo $this->url(array("id" => $list['id']), 'servicesitem'); ?>"><?php echo $list['title']; ?></a>
				<?php else : ?>
					<div class="dItemTitle"><?php echo $list['title']; ?></div>
				<?php endif; ?>
					<div class="dItemIntrotext"><?php echo $list['introtext']; ?></div>
			</div>
		<?php endforeach; ?>
	</div>
	<?php endif; ?>
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