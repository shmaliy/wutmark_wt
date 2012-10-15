<?php $this->headTitle($this->root['title']); ?>
<div class="index-container">
	<div class="left">
		<h1><?php echo $this->root['title']; ?></h1>
		<div class="news-reference-items">
		<?php foreach ($this->subcats_list as $item) : ?>
			<div class="news-reference-item">
				<img class="refer-category" src="/<?php echo $item['image']; ?>" />
				<div class="text-container-refer">
					<a class="title" href="/<?php echo $this->lang;?>/<?php echo $this->root['title_alias'];?>/<?php echo $item['title_alias'];?>"><?php echo $item['title']; ?></a>
					<span>
						<?php echo $item['description']; ?>
					</span>
				</div>
				<div class="clear"></div>
			</div>
		<?php endforeach; ?>
		</div>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-reference', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>