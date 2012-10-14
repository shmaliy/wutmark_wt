<?php $this->headTitle($this->title); ?>
<div class="index-container">
	<div class="left">
		<h1><?php echo $this->title; ?></h1>
		<div class="news-reference-items">
		<?php foreach ($this->front as $item) : ?>
			<div class="news-reference-item">
				<img src="/<?php echo $item['image']; ?>" />
				<div class="text-container">
					<a class="title" href="<?php echo $this->url(array('id' => $item['id']), 'areas-of-use-item'); ?>"><?php echo $item['title']; ?></a>
					<div class="date"><?php echo POSTED_ON; ?> <?php echo date("d.m.Y", $item['created']); ?></div>
					<div class="introtext"><?php echo $item['introtext']; ?></div>
				</div>
				<div class="clear"></div>
			</div>
		<?php endforeach; ?>
		</div>
		<?php if ($this->pagecount != 1) : ?>
		<div class="left-pagination">
			<div class="title"><?php echo PAGES; ?></div>
			<div class="pages">
				<?php for ($i=1; $i <= $this->pagecount; $i++) : ?>
					<?php if ($i == $this->page) : ?>
					<div class="current"><?php echo $i;?></div>
					<?php else : ?>
					<a href="<?php echo $this->url(array(), 'areas-of-use-index'); ?>?page=<?php echo $i; ?>"><?php echo $i;?></a>
					<?php endif; ?>
				<?php endfor; ?>
				<div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>
		<?php endif; ?>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>