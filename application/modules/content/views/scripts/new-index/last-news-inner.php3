<div class="items">
<?php foreach ($this->items as $item) : ?>
	<div class="item">
		<img class="thumbnail" src="/<?php echo $item['image']; ?>" />
		<div class="text">
			<a class="title" href="<?php echo $this->url(array('id' => $item['id'], 'lang' => $this->lang), 'news-item'); ?>"><?php echo $item['title']; ?></a>
			<div class="date"><?php echo date("d.m.Y", $item['created']); ?></div>
		</div>
		<div class="clear"></div>
	</div>
<?php endforeach; ?>
</div>
<div class="pages-plashka">
<?php for ($i = 1; $i <= $this->pages; $i++ ) : ?>
	<?php if ($i == $this->current) : ?>
	<div class="current"><?php echo $i; ?></div>
	<?php else : ?>
	<a href="" onclick = "return $.fn.newsManager('request', '<?php echo $this->url(array(
		"limit" => $this->limit,
		"offset" =>	$this->limit * ($i-1),
		"page" => $i,
		"first" => 'false'
	), 'ajax-last-news');?>');"><?php echo $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>
	<div class="clear"></div>
</div>