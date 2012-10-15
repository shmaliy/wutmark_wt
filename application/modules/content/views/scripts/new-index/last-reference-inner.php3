<div class="items">
<?php foreach ($this->items as $item) : ?>
	<div class="item">
		<div class="text-refer">
			<a class="title" href="<?php echo $this->url(array('id' => $item['id'], 'lang' => $this->lang, 'cat' => 'view'), 'reference-item'); ?>"><?php echo $item['title']; ?></a>
			<div class="date"><?php echo $item['introtext']; ?></div>
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
	<a href="" onclick = "return $.fn.refManager('request', '<?php echo $this->url(array(
		"limit" => $this->limit,
		"offset" =>	$this->limit * ($i-1),
		"page" => $i,
		"first" => 'false'
	), 'ajax-last-ref');?>');"><?php echo $i; ?></a>
	<?php endif; ?>
<?php endfor; ?>
	<div class="clear"></div>
</div>