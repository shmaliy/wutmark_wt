<?php if (!empty($this->item) && is_array($this->item) && isset($this->item)) : ?>
<div class="latest-news-container" style="margin:0 0 20px 0;">
	<div class="title-plashka">
		<div class="title"><?php echo BOOK; ?></div>
		<div class="clear"></div>
	</div>
	<div class="content-plashka" style="text-align:center;">
		<a target="_blank" href="/contents/<?php echo strip_tags($this->item['introtext']); ?>"><img src="/<?php echo $this->item['image']; ?>"></a>
		<?php if (!empty($this->item['fulltext'])) : ?>
		<div style="margin:15px 20px 20px 20px; text-align:left;">sadad</div>
		<?php endif; ?>
	</div>
	<div class="bottom-plashka"></div>
</div>
<?php endif; ?>