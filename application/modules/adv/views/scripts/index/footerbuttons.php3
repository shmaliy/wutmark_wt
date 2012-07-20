<?php foreach($this->items as $item) : ?>
<a href="<?php echo $item["url"]; ?>" target="_blank"><img src="<?php echo $item["img"]; ?>" alt="<?php echo $item["title"]; ?>" title="<?php echo $item["title"]; ?>"></a>
<?php endforeach; ?>
<div class="clear"></div>
