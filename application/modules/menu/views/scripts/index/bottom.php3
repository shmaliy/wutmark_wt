<div class="bottomMenu">
	<?php $i = 0; ?>
	<?php foreach ($this->menu_result as $item) : ?>
		<?php if ($i > 0) : ?>
		<span>|</span>
		<?php endif; ?>
		<a href="<?php echo $item['link']?>" class="menuItem"><?php echo $item['title'];?></a>
		<?php $i++; ?>
	<?php endforeach; ?>
	<div class="clear"></div>
</div>