<?php if (!empty($this->menu_result) && is_array($this->menu_result)): ?>
<div class="mainMenu">
	<?php foreach ($this->menu_result as $item) : ?>
		<a href="<?php echo $item['link']?>" class="menuItem"><?php echo $item['title'];?></a>
	<?php endforeach; ?>
	<div class="clear"></div>
</div>
<?php endif; ?>