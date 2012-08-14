<ul>
<?php foreach ($this->items as $item) : ?>
	<li id="<?php echo $item['id']; ?>">
		<a href="<?php echo $this->root . '/' . $item['title_alias']; ?>"><?php echo $item['title'];?></a>
		<?php if (!empty($item['childs'])) : ?>
			<?php $root = $this->root . '/' . $item['title_alias']; ?>
			<?php echo $this->partial('index-categories-widget-partial.php3', 'production', array(
				'items' => $item['childs'],
				'root' => $root
			)); ?>	
		<?php endif; ?>	
	</li>
<?php endforeach; ?>
</ul>