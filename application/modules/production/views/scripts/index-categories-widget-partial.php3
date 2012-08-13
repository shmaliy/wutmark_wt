<?php if (isset($this->class)) : ?>
	<ul class="<?php echo $this->class; ?>">
<?php else : ?>
	<ul>
<?php endif; ?>
<?php foreach ($this->items as $item) : ?>
	<?php if (isset($this->class)) :  ?>
	<li id="<?php echo $item['id']; ?>" class="<?php echo $this->class; ?>-child">
	<?php else : ?>
	<li id="<?php echo $item['id']; ?>">
	<?php endif; ?>
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