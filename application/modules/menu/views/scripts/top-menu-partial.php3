<?php if ($this->iteration == 0) : ?>
<ul class="generic-menu">
<?php else : ?>
<ul>
<?php endif; ?>

<?php foreach ($this->items as $item) : ?>
	<li>
		<a href = "<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
		<?php if (!empty($item['childs'])) {
				echo $this->partial('top-menu-partial.php3', 'menu', array(
					"items" => $item['childs'],
					"iteration" => 1
				)); 
			}
		?>	
	</li>
<?php endforeach; ?>
</ul>
<div class="clear"></div>