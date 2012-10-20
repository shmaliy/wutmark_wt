<ul class="generic-menu">
<?php foreach ($this->items as $item) : ?>
	<li>
		<?php if ($item['link'] == '') : ?>
			<span><?php echo $item['title']; ?></span>
		<?php else : ?>
			<a href = "<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
		<?php endif; ?>
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