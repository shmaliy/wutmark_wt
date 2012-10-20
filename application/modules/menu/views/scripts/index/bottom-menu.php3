<div class="bottomMenu">
	<ul>
	<?php $i = 0; ?>
	<?php foreach ($this->items as $item) : ?>
		<?php if ($item['link'] != '') : ?>
			<?php if ($i == 0) : ?>
			<li>
			<?php else : ?>
			<li class="other">
			<?php endif; ?>
				<a href = "<?php echo $item['link']; ?>"><?php echo $item['title']; ?></a>
			</li>
				
			<?php $i ++; ?>
		<?php endif; ?>	
	<?php endforeach; ?>
	</ul>
</div>