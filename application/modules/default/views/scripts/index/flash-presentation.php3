<?php if (!empty($this->items)) : ?>
<div id='coin-slider'>
	<?php foreach ($this->items as $item) : ?>
	<a href="#">
		<img src = "<?php echo $item['image']; ?>">
		<span>
			<?php echo $item['title']; ?>
		</span>
	</a>
	<?php endforeach; ?>
</div>
<?php endif; ?>
<div class="clear"></div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#coin-slider').coinslider({ 
			width: 1000, 
			height: 200,
			spw: 1,
			sph: 1,
			effect: 'rain',
			opacity: 1,
			links : true,
			navigation: true, delay: 5000 });
	});
</script>