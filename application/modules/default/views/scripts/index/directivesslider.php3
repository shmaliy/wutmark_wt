<?php 
	$lang = Zend_Registry::get('lang');
	if (Zend_Registry::isRegistered('interface')) {
		$interface = Zend_Registry::get('interface'); 
	}
?>
<?php if (!empty($this->directives)): ?>
<div class="directivesSlider">
	<?php $i = 0; ?>
	<dl id="directivesSlider">
	<?php foreach ($this->directives as $item): ?>
	<?php
		$iOffset = 0;
		switch ($lang) {
			case 'en':
				$iOffset = 1;
				break;
			case 'de':
				$iOffset = 2;
				break;
		}
	?>
		<dt>
			<div class="border-padding">
				<?php
					$images = explode('|', trim($item['images'], '|'));
					if (count($images) == 1) {
						$iOffset = 0;
					}
				?>
				<div class="background" style="background-image: url('<?php echo $images[$iOffset]; ?>');"></div>
			</div>
		</dt>
		<?php $class = ($i == 0) ? 'class="active"' : "";?>
		<dd <?php echo $class; ?>>
			<div class="fix-width">
				<div class="direction-image" style="background-image: url('<?php echo $item['image']; ?>');">
					<div class="directions_fade">
						<?php echo ($i == 0) ? $item ['description'] : $item['introtext']; ?>
					</div>
				</div>
			</div>
		</dd>
	<?php $i++; ?>
	<?php endforeach; ?>
	</dl>
</div>
<script>
	new Prototype.UI.Accordion("directivesSlider");
</script>
<?php endif; ?>
