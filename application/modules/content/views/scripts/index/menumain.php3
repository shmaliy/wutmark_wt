<?php $this->headTitle('Меню'); ?>
<div class="staticContainer">
	<h1>Меню</h1>
	<?php $exist = array(); ?>
	<?php foreach ($this->items as $item) : ?>
		<?php if(!isset($exist[$item['category_alias']])) : ?>
		<?php $exist[$item['category_alias']] = 1;?>
		<div class="category" onmouseover="showImgBig('<?php echo $item['category_alias']; ?>');" onmouseout="hideImgBig('<?php echo $item['category_alias']; ?>');" style="background:url(<?php echo $item['category_image']; ?>) top left no-repeat;">
			<a class="categoryTitle" href="<?php echo $this->url(array("category" => $item['category_alias']), 'menucategory'); ?>"><?php echo $item['category_title']; ?></a>
			<?php if(isset($item['category_image_big'])) : ?>
				<div style="display:none;" class="imgBig" id="<?php echo $item['category_alias']; ?>"><img src="<?php echo $item['category_image_big']; ?>"></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>
	<?php endforeach; ?>
	<div class="clear"></div>
</div>
<div class="otherPagesMainMenu"><?php echo $this->action('index', 'index', 'menu');?></div>
<div class="clear"></div>

<script>
	function showImgBig(id)
	{
		$(id).show();
		return false;
	}

	function hideImgBig(id)
	{
		$(id).hide();
		return false;
	}

</script>