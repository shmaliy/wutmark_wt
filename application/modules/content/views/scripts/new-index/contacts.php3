<?php $this->headTitle($this->category['title']); ?>
<div class="index-container">
	<div class="left">
		<h1><?php echo $this->category['title']; ?></h1>
		<div class="contacts-container">
			<ul class="contacts-list">
				<?php foreach ($this->items as $item) : ?>
				<li>
					<img src="<?php echo $item['image']; ?>">
					<a href="#" onclick="showContact('contact_<?php echo $item['id']; ?>');"><?php echo $item['title']; ?></a>
					<div class="clear"></div>
					<span class="extend" id="contact_<?php echo $item['id']; ?>" >
						<img class="cont-image" src="<?php echo $item['image']; ?>">
						<span class="cont-title"><?php echo $item['title']; ?></span>
						<a href="#" class="close" onclick="hideContact('contact_<?php echo $item['id']; ?>');"></a>
						<div class="clear"></div>
						<span class="cont-text"><?php echo $item['introtext']; ?></span>
					</span>
				</li>
				<?php endforeach;?>
			</ul>
		</div>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('last-news', 'new-index', 'content'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>
<script>
function showContact(id)
{
	$('.contacts-list > li > .extend').css('display', 'none');
		
	$('#'+id).css('display', 'block');
}

function hideContact(id)
{
	$('#'+id).css('display', 'none');
}

</script>