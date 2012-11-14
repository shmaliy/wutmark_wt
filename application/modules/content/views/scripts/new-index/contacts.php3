<?php $this->headTitle($this->category['title']); ?>
<div class="index-container">
	<div class="left">
		<h1><?php echo $this->category['title']; ?></h1>
		<div id="accordion"  class="accordion">
		    <?php foreach ($this->items as $item) : ?>
		    <h3 style="background: url('<?php echo $item['image']; ?>') no-repeat 5px center;">
		    	<span style="display:block; margin:0 0 0 15px;"><?php echo $item['title']; ?></span>
		    </h3>
		    <div>
		        <p style="margin:0 0 0 15px;">
		        	<?php echo $item['introtext']; ?>
		        </p>
		    </div>
		    <?php endforeach;?>
		</div>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('support', 'index', 'default'); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>