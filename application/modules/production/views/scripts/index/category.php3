<?php 
	if (isset($this->sub_cat) && !empty($this->sub_cat)) {
		$this->headTitle($this->sub_cat['title']);
	}
	
	if (isset($this->category) && !empty($this->category)) {
		$this->headTitle($this->category['title']);
	}
	
	if (isset($this->root) && !empty($this->root)) {
		$this->headTitle($this->root['title']);
	}
?>


<div class="index-container">
	<div class="left">
		<h1><?php 
				if (isset($this->category) && !empty($this->category)) {
					echo $this->category['title'];
				}
				
				if (isset($this->sub_cat) && !empty($this->sub_cat)) {
					echo ' / ' . $this->sub_cat['title'];
				}
			?></h1>
		
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
