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
			
		<?php if(isset($this->subcats_list) && !empty($this->subcats_list)) : ?>
		<div class="subcategories-container">
			<div class="plashka-top">
				<span><?php echo SUBCATEGORIES; ?></span>
			</div>
			<div class="subcategories">
				<ul class="subcategories-list">
				<?php foreach ($this->subcats_list as $cat) :?>
					<li>
						<a href="/<?php echo $this->lang; ?>/<?php echo $this->root['title_alias'];?>/<?php echo $this->category['title_alias'];?>/<?php echo $cat['title_alias'];?>">
							<span><?php echo $cat['title']; ?></span>
						</a>
					</li>
				<?php endforeach; ?>	
				</ul>
			</div>
			<div class="plashka-bottom"></div>
		</div>
		<?php endif; ?>
		
		<?php if(isset($this->goods) && !empty($this->goods)) : ?>
		<div class="goods-container">
			<div class="goods-header">
				<span><?php echo GOODS; ?></span>
			</div>
			<table cellpadding="0" cellspacing="0" class="goods">
				<?php $i = 0; ?>
				<tr>
				<?php foreach ($this->goods as $good) : ?>
					<td class="separator"></td>
					<td>
						<div class="good">
						<?php if (is_file('contents/production/' . $good['file'])) : ?>
							<a target="_blank" href="/contents/production/<?php echo $good['file']; ?>"><span><?php echo $good['title']?></span></a>
						<?php else: ?>
							<span><?php echo $good['title']?></span>
						<?php endif; ?>
						</div>
					</td>
					
					<?php $i++; ?>
					<?php if ($i == 2) : ?>
					<?php $i = 0; ?>
					</tr><tr>
					<?php endif; ?>
				
				<?php endforeach; ?>
				</tr>
			</table>
		</div> 
		<?php endif; ?>
	</div>
	<div class="right">
		<div id="last-news-container">
			<?php echo $this->action('download-book', 'index', 'default', array('book' => 'info-book')); ?>
		</div>
	</div>
	<div class="clear"></div>
	<div class="full-width">
		<?php /*echo $this->action('index-categories-widget', 'index', 'production', array(
			'alias' => 'production'
		));*/ ?>
	</div>
	
</div>
