<?php $this->headTitle($this->items[0]['category_title']); ?>
<?php $this->headTitle('Меню'); ?>
<div class="staticContainer">
	<h1><a href="<?php echo $this->url(array(), 'menumain'); ?>">Меню</a> // <?php echo $this->items[0]['category_title']; ?></h1>
	<div class="groupsContainer">
	<?php $exist = array(); ?>
	<?php foreach($this->items as $item) : ?>
		<?php if(!isset($exist[$item['group_alias']])) : ?>
			<?php $exist[$item['group_alias']] = 1;?>
			<?php 
				$display_cols = array();
				foreach($this->items as $col){
					if($col['group_alias'] == $item['group_alias']){
						foreach($this->columns as $key=>$title){
							if(!empty($col[$key])){
								$display_cols[$key] = $title;
							}
						}
					}
				}
			?>
			<div class="groupContainer">
				<a href="#" onclick="menuSelector('<?php echo $item['group_alias']; ?>');" class="groupTitle"><?php echo $item['group_title']; ?></a>
				<div class="tabs" id = "<?php echo $item['group_alias']; ?>_tabs" style="display:none;">
					<?php foreach($display_cols as $colTitle) : ?>
						<div class="tab"><?php echo $colTitle; ?></div>	
					<?php endforeach;?>	
				</div>
			</div>
			<div class="foods" id = "<?php echo $item['group_alias']; ?>" style="display:none;">
				<div>
				<?php foreach($this->items as $food) : ?>
				<?php if($food['group_alias'] == $item['group_alias']) : ?>
				<div class="food">
					<div class="foodText">
						<div class="foodTitle"><?php echo $food['food_title']; ?></div>
						<?php if(!empty($food['food_description'])) : ?>
						<div class="foodDescription"><?php echo $food['food_description']; ?></div>
						<?php endif; ?>
					</div>
					<div class="foodTabs">
						<?php foreach($display_cols as $colAlias=>$colTitle) : ?>
							<div class="foodTab"><?php echo $food[$colAlias]; ?></div>
						<?php endforeach; ?>
						<div class="clear"></div>
					</div>
					<div class="clear"></div>
				</div>
				<?php endif; ?>
				<?php endforeach; ?>
				</div>
			</div>
			<?php //$this->help->arrayTrans($display_cols); ?>
		<?php endif; ?>
	<?php endforeach; ?>
	</div>
</div>
<div class="otherPagesMainMenu"><?php echo $this->action('index', 'index', 'menu');?></div>
<div class="clear"></div>

<script>

var groups = <?php echo $this->groups; ?>

function menuSelector(id)
{
	for (var i = 0; i < groups.length; i++) {
		if (id && id == groups[i]) {
			var tab = id + '_tabs';
			$(tab).appear();
			Effect.SlideDown(id, { duration: 0.6, fps: 30 });
			//$(id).slideDown();
		} else {
			var tabs = groups[i] + '_tabs';
			$(tabs).fade();
			$(groups[i]).hide();
		}
	}
	return false;
}

menuSelector();

</script>