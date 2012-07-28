<?php 
	$status = array(
		'true' => 'включено',
		'false' => 'отключено'
	);
	
	$return = array(
		'success' => 'успешно',
		'error' => 'безуспешно',
	);
?>

<div class="cache-manager-container">
	<h1>Управление кешированием запросов</h1>
	
	<?php if ($this->authorized == 1) : ?>
		<div class="status">
			<span>Статус кеширования: </span>
			<?php echo $status[$this->status]; ?>
		</div>
		<ul>
			<li class="title">Действия: </li>
		<?php if ($this->status == 'false') : ?>
			<li><a href="<?php echo $this->url(array('mode' => 'on'), 'cache-manager-mode');?>">включить</a></li>
		<?php endif; ?>
		<?php if ($this->status == 'true') : ?>
			<li><a href="<?php echo $this->url(array('mode' => 'off'), 'cache-manager-mode');?>">выключить</a></li>
		<?php endif; ?>
			<li><a href="<?php echo $this->url(array('mode' => 'clear'), 'cache-manager-mode');?>">очистить</a></li>
		</ul>
		<div class="clear"></div>
		<div class="modes-returns">
		<?php if (isset($this->enable)) : ?>
			Включение кеширования запросов выполнено <?php echo $return[$this->enable]; ?>!
			<script>setTimeout(function(){window.location = '<?php echo $this->url(array(), 'cache-manager'); ?>';}, (2000));</script>
		<?php endif; ?>
		
		<?php if (isset($this->disable)) : ?>
			Отключение кеширования запросов выполнено <?php echo $return[$this->disable]; ?>!
			<script>setTimeout(function(){window.location = '<?php echo $this->url(array(), 'cache-manager'); ?>';}, (2000));</script>
		<?php endif; ?>
		
		<?php if (isset($this->clear)) : ?>
			Очистка кеша выполнена <?php echo $return[$this->clear]; ?>!
			<script>setTimeout(function(){window.location = '<?php echo $this->url(array(), 'cache-manager'); ?>';}, (2000));</script>
		<?php endif; ?>
			
		</div>
	<?php else : ?>
		<div class="auth-error">Вы не авторизованы как администратор сайта!</div> 
	<?php endif; ?>
</div>