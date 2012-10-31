<?php 
	$lang = Zend_Registry::get('lang');
	if (Zend_Registry::isRegistered('interface')) {
		$interface = Zend_Registry::get('interface'); 
	}
?>
<div class="languageSelect">
	<div class="container">
		<div class="title">
			<?php echo $interface["CHOOSE_LANG"][$lang]; ?>
		</div>
		<?php 
			$path = parse_url($_SERVER['REQUEST_URI']);
			$path = $path['path'];
			$path = explode('/', trim($path, '/'));
			if(empty($path[0])){
				$enLink = '/en';
				$deLink = '/de';
				$ruLink = '/ru';
			} else {
				unset($path[0]);
				$enLink = '/en/' . implode('/', $path);
				$deLink = '/de/' . implode('/', $path);
				$ruLink = '/ru/' . implode('/', $path);
			}
		?>		
		<ul class="flags">
			<li><a href="<?php echo $deLink; ?>" class="langDE <?php if($lang == 'de') { echo 'active'; }?>"></a></li>
			<li><a href="<?php echo $enLink; ?>" class="langEN <?php if($lang == 'en') { echo 'active'; }?>"></a></li>
			<li><a href="<?php echo $ruLink; ?>" class="langRU <?php if($lang == 'ru') { echo 'active'; }?>"></a></li>
		</ul>
	</div>
</div>
