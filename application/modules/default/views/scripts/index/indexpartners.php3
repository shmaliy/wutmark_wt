<?php 
	$lang = Zend_Registry::get('lang');
	$title = array(
		"ru" => 'Наши партнеры',
		"en" => 'Partners',
		"de" => 'Partner'
	);
?>

<div class="indexPartners">
	<h2><?php echo $title[$lang]; ?></h2>
	<div class="partnersContainer">
		<img src="/contents/partners/askaynak.jpg">
		<img src="/contents/partners/esab.jpg">
		<img src="/contents/partners/helvi.jpg">
		<img src="/contents/partners/hyundai.jpg">
		<img src="/contents/partners/lincoln.jpg">
		<img src="/contents/partners/most.jpg">
		<div class="clear"></div>
	</div>
</div>