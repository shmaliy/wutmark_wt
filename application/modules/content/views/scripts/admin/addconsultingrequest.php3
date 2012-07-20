<?php $this->headTitle('Задайте питання'); ?>
<div class="apContainer">
	<div class="targetContentList">
		<h1>Задайте питання</h1>
		<div class="consultingForm">
			<?php echo $this->name_group; ?>
			<div class="clear"></div>
			<div class="formText">
				<?php echo $this->email; ?>
				<div class="comment">не відображається на сайті</div>
			</div>
			<div class="formText">
				<?php echo $this->phone; ?>
				<div class="comment">не відображається на сайті</div>
			</div>
			<div class="formSelect">
				<?php echo $this->town; ?>
			</div>
			<div class="formSelect">
				<?php echo $this->cat; ?>
			</div>
			<div class="formSelect">
				<?php echo $this->consultant; ?>
			</div>
			<div class="formTextarea">
				<?php echo $this->comment; ?>
			</div>
			<div class="formCaptcha">
				<?php echo $this->captcha; ?>
			</div>
			<div class="formSubmit">
				<?php echo $this->submit; ?>
			</div>
		</div>
	</div>
	<div class="additionActions">
		<?php 
			if(!empty($this->widgets)){
				foreach($this->widgets as $cat=>$type){
					echo $this->action($type . 'widget', 'index', 'default', array("category" => $cat));
				}
			}
		?>
	</div>
	<div class="clear"></div>
</div>
