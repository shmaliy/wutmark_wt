<?php $this->headTitle('Добавление новости'); ?>
<div class="leftcolumn">
	<h1>Добавить новость</h1>
	<div class="gossip_form_container" id="gossip_form_container">
		<form onsubmit="return sendData(this);" name="editForm">
			<input type="hidden" name="town" value="47">
			<input type = "hidden" name="dir" value="<?php echo session_id() . '-' . date("Y-m-d-h-i-s"); ?>">
			<div class = "label">Заголовок</div>
			<div class = "input">
				<input name="title" type="text" class="textfield_big">
				<div class="error" id="title_error"></div>
			</div>
			<div class = "clear"></div>
			
			<div class = "label">Текст</div>
			<div class = "input">
				<textarea name = "text" class="textarea_big"></textarea>
				<div class="error" id="text_error"></div>
			</div>
			<div class = "clear"></div>
			
			<div class = "photos">
				<div class="photos_title">Фотографии</div>
				<div class="photos_remark">
					Вы можете загрузить до 10 файлов. Размер одного файла не больше 1мб.<br />
					Отправка сплетни без фотографий невозможна!
				</div>
				<div id="upload_container" style="display:none;">
					<div>
						<div class="fieldset flash" id="fsUploadProgress">
				        	<span class="legend">Загрузка файлов</span>
				        </div>
				        <div id="divStatus"></div>
				        <div class="clear"></div>
				        <div class="select_photo">
				        	<span id="spanButtonPlaceHolderCnt"><span id="spanButtonPlaceHolder"></span></span>
				            <input id="btnCancel" type="button" value="Отменить" onclick="swfu.cancelQueue();" disabled="disabled" />
				        </div>
						<div id="uploaded_images" class="uploaded_images">                
				             <div class="clear"></div>
				        </div>
					</div>
				</div>
				<div id = "photos" class="uploaded_photos"></div>
				<div class="error" id="photos_error"></div>
			</div>
			<div class = "clear"></div>
			<div class="agree_input">
				<input type = "checkbox" name="agree">
			</div>
			<div class="agree_text">
				Я согласен с <a href="#">правилами размещения новостей</a> на сайте
				<div class="error" id="agree_error"></div>
			</div>
			<div class = "clear"></div>
			<div id="progress_bar" style="display:none">
				<img src="/theme/img/ajax-loader.gif">
			</div>
			<div id="form_submit">
				<input type="submit" value="" class="submit_news" id="submit_form"  style="display:none;">
			</div>
		</form>
	</div>
</div>
<div class="rightcolumn">
	<?php echo $this->action('mostpopular', 'index', 'default');?>
</div>
<div class="clear"></div>

<script>
var errorplaces = ['title_error', 'text_error', 'photos_error', 'agree_error'];
for(var i = 0; i < errorplaces.length; i++){
	$(errorplaces[i]).hide();
}

$("upload_container").show();
var swfu;
var post_params = {"PHPSESSID" : "<?php echo session_id(); ?>", "dir" : "<?php echo session_id() . '-' . date("Y-m-d-h-i-s"); ?>"};
function initSwfUpl() {
	$("divStatus").update();
	$("spanButtonPlaceHolderCnt").update(
		new Element('span', {'id':'spanButtonPlaceHolder'})
	);
	$("fsUploadProgress").update('<span class="legend">Загрузка файлов</span>');
	var settings = {
		flash_url : "/js/swfupload/swfupload.swf",
		upload_url: "<?php echo $this->url(array(), 'upload'); ?>",
		post_params: post_params,
		file_size_limit : "1 MB",
		file_types : "*.jpg;",
		file_types_description : "All Files",
		file_upload_limit : "10",
		file_queue_limit : "0",
		custom_settings : {
			progressTarget : "fsUploadProgress",
			cancelButtonId : "btnCancel"
		},
		//debug: true,

		// Button settings
		button_image_url: "/theme/img/browse.png",
		button_width: "120",
		button_height: "30",
		button_placeholder_id: "spanButtonPlaceHolder",
		button_text: '<span class="theFont">Выбрать фото</span>',
		button_text_style: ".theFont { font-size: 12; font-family: tahoma; font-weight:bold;}",
		button_text_left_padding: 8,
		button_text_top_padding: 5,
		
		// The event handler functions are defined in handlers.js
		file_queued_handler : fileQueued,
		file_queue_error_handler : fileQueueError,
		file_dialog_complete_handler : fileDialogComplete,
		upload_start_handler : uploadStart,
		upload_progress_handler : uploadProgress,
		upload_error_handler : uploadError,
		upload_success_handler : uploadSuccess,
		upload_complete_handler : uploadComplete,
		queue_complete_handler : queueComplete	// Queue plugin event
	};

	swfu = new SWFUpload(settings);
}

window.onload = initSwfUpl;

function images()
{
	new Ajax.Request('<?php echo $this->url(array('behavior' => 'show', 'dir' => session_id() . '-' . date("Y-m-d-h-i-s"), 'imgid' => 'none'), 'images'); ?>', {
		method: 'post',
		onCreate : (function(){}).bind(this),
		onComplete : (function(response){
			var json = response.responseJSON;
			initSwfUpl();
			renderImages(json['images']);
			//alert(json['images'].length);
		}).bind(this)
	});	
	return false;
}

function renderImages(img)
{
	var target = $("photos");
	target.update();
	
	if(!img){
		$("submit_form").hide();
	} else {
		$("submit_form").show();	
	}
	if(img || img.length > 0){
		if(img.length < 10){
			$("upload_container").show();
		} else {
			$("upload_container").hide();
		}
		for(var i = 0; i < img.length; i++){
			target.insert(
				new Element('div', {'class':'item'})
				.insert(
					new Element('img', {'src':img[i]['small']})
				).insert (
					new Element('div', {'class':'setmain'})
					.insert(
						new Element('input', {'type':'radio', 'name':'mainimage', 'value':i})
					).insert(
						new Element('span').insert('главное фото')
					)
				).insert(
					new Element('a', {'href':'#', 'rel':i}).observe('click', (function(event){
						event.stop();
						deleteImage(event.element().rel);
					}).bindAsEventListener()).update('удалить фото')
				)
			);
		}
		target.insert(
			new Element('div', {'class':'clear'})
		);
	}
	
}

function deleteImage(id)
{
	if(id){
		new Ajax.Request('<?php echo $this->url(array('behavior' => 'delete', 'dir' => session_id() . '-' . date("Y-m-d-h-i-s"), 'imgid' => ''), 'images'); ?>' + '/' + id, {
			method: 'post',
			onCreate : (function(){}).bind(this),
			onComplete : (function(response){
				var json = response.responseJSON;
				renderImages(json['images']);
				//alert(json['images'].length);
			}).bind(this)
		});	
		return false;
	}
}

function errors(err)
{
	for(i = 0; i < err.length; i++){
		$(err[i]['place']).update(err[i]['value']);
		$(err[i]['place']).show();
	}
}

function sendData(form, action)
{
	mceSave();
	for(var i = 0; i < errorplaces.length; i++){
		$(errorplaces[i]).update();
		$(errorplaces[i]).hide();
	}
	if(form.tagName && form.tagName.toUpperCase() == 'FORM')
	{var par = form.serialize(true);}
	else{var par = form}
	new Ajax.Request('<?php echo $this->url(array(), 'news_add');?>', {
		method: 'post',
		parameters: par,
		onCreate : (function(){
			//Здесь нужно заменить кнопку отправки на прогрессбар
			$("form_submit").hide();
			$("progress_bar").show();
			
		}).bind(this),
		onComplete : (function(response){
			var json = response.responseJSON;
			var err = json['errors'];
			if(err == 'none'){
				$("gossip_form_container").update(
					new Element('div', {'class':'add_success'}).insert('Спасибо, ваша новость добавлена. Она появится на сайте после проверки администрацией.')
				);
				(function(){window.location = '/'}).delay(2);				
			} else {
				//Здесь нужно вернуть обратно кнопку отправки
				$("form_submit").show();
				$("progress_bar").hide();
				errors(err);
			}
		}).bind(this)
	});	
	return false;	
}



</script>