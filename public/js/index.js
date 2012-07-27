$(document).ready(function () {   
var text = $(".input").val();
   $(".main_down").hover(
   	    function () {
   	    	var block = $(this);
			var	main = block.find('.list_main');
            //показать подменю
            main.animate({
     		  marginTop: '0%',
     		  opacity: '1',
     		  }, 0 );

        },
        function () {
        	var block = $(this);
			var	main = block.find('.list_main');
            //скрыть подменю
            main.animate({
     		 marginTop: '-100%',
     		 opacity: '0',
     		 }, 0 );
        }
    );  
    $(".language").hover(
   	    function () {
   	    	 $(".lang_dop").fadeIn(200); 

        },
        function () {
        	
            $(".lang_dop").fadeOut(200); 
        }
    );  
    $(".lang").click(function () {
       	   var attr_langs = $(this).attr('ele');
       	   
       	var langs = $(this).text();
       	$('.lang_img').attr({
          src: "/theme/img/front/"+attr_langs+".jpg",
        });
       	$('.dashed').text(langs);
       	var url = document.location.href;
       
       	var url_new = url.split("/");
       	url_new[3] = attr_langs;

       	document.location.href = url_new.join('/'); 
            }); 
    $(".input").focus(function(){
    	$(this).val('');
    }).blur(function(){
    	if($(this).val() == ''){
    	$(this).val(text);
    }
    })
    $(".pl_all_box").hover(
   	    function () {
   	    	$(this).find('.pop_up').fadeIn(200); 

        },
        function () {
        	
          $(this).find('.pop_up').fadeOut(200); 
        }
    );  
    $(".cat_anons").live("click",function(){
    	var ans_id = $(this).attr('ans_id');
    	$.ajax({
    		   type: "POST",
    		   url: "/default/index/front-announcements",
    		   data: {"ans_id": ans_id},
    		   success: function(content){
    			   var html = '';
    			   for ( var i = 0; i < content.contents.length; i++) {
    			  html += '<div class="pl_item_box box_ans" style = "display: none;">';
    				  html += '<div class="pl_item_title">'+content.contents[i].date_created+'</div>';
    				  html += '<div>'+content.contents[i].tizer+'</div>';
    				  html += '</div>';
    			   }
    			   $('.ans_block').html(html);
    			   var speed = 1000;
    			  
				   $(".box_ans").each(function(){
					   $(this).fadeIn(speed);
					   speed = speed + 1000;
					   
					  
					 });
    			  
    		   }    		   
    		 });
    	

    });
    $(".cat_news").live("click",function(){
    	var news_id = $(this).attr('news_id');
    	$.ajax({
    		   type: "POST",
    		   url: "/default/index/front-news",
    		   data: {"news_id": news_id},
    		   success: function(content){
    			   var html = '';
    			   for ( var i = 0; i < content.contents.length; i++) {
    			  html += '<div class="pl_item_box box_news" style = "display: none;">';
    				  html += '<div class="pl_item_title">'+content.contents[i].date_created+'</div>';
    				  html += '<div>'+content.contents[i].tizer+'</div>';
    				  html += '</div>';
    			   }
    			   $('.news_block').html(html);
    			   var speed = 1000;
     			  
				   $(".box_news").each(function(){
					   $(this).fadeIn(speed);
					   speed = speed + 1000;
					   
					  
					 });
    			  
    		   }
    		 });
    });
    $('.lang').each(function() {
    	var urls = document.location.href;
        
       	var urls_new = urls.split("/");
       	var znach = $(this).attr('ele');
       	if (znach == urls_new[3]){
       		
       		var langs_base = $(this).text();
           	$('.lang_img').attr({
              src: "/theme/img/front/"+znach+".jpg",
            });
           	$('.dashed').text(langs_base);
       	}
       	
    });
});
  function load(){
  	var url = window.location.href;
  	var index = window.location.protocol+'//'+window.location.hostname+'/';
  	if (url == index){
  	 $('.load').fadeIn(3000);
  	 $('.content_show').show();
  	}else{
  	 $('.load').show();
  	 $('.content_show').fadeIn(3000);}
  }
 
 