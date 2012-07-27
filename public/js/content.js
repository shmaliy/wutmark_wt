$(document).ready(function () {   
 
    $(".pl_all_box").hover(
   	    function () {
   	    	$(this).find('.pop_up').fadeIn(200); 

        },
        function () {
        	
          $(this).find('.pop_up').fadeOut(200); 
        }
    );
    var speed = 1000;
    $(".adt_date").each(function(){
		   $(this).fadeIn(speed);
		   speed = speed + 1000;
		   
		  
		 });
   
});
