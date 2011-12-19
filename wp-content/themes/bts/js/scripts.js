/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$(function(){
  console.log($(window).height());
  var footerHeight = $('footer').height();
  var primHeight = $(document.body).height()+footerHeight;
  var winHeight = $(window).height()
  if(primHeight < winHeight){
      $('footer').css({'position':'fixed', 'bottom':'0'})
  }
  //var caches the default value which is assigned in 
	//the html with the attr(value) for the input
	var searchDefault = $('#search').val();
	var emailDefault = $('.input_cc').val();
        
	//when the cursor is in the input clear the default value
	$('#search').focus(function() {
		if($('#search').val() == searchDefault){
			
			$(this).val("");
			
		}
	 
	});  
	//when the cursor exits the input restore the default
	$('#search').blur(function() { 
				 
		if($(this).val() == ""){
			
			$(this).val(searchDefault);	
			
		}
				
	});
        $('.input_cc').focus(function() {
		if($('.input_cc').val() == emailDefault){
			
			$(this).val("");
			
		}
	 
	});  
	//when the cursor exits the input restore the default
	$('.input_cc').blur(function() { 
				 
		if($(this).val() == ""){
			
			$(this).val(emailDefault);	
			
		}
				
	});
        $(".slidetabs").tabs(".images > div", {

	// enable "cross-fading" effect
	effect: 'fade',
	fadeOutSpeed: "slow",

	// start from the beginning after the last tab
	rotate: true

        // use the slideshow plugin. It accepts its own configuration
        }).slideshow();
});

