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
});

