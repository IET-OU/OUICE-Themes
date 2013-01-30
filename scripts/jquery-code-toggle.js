(function ($) {
  // Original JavaScript code.
/* 
Steven Price
Mar 2011
Load code content into page
*/
$(document).ready(function(){	
  // hide code highlight
  $('.code').hide(); 
  $("p.ou-get-code a").click(function(event) {   
     // Prevent default click action if javascript is enabled
     event.preventDefault();  
	 // if code section is hidden
	 if($(this).parent().next().is(':hidden')) {
	 // show code section
	 $(this).parent().next().show();
	 // load code from .txt
     $(this).parent().next().load($(this).attr("href"), function() {	 
	   // ensure that HTML characters are shown not rendered	 
	   var htmlStr = $(this).html();        
	   $(this).text(htmlStr);	   		     
     })  
	 // otherwise just hide code section
	 } else {
	   $(this).parent().next().hide(); 		   
	}	
	// switch label depending on whether code section is shown or hidden
	if($(this).text() == "Show markup") {
		$(this).text("Hide markup");		
	} else {
		$(this).text("Show markup")
	}	
  })    
});
})(jQuery);
