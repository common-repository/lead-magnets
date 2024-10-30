//Lead Magnets show subscribe form 
function showLeadMagnets(){
	var optInLink = jQuery('.lead-magnet');
	var overlay = jQuery('#zoom');
	var showForm = jQuery('.via-shortcode');



optInLink.each(function() {
showForm.clone().appendTo(overlay);
jQuery(this).on("click", function(){
		overlay.addClass( "lead-magnet-overlay" );
	
	overlay.velocity({opacity: [1, 0]},{ display: "block", duration: 600, delay:0});
  });	
});	


  if( !overlay.hasClass("lead-magnet-overlay") ) {
	overlay.velocity({opacity: [0, 1]},{ display: "none", duration: 600, delay:0});
  }
  
  if( overlay.hasClass("lead-magnet-overlay") ) { 
	overlay.velocity({opacity: [1, 0]},{ display: "block", duration: 600, delay:0});
  }

jQuery('#zoom').on("click",".close-overlay", function(){ 
var overlay_form = jQuery(this).find('.via-shortcode');
	 if(jQuery(this).parents('#zoom').hasClass('lead-magnet-overlay')) {
		jQuery(this).parents('#zoom').removeClass('lead-magnet-overlay');
	    jQuery(this).parents('#zoom').velocity({opacity: [0, 1]},{ display: "none", duration: 600, delay:0}); 
		overlay_form.remove();
	 } 
}); 
jQuery('.shortcode_wysija').submit(function(){
var overlay_form = jQuery('#zoom').find('.via-shortcode');
	if(jQuery(this).parents('#zoom').hasClass('lead-magnet-overlay')) {
	   jQuery('.lead-magnet-title h3, .lead-magnet-subtitle, .lead-magnet-spam-statement').remove();
	   jQuery('.close-overlay').text("Close");
		overlay_form.remove();
	 } 
});
};
 //showLeadMagnets
 jQuery(document).ready(function () {
    showLeadMagnets();
});
jQuery(document).ajaxComplete(function () {
    showLeadMagnets();
});
