/*
    
    
    var file_frame; 
	var div_id;
    jQuery('.upload_image_button').live( "click", function(e) {
		
		div_id = this.id;
 
     //event.preventDefault();
 
// If the media frame already exists, reopen it.
if ( file_frame ) {
file_frame.open();
return;
}
 
// Create the media frame.
file_frame = wp.media.frames.file_frame = wp.media({
title: jQuery( this ).data( 'uploader_title' ),
button: {
text: jQuery( this ).data( 'uploader_button_text' ),
},
multiple: false // Set to true to allow multiple files to be selected
});
 
// When an image is selected, run a callback.
file_frame.on( 'select', function() {
// We set multiple to false so only get one image from the uploader
attachment = file_frame.state().get('selection').first().toJSON();


  jQuery('#attachment_urls').val('<img src="'+attachment.url+'" alt="" style="max-width:182px; max-height:182px;" />');
  jQuery('#attachment_ids_'+div_id).val(attachment.id);
  
  //jQuery('#featuredImage').append('<img src='+attachment.url+' />')
  //image show in div
 // alert(div_id);
  jQuery('<img />').attr({src:attachment.url}).appendTo(jQuery('#featuredImage_'+div_id));
  //jQuery('.remove').show();
  jQuery('#'+div_id).hide();
  jQuery('.AdNote').hide();
  jQuery('<a class="remove" id="remove_'+div_id+'" title="" href="javascript:void(0);">X</a>').appendTo(jQuery('#featuredImage_'+div_id));
  
 
// Do something with attachment.id and/or attachment.url here
});
 
// Finally, open the modal
file_frame.open();
    });
	
    jQuery( ".remove" ).live( "click", function() {
		var ids = this.id;
		ids = ids.split('_');
  jQuery('#'+ids[1]).show();
  jQuery('#remove_'+ids[1]).hide();

  jQuery('#attachment_ids_'+ids[1]).val('');
  jQuery('#featuredImage_'+ids[1]).html('');
});
   */