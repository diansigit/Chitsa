// Upload
	var current_upload;
	var upload_type;
	var current_input_name;

	// File Upload
	$('.upload-file-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload File', 'media-upload.php?theme_upload=1&type=file&post_id='+post_id+'&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'file';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	// Image Upload
	$('.upload-image-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'image';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	// Images Upload
	$('.upload-images-bt').click(function() {
		if(post_id == '') post_id = '0';
		formfield = $('#upload_image').attr('name');
		tb_show('Upload Image', 'media-upload.php?theme_upload=1&post_id='+post_id+'&type=image&TB_iframe=true');

		current_upload = $(this).parents('.input-field');
		upload_type = 'images';
		current_input_name = $('.dummy-input', current_upload).attr('name');

		window.send_to_editor = newSendToEditor;

		return false;
	});

	storeSendToEditor = window.send_to_editor;
	
	newSendToEditor = function(html) {
		var fileUrl;

		if($(html)[0].tagName == 'A') {
			fileUrl = $(html).find('img').attr('src');
		} else {
			fileUrl = $(html).attr('src');
		}
		
		// Get Attachment ID
		var data = {
			action: 'theme_ajax_action',
			method: 'get_attachment_id_by_url',
			url: fileUrl
		};
		$.post(ajaxurl, data, function(response) {
		   	
			switch(upload_type) {
				case 'file' :
					$('.uploaded-file-container', current_upload).html('<div class="uploaded-file">'+fileUrl+'<a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'" /></div>');
				break;
				case 'image' :
					// Get resized image
					var data = {
						action: 'theme_ajax_action',
						method: 'get_resized_image_by_id',
						id: response.data,
						width: 80,
						height: 80
					};
					$.post(ajaxurl, data, function(get_resized_response) {
						$('.uploaded-image-container', $(current_upload)).html('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'" /></div>');
					}, 'json');
				break;
				case 'images' :
					// Get resized image
					var data = {
						action: 'theme_ajax_action',
						method: 'get_resized_image_by_id',
						id: response.data,
						width: 80,
						height: 80
					};
					$.post(ajaxurl, data, function(get_resized_response) {
						$('.uploaded-images-container', $(current_upload)).append('<div class="uploaded-image"><img  src="'+ get_resized_response.data +'" /><a class="remove" href="#">remove</a><input type="hidden" value="'+ response.data +'" name="'+ current_input_name +'[]" /></div>');
					}, 'json');

					
				break;
			}

		}, 'json');

		tb_remove();
		window.send_to_editor = storeSendToEditor;
	}

	$('.uploaded-image .remove, .uploaded-file .remove').live('click', function(e){
		e.preventDefault();
		$(this).parent().fadeOut(function(){
			$(this).remove();
		});
	});
	$('.uploaded-images-container').sortable({
		items : '.uploaded-image',
		cursor : 'move',
		placeholder : 'uploaded-image-dummy'
	});