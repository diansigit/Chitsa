jQuery(document).ready(function($) {
	
	// On-Off
	$('.input-on-off').iphoneStyle();
	
	// Toggle Group
	$('.input-on-off[toggle]').change(function(event, recursive){
		// console.log( 'on-off: ' + $(this).is(':checked'));
		if( $(this).is(':checked') ) { 
			$('.input-list.' + $(this).attr('toggle') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle')).get().reverse() ).trigger('change');
		} else {
			$('.input-list.' + $(this).attr('toggle') ).hide();	
		}
	});
	$('.input-radio[toggle]').change(function(event, recursive){
		// console.log( 'radio: ' + $(this).is(':checked') + ' ' + $(this).val());
		if( $(this).is(':checked') ) {
			$('.input-list.' + $(this).attr('toggle') ).hide();
			$('.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value') ).show();
			$( $('.input-on-off, .input-radio', '.input-list.' + $(this).attr('toggle') + '-' + $(this).attr('value')).get().reverse() ).trigger('change');
		}
	});
	// Hide Toggle Group
	$( $('.input-on-off, .input-radio').get().reverse() ).trigger('change');
	
	// Color
	$('.input-color').mColorPicker({
		imageFolder : theme_admin_assets_uri+"/images/mColorPicker/"
	});
	
	// Date
	$('.input-date').each( function(){
		var input_date = $(this);
		/*$(this).dateinput({
			trigger : true,
			format : 'dd mmmm yyyy',
			change: function() {
				
				var isoDate = parseDate(this.getValue('yyyy-mm-dd')) / 1000;
				$(input_date).siblings('.input-date-value').val(isoDate);
			},
			onHide: function(){
				if( $(input_date).val() == '' ) {
					$(input_date).siblings('.input-date-value').val('');
				}
			}
		});*/

	});
	$('.input-date').pickadate({
		format: 'yyyy-mm-dd',
	});
	
	function parseDate(input, format) {
	  format = format || 'yyyy-mm-dd'; // default format
	  var parts = input.match(/(\d+)/g), 
	      i = 0, fmt = {};
	  // extract date-part indexes from the format
	  format.replace(/(yyyy|dd|mm)/g, function(part) { fmt[part] = i++; });
	  return new Date(Date.UTC(parts[fmt['yyyy']], parts[fmt['mm']]-1, parts[fmt['dd']]));
	}
	
	// Time
	$('.input-time').timeEntry();
	$('.time-trigger').click(function(e){
		e.preventDefault();
		$('.input-time', $(this).parent('.input-field')).focus();
	});
	
	// Range
	$('.input-range').rangeinput({
		progress : false
	});
	
	// ColorBox
	$('a[rel="fancy"]').colorbox({
		rel 		: 'group',
		maxWidth	: '80%',
		maxHeight 	: '80%',
		close		: false,
		current		: false,
		opacity		: 0.75
	});
	
	// Radio Image
	$('.radio-img-list label').click(function(){
		$('.radio-img-list label', $(this).parents('.input-field') ).removeClass('active');
		$(this).addClass('active');
	});
	
	// Checkbox Image
	$('.checkbox-img-list input[type="checkbox"]').change(function(){
		$(this).is(':checked') ? $(this).siblings('label').addClass('active') : $(this).siblings('label').removeClass('active');
	});
	
	// Notification Box
	$(window).scroll(function() {
	       $('.notification-box').css('top', $(window).scrollTop() + 100);
	});
	
	// Theme Box
	$('#theme-box-tabs ul li').click(function(e){
		e.preventDefault();
		if( ! $(this).hasClass('active') ){
			$('#theme-box-tabs ul li').removeClass('active');
			$(this).addClass('active');
			$('#theme-box-content .theme-box-content-pane').removeClass('active').hide();
			$('#theme-box-content .theme-box-content-pane:eq('+$(this).index()+')').addClass('active').fadeIn();
		}
	});
	
	// Input List Odd
	$('.input-list:odd').addClass('odd');
	
	// Option Box save button
	$('#theme-options-save').click(function(){
		if (typeof(tinyMCE) != "undefined") {
		  if (tinyMCE.activeEditor == null || tinyMCE.activeEditor.isHidden() != false) {
		    tinyMCE.triggerSave();
		  }
		}
		$('.notification-box').html('<div class="ajax-load-icon"></div>saving …').stop(true, true).fadeIn();
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'save_option',
			options: $('#theme-options-form').serialize()
		};

		$.post(ajaxurl, data, function(response) {
		    if('ok' == response.result){
		    	$('.notification-box').html('<div class="ajax-okay-icon"></div>success').delay(1000).fadeOut('slow');
		    	$('#advance-theme_export_option').val(response.encodedOptions);
		    } else {
		    	$('.notification-box').html('<div class="ajax-fail-icon"></div>fail').delay(1000).fadeOut('slow');
		    }
		    if( $('#advance-theme_import_option').val() != '' ) location.reload();
		}, 'json');
	});
	
	// Type - Re-order
	$('.wp-list-table tbody').sortable({
		items : 'tr',
		handle : '.reorder-handle',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('tr.ui-state-highlight').append('<td colspan="0"></td>');
		},
		update : function(e, ui) {
			$('.ajax-load-icon', ui.item).show();
			var data = {
				action: 'theme_ajax_action',
				method: 'update_post_order',
				post_order: $(this).sortable('serialize')
			};
			$.post(ajaxurl, data, function(response) {
			   	if('ok' == response.result){
				    $('.ajax-load-icon', ui.item).hide();
				}
			}, 'json');
		}
	});
	
	//////////////// Meta 
	/*
	// Meta Add
	$(".meta-add-row-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-close-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideDown();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideDown();
	});
	$(".meta-add-row-close-bt").click(function(e){
		e.preventDefault();
		$(this).siblings('.meta-add-row-bt').show();
		$(this).hide();
		$(".meta-add-row", $(this).parents("table")).slideUp();
		$(".meta-add-row .post-meta-options", $(this).parents("table")).slideUp();
	});
	
	// Meta Edit
	$('.meta-edit-row-bt').click(function(e){
		e.preventDefault();
		$(this).toggleClass('active');
		$(this).parents(".meta-row").next(".meta-edit-row").slideToggle();
		$('.post-meta-options', $(this).parents(".meta-row").next(".meta-edit-row")).slideToggle();
	});
	
	// Meta Delete
	$('.meta-delete-row-bt').click(function(e){
		e.preventDefault();
		$(this).addClass('meta-delete-row-bt-loading');
		var current = $(this);
		var data = {
			action: 'theme_ajax_action',
			method: 'remove_meta',
			meta_tag: $(this).parents('.postbox').attr('id'),
			meta_index: $(this).parents('tr').attr('index'),
			post_id: post_id
		};
		$.post(ajaxurl, data, function(response) {
		   	if('ok' == response.result){
			    $(current).parents(".meta-row").next(".meta-edit-row").remove();
			    $(current).parents(".meta-row").remove();
			}
		}, 'json');
	});
	
	// Sortable Meta List
	$('.theme-setting-table tbody').sortable({
		items : '.sortable',
		cursor : 'move',
		axis : 'y',
		placeholder : 'ui-state-highlight',
		helper : function(e, tr)
		{
		    var $originals = tr.children();
		    var $helper = tr.clone();
		    $helper.children().each(function(index)
		    {
		      $(this).width($originals.eq(index).width())
		    });
		    return $helper;
		},
		start : function(e, ui) {
			$('.ui-state-highlight').append('<td colspan="100%"></td>');
		},
		update : function(e, ui) {
			var parent_table = $(ui.item).parents('table');
			$('.meta-edit-row', parent_table).each(function(){
				$(this).insertAfter($('.meta-row[index="' + $(this).attr('index') + '"]', parent_table));
			});
		}
	});
	*/

	
	var $trial_template 	= $('#trial_page');

	var hide_trial_template = function(){
		if ($trial_template.hasClass('option-is-show')){
			$trial_template.removeClass('option-is-show');
			$trial_template.addClass('option-is-hide');
		}
	}, 	show_trial_template = function(){
		if ($trial_template.hasClass('option-is-hide')) {
			$trial_template.removeClass('option-is-hide');
			$trial_template.addClass('option-is-show');
		}
	};	

	$('#page_template').change(function(event) {
		if ($(this).val() === "template-trial.php"){
			show_trial_template();
		} else {
			hide_trial_template();
		}
	});
	
	
});