$ = jQuery;

$(document).ready(function(){ 

	//Determine wich checkbox is checked
	$('.expim_sednos input[type=checkbox]').on('change', function(){ 
		if($(this).attr('value') == "0")
		{
			var post_type = $(this).attr('data-value');
			$(this).attr('value', '1');
		}

		else
		{
			$('#'+post_type).remove();
			var post_type = '0';
			$(this).attr('value', '0');
		}

		// var checked_boxes = [];

		// $('.expim_sednos input[type=checkbox]:checked').each(function(){
		// 	var post_type = checked_boxes.push($(this).attr('value'));

		// 	alert(post_type);
		// });		
		
		$.ajax(
		{
			url : '../wp-content/plugins/expim/ajax/expim_load_data.php',

			method : 'POST',

			data : 'post_type=' + post_type,

			success : function(html)
			{
				if(post_type != "0")
				{
					$('#show_data').append(html);
				}

				else
				{
					$('#'+post_type).remove();
				}
				
			}
		});
		event.preventDefault();
	});
});