$ = jQuery;

$(document).ready(function(){ 

	//Determine wich checkbox is checked
	$('input[type=checkbox]').on('click', function(){ 
		if($(this).prop('checked') == true)
		{
			var post_type = $(this).attr('value');
		}

		else
		{
			var post_type = '0';
		}

		$.ajax(
		{
			url : '../wp-content/plugins/expim/ajax/expim_load_data.php',

			method : 'POST',

			data : 'post_type=' + post_type,

			success : function(html)
			{
				$('#show_data').append(html);
			}
		});
		event.preventDefault();
	});
});