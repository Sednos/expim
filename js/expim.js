$ = jQuery;

$(document).ready(function(){ 

	//Determine wich checkbox is checked
	$('.expim_sednos input[type=checkbox]').on('change', function(){ 
		if($(this).attr('data-value') == "0")
		{
			var post_type = $(this).attr('value');
			$(this).attr('data-value', '1');
		}

		else
		{
			var post_type = '0';
			$(this).attr('data-value', '0');
		}	
		
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

	$('#expim_export').on('click', function(){


		var post_types = [];
		$('.expim_sednos input[type=checkbox]:checked').each(function(){
			
			//post_types.push($(this).val());
			document.location.href="../wp-content/plugins/expim/ajax/expim_export.php?post_type="+ $(this).val();
		})
			/*console.log(post_types);
			$.ajax(
			{
				url : '../wp-content/plugins/expim/ajax/expim_export.php',
				method : 'POST',
				data : {
					"post_types" : post_types
				}
			}).done(function(data){
				console.log(data);
				console.log("coucou");

			});*/
	})
});