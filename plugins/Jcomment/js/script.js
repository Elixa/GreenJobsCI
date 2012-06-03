	//Caja de texto e insercion del estado
	function insertComment()
	{
		var box = document.getElementById('commentBox');
		var notifyMessage	= document.getElementById('notifyMessage');
		$('#iconLoading').css('display','block');
		var submitData = $('#formComment').serialize();
		$.ajax({
			type: "POST",
			url: "core/insertComment.php",
			data: submitData,
			dataType: "html",
			success: function(result)
			{
				$('#txtComment').val('');
				$('#iconLoading').css('display','none');
				result = eval( result );
				// alert(result);	
				if(result[0] == 'completed')
				{
					$('#commentBox').before(result[2] + '<br/>');
					$('#commentBox').fadeIn();					
				}else
				{
					notifyMessage.innerHTML 	= result[1];
				}	
			}
		});
		return false;	
	}
	