$('#regbutton').on('click', function(){

	var r_user = $('#r_user').val();
	var r_pass = $('#r_pass').val();

	if(r_user.length != 0 && r_pass.length != 0){
		
		var send ={
			user : r_user,
			pass : r_pass
		};

		$.ajax({
			type: 'post',
			data: send,
			dataType: "json",
			async: true,
			url: 'ajaxRequest.php?controller=login&add=true',
			success: (result) => {
				showMessage(result);
				//console.log(result);
			}
		});
	}
	else{
		showMessage({
			title :' Ups!',
			body: 'Al parecer no has escrito lo necesario',
			class: 'error'
		});
	}
});