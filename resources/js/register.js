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
			async: true,
			url: 'core/'
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