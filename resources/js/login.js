$('#logbutton').on('click', function(){
	var l_user = $('#user').val();
	var l_pass = $('#pass').val();

	if(l_user.length != 0 && l_pass.length != 0){

		var send = {
			user: l_user,
			pass: l_pass
		};

		$.ajax({
			type: 'post',
			data: send,
			dataType:'json',
			async: true,
			url:'ajaxRequest.php?controller=login&login=true',
			success: (result) => {
				showMessage(result);
				console.log(result);
			}
		});
	}
	else{
		showMessage({
			title: 'Ups!',
			body:'Al parecer no has escrito lo suficiente',
			class:'error'
		});
	}

})