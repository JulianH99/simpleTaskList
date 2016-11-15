function AddNewTask(){
	var taskinput = $('#task-message').val();

	if(taskinput.length != 0){
		var list_id = $('.tasklist').attr('data-id');
		
		var send = {
			message: taskinput,
			list_id: list_id
		};
		$.ajax({
			type: 'post',
			data: send,
			async: true,
			url: 'ajaxRequest.php?controller=tasklist&add=true',
			succes: (message) => {
				$('.tasklist').append(message);
			}

		})
	}else{
		showMessage({
			title: '¡Hey!',
			body: 'No has escrito nada :/',
			class: 'error'
		});
	}
}

$('.task').on('click','.erase',function() {
	alert($(this).attr('data-id'));
})