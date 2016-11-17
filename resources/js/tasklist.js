function AddNewTask(){
	var taskinput = $('#task-message').val();

	if(taskinput.length != 0){
		$('#task-message').val('');
		var list_id = $('.tasklist').attr('data-id');
		
		var send = {
			message: taskinput,
			list_id: list_id
		};
		$.ajax({
			type: 'post',
			data: send,
			dataType:'html',
			async: true,
			url: 'ajaxRequest.php?controller=tasklist&add=true',
			success: (result) => {
				$('.tasklist-body').prepend(result);
				//console.log(result);
				GenerateClicks();
			}

		});
	}else{
		showMessage({
			title: '¡Hey!',
			body: 'No has escrito nada :/',
			class: 'error'
		});
	}
}

function GenerateClicks(){

	$('.task').on('click','.erase',function(e) {
		e.preventDefault();
		var list_id = $('.tasklist').attr('data-id');
		var task = $(this).parents('.task');

		var send = {
			id: $(this).data('id'),
			list_id : list_id
		};
		$.ajax({
			type:  'post',
			data: send,
			dataType: 'json',
			async: true,
			url: 'ajaxRequest.php?controller=tasklist&delete=true',
			success: (result) => {
				showMessage(result);
				task.slideUp(300);
			}
		});
	});
}

GenerateClicks();


