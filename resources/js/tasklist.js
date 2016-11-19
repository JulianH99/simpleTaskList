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
				task.slideUp(300,function() {
					task.remove();
				});

			}
		});
	});

	$('.task').on('click', '.mark-done', function(e){

		var chk = $(this);
		var task = chk.parents('.task-footer').siblings('.task-body');
		var dataid =  chk.data('id');
		var list_id = $('.tasklist').data('id');

		$.ajax({
			type:'post',
			data: {
				taskid: dataid,
				listid: list_id
			},
			async: true,
			url: 'ajaxRequest.php?controller=tasklist&mark=true',
			success: (result) => {
				console.log(result);
				task.toggleClass('done');
			}
		});


		
	});
}

$('#erase-all').on('click', function(){
	var listid = $('.tasklist').data('id');
	var tasks = $('.tasklist-body').children('.task');
	var ids= [];
	for (var i = tasks.length - 1; i >= 0; i--) {
		ids.push($(tasks[i]).data('id'));
	}

	if(tasks != null && ids.length > 0){

		$.ajax({
			type:'post',
			data: {
				ids: ids,
				listid : listid
			},
			async: true,
			url: 'ajaxRequest.php?controller=tasklist&deleteall=true',
			success: (result) =>{
				console.log(result);
				tasks.map(function(index, elem) {
					$(elem).slideUp(300, function(){
						$(elem).remove();
					});
				});
			}
		});
	}

});

GenerateClicks();


