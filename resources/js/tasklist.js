

function AddNewTask(){
	var taskinput = $('#task-message').val();

	if($('#task-message').is(':focus')){
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

	var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);
	if (isMobile) {
  		$('.tasklist').on('doubleTap','.task', function(){
  			$(this).trigger('dblclick');
  		});
	}

	$('.tasklist').on('dblclick', '.task', function(){
		var task = $(this);
		var span = task.children('.task-body').children('span');
		var message = span.text();
		var newMessage;
		var id = task.data('id');

		var txt = $(document.createElement('input'));
		txt.attr('type', 'text');
		txt.attr('id', id);
		txt.addClass('task-input');
		txt.css('width', '100%');
		txt.val(message);

		span.html(txt);
		txt.focus();
		txt.on('keypress', function(e){
			if(e.keyCode == 13){
				newMessage = $(this).val();
				if(message != newMessage && newMessage != ''){
					$.ajax({
						type:'post',
						data:{
							id : id,
							message: newMessage
						},
						async: true,
						url: 'ajaxRequest.php?controller=tasklist&changetask',
						success: (result) => {
							console.log(result);
						}
					});
				}
				span.html(newMessage == ''? message: newMessage);
			}

		});
	})
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
					$(elem).slideUp((index + 1) * 100, function(){
						$(elem).remove();
					});
				});
			}
		});
	}

});

$('#tasklist-name-edit').on('click', function(){

	swal({
		title :'TaskList',
		text:'Nombre de tu lista de tareas',
		type:'input',
		showCancelButton: true,
		closeOnConfirm:true
	}, function (input){
		if (input !== '' && input !== false){
			var taskname = $('#tasklist-name');
			if(input != taskname.text()){
				var id = $('.tasklist').data('id');
				$.ajax({
					type: 'post',
					data: {
						id: id,
						name : input
					},
					async: true,
					url: 'ajaxRequest.php?controller=tasklist&changelist=true',
					success: (result) => {
						console.log(result);
					}
				});
				taskname.text(input);
			}
		}
	});

});

	
		
GenerateClicks();


