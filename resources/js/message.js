function showMessage(_messageInfo){
	var message = $('.message');
	var messageContainer = $('.message-container');
	var messageTitle = message.find('.message-title');
	var messageBody = message.find('.message-body');

	message.addClass(_messageInfo.class);
	messageTitle.html(`<span>${_messageInfo.title}</span>`);
	messageBody.html(`<span>${_messageInfo.body}</span>`);

	

	messageContainer.css('right', '0');

	setTimeout(()=>{
		messageContainer.css('right', '-100%');
	}, 2000);

	messageContainer.on('click', function(){
		$(this).css('right', '-100%');
	})
}