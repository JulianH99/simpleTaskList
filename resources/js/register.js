var modal = $('.modal-background');

$('#regshow').on('click', () => {
	var imgtop = $('.img').offset().top;
	var imgh = $('.img').outerHeight();

	modal.css('top', (imgtop + imgh) + 'px');
	//modal.addClass('modal-show');
});

$('.close').on('click', () => {
	modal.css('top', 100 + '%');
	//modal.removeClass('modal-show');
});