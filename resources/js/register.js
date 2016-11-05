
var modal = $('.modal-background');
$('#regshow').on('click', () => {
	modal.fadeIn();
});
$('.close').on('click', function() {
	modal.fadeOut();
});