$('document').ready(function() {
	var update = $('#update');
	var form = $('#form');
	var title = $('.todo-title');
	update.click(function() {
		$(this).hide();
	},
	function() {
		$(form).show();
	})
})