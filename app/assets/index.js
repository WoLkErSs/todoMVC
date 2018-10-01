$('document').ready(function() {
	var update = $('.update');
	var title = $('.todo-title');
	var todo_title = $('.todo_title');
	update.click(function() {
		$(todo_title).show();
		$(title).hide();
		$(this).hide();
	})
})