$('document').ready(function() {
	var close = $('.close_title');
	var update = $('.update');
	update.click(function() {
		$(this).parents().parent().prev().find("div.todo-title").hide();
		$(this).parent().parent().prev().find("form.todo_title").show();
	})
	close.click(function() {
		$(this).parents().prev().show();
		$(this).parent().hide();

	})
})