$('document').ready(function() {
	var close = $('.close_title');
	var update = $('.update');
	update.click(function() {
		$(this).hide();
		$(this).parents().parent().prev().find("div.todo-title").hide();
		$(this).parent().parent().prev().find("form.todo_title").show();
	})

	close.click(function() {
		$(this).parent().prev().show();
		$(this).parent().hide();
		//$(this).parents(".par").hide();
	})

	var sign = $('.sign');
	sign.change(function() {
		$(this).parents('form').submit();
	})

})