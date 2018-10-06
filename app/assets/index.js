$('document').ready(function() {
	var close = $('.close_title');
	var update = $('.update');
	var sign = $('.sign');
	var task_update = $('.task_update');
	var close_task_update = $('.close_task_update');

	update.click(function() {
		$(this).hide();
		$(this).parent().parent().prev().find("div.todo-title").hide();
		$(this).parent().parent().prev().find("form.todo_title").show();
	})

	close.click(function() {
		$(this).parent().prev().show();
		$(this).parent().hide();
		$(this).parents('.row_title_line').find('.main_icon').find('.pencil').find(update).show();
	})

	sign.change(function() {
		$(this).parents('form').submit();
	})

	task_update.click(function() {
		$(this).parents('.task_control').prev().find('form').prev().hide();
		$(this).parents('.task_control').prev().find('form').show();
		$(this).css('visibility','hidden');
	})

	close_task_update.click(function() {
		$(this).parent().hide();
		$(this).parents('.middl_col').next().find('.line').find('.task_update').css('visibility','visible');
		$(this).parent().prev().show();

	})
})
	/*
	sign.each(function(){
		console.log($(this).checked);
		if ($(this).prop("checked")) {
			$(this).parents('.text-center').next().find('.contents').css("text-decoration","line-through");
		}
    });
    */