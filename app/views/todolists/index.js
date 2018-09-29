$('document').ready(function(){

	var addButton = $('#addBtn');
	addButton.click(function(){

		var input = $('#titleOfTask');
		var divRow = document.createElement('div');
		var li = document.createElement('li')
		var col_1 = document.createElement('div');
		var col_2 = document.createElement('div')
		var col_3 = document.createElement('div');
		var checkBox = document.createElement('input');
		var p = document.createElement('p');
		var wrap_for_col_3 = document.createElement('div');
		var div_for_moving = document.createElement('div');
		var span_gliph_down = document.createElement('span');
		var span_gliph_up = document.createElement('span');
		var br_mov =  document.createElement('br');
		var div_vbar_1 = document.createElement('div');
		var div_pencil = document.createElement('div');
		var div_vbar_2 = document.createElement('div');
		var div_trash = document.createElement('div');
		
		$(addButton).addClass('inputed_text');
		$(divRow).addClass('row');
		$(divRow).addClass('input_area');
		$(col_1).addClass('col-xs-1');
		$(col_1).addClass('text-center');
		$(checkBox).addClass('check_boxs');
		checkBox.type = 'checkbox';

		$(col_2).addClass('col-xs-9');
		$(col_2).addClass('middl_col');
		p.innerText = $('#titleOfTask').val();

		$(wrap_for_col_3).addClass('m-0');
		$(wrap_for_col_3).addClass('changes_of_line');
		$(col_3).addClass('col-xs-2');
		$(col_3).addClass('m-0');
		$(col_3).attr('hidden','');
		$(div_for_moving).addClass('line');
		$(div_for_moving).addClass('move');
		$(div_for_moving).addClass('m-0');
		$(div_for_moving).addClass('p-3-0');
		$(span_gliph_up).addClass('glyphicon');
		$(span_gliph_up).addClass('glyphicon-chevron-up');
		$(span_gliph_down).addClass('glyphicon');
		$(span_gliph_down).addClass('glyphicon-chevron-down');
		$(div_vbar_1).addClass('vbar');
		$(div_vbar_1).addClass('ml-10');
		$(div_vbar_1).addClass('m-5');
		$(div_pencil).addClass('glyphicon');
		$(div_pencil).addClass('pl-10');
		$(div_pencil).addClass('glyphicon-pencil');
		$(div_vbar_2).addClass('vbar');
		$(div_vbar_2).addClass('ml-10');
		$(div_vbar_2).addClass('m-5');
		$(div_trash).addClass('glyphicon');
		$(div_trash).addClass('glyphicon-trash');
		$(div_trash).addClass('pl-10');

		$(input).val('');

		$(span_gliph_up).appendTo(div_for_moving);
		$(br_mov).appendTo(div_for_moving);
		$(span_gliph_down).appendTo(div_for_moving);

		$(div_for_moving).appendTo(wrap_for_col_3);
		$(div_vbar_1).appendTo(wrap_for_col_3);
		$(div_pencil).appendTo(wrap_for_col_3);
		$(div_vbar_2).appendTo(wrap_for_col_3);
		$(div_trash).appendTo(wrap_for_col_3);
		/*
		$(DelButton).attr('id', 'deleteBTN');
		DelButton.innerText = 'Delete';
		*/
		$(checkBox).appendTo(col_1);
		$(p).appendTo(col_2);
		$(wrap_for_col_3).appendTo(col_3);
		
		$(col_1).appendTo(divRow);
		$(col_2).appendTo(divRow);
		$(col_3).appendTo(divRow);
		
		$(div_trash).click(function(){
			this.parentElement.parentElement.parentElement.remove();
		});

		$(divRow).hover(function(){
			$(col_3).show();
		},
		function(){
			$(col_3).hide();
		})
		/* не понятно как сделать закругления 
		$("divRow:last-child").css('border-bottom-right-radius','40%')
		*/
		$(divRow).appendTo('#list');

	})

	var pencil = $('#pen');
	pencil.click(function(){
		console.log('Click on pencil');
	})

	var pick = $('#pick');
	pick.click(){
		alert('hello');
	}
})