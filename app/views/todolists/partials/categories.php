<div class="container-flued m-50-0">
	<div class="row">
	    <div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
	    <div id="list" class="col-xs-12 col-sm-10 col-md-8 col-lg-6">
			<div class="row row_title_line tittle-name ">
				<div class=" col-xs-1  mt-10 glyphicon glyphicon-calendar">
				</div>
				<div class="m-0 col-xs-8">
					<div class="todo-title">
					<?php echo $name;?>
					</div>
					<form action="update" method="post" hidden id="todo_title" class="mt-10">
						<input type="hidden" name="id" value='<?=$id?>'>
						<input type="text" name="title">
						<input type="submit" class="btn lol btn-success m-0 p-0 h-25 w-40" value="save">
						<a href="http://todolist.ruby/todolists/index" ><input type="button" class="btn btn-danger m-0 p-0 h-25 w-40" value="close"></a>
					</form>
				</div>
				<div class="m-0 col-xs-3 main_icon text-right  text-primary">
					<div class="pencil">
						<button type="submit" id="update" class="glyphicon glyphicon-pencil"></button>
					</div>
					<div class="vbar m-15-0"></div>
					<div class="trash mr-15 p-0" >
						<form action="drop" method="post">
							<input type="hidden" name="id" value='<?=$id?>'>
							<button type="submit" class="glyphicon glyphicon-trash"></button>
						</form>
					</div>
				</div>
			</div>
			<div class="row create_task">
				<div class="col-xs-1 text-center mt-10 glyphicon glyphicon-plus text-success">
				</div>
				<div class="m-0 col-xs-11">
					<form action="n_task" method="post" class="add_zone mr-15 mt-12">
						<input id="titleOfTask" class="pl-10" placeholder="Start typing here to create a task..." name="title">
						<button id="addBtn" type="submit" class="pull-right add_btn btn btn-success text-center">Add Task</button>
					</form>
				</div>
			</div>
	    <div class="col-xs-0 col-sm-1 col-md-2 col-lg-3"></div>
	</div>
</div>
