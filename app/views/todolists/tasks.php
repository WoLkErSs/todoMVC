<div class="row input_area">
	<div class="col-xs-1 text-center">
		<form action="/tasks/change_status" method="post">
			<input type="hidden" name="task_id" value="<?=$tasks_id?>">
			<?php if ($task_status == 0): ?>
				<input type="checkbox" class="check_boxs sign" name="status">
			<?php endif; ?>
			<?php if ($task_status == 1): ?>
				<input type="checkbox" checked class="check_boxs sign line_throuht" name='status'">
			<?php endif; ?>
				
		</form>
	</div>
	<div class="col-xs-9 middl_col">
		<div class="contents, <?php if($task_status == 1) {echo 'line_through';}?>">
			<?= $task_name;?>
		</div>
		<form action="tasks/update" method="post" hidden class="">
			<input type="hidden" name="id" value='<?=$tasks_id?>'>
			
			<input type="text" class="task_name" name="name" value="<?= $task_name;?>">
			<input type="submit" class="btn btn-success m-0 p-0 h-25 w-40" value="save">
			<input type="button" class="btn btn-danger m-0 p-0 h-25 w-40 close_task_update" value="close">
		</form>
	</div>
	<div class="m-0 task_control">
		<div class="line">
			<div class="chevrons d-inline ml-10">
				<span class="glyphicon glyphicon-chevron-up"></span><br>
				<span class="p-3-0 glyphicon glyphicon-chevron-down"></span>
			</div>
			<div class="vbar m-5"></div>
			<div class="glyphicon pencil glyphicon-pencil pt-5 task_update"></div>
			<div class="vbar m-5"></div>
			<form action="/tasks/drop" method="post" class="d-inline trash_task_form pt-5">
				<input type="hidden" name="id" value="<?=$tasks_id?>">
				<button type="submit" class="glyphicon glyphicon-trash trash_task"></button>
			</form>
		</div>
	</div>
</div>