<div class="row input_area">
	<div class="col-xs-1 text-center">
		<form action="/tasks/change_status">
			<input type="hidden" name="id" value="<?=$tasks_id?>">
			<?php if ($task_status == 0): ?>
				<input type="checkbox" class="check_boxs sign" name="status">
			<?php endif; ?>
			<?php if ($task_status == 1): ?>
				<input type="checkbox" checked class="check_boxs sign" name="status">
			<?php endif; ?>
				
		</form>
	</div>
	<div class="col-xs-9 middl_col">
		<p class="contents">
			<?= $task_name;?>
		</p>
	</div>
	<div class="m-0 task_control">
		<div class="line">
			<div class="chevrons ml-10">
				<span class="glyphicon glyphicon-chevron-up"></span><br>
				<span class="p-3-0 glyphicon glyphicon-chevron-down"></span>
			</div>
			<div class="vbar m-5"></div>
			<div class="glyphicon pencil glyphicon-pencil pt-7"></div>
			<div class="vbar m-5"></div>
			<form action="/tasks/drop" method="post">
				<input type="hidden" name="id" value="<?=$tasks_id?>">
				<button type="submit" class="glyphicon glyphicon-trash pt-7" value=""></button>
			</form>
		</div>
	</div>
</div>