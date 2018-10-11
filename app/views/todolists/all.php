<main>
	<div class="container-flued">
		<div class="row">
			<div class="col-xs-3"></div>
			<div class="col-xs-6 text-center pt-70">
				<h1 class="m-0 p-0"><b>SIMPLE TODO LISTS</b></h1>
				<h2 class="m-0 p-0 mb-80">FROM RUBY GARAGE</h2>
			</div>
			<div class="col-xs-1">
				<div class="m-o p-o pt-70">
					<form action="sign_out" method="post">
						<input type="hidden" name="sign_out" value="0">
						<input type="submit" class="btn btn-primary background" value="SIGN OUT">
					</form>
				</div>
			</div>
		</div>
	 	<div class="row">
			<div class="col-xs-1"></div>
			<div class="col-xs-10">
				<div class="text-center">
					<form action="create" method="POST">
						<button class="btn btn-add-todo background mt-50 mb-80">
							<span class=" glyphicon glyphicon-plus bnt_plus"></span>Add TODO List 
						</button>
					</form>
				</div>
			</div>
			<div class="col-xs-3"></div>
		</div>
	</div>
		<?php 
			foreach ($data['todolists'] as $todolist) {
				$id = $todolist['id'];
				$name = $todolist['name'];
				$tasks = $todolist['tasks'];
				include ROOT_PATH . 'app/views/todolists/partials/categories.php';
			}
		 ?>
</main>
<footer class="footer text-center ">@ Ruby Garage</footer>
