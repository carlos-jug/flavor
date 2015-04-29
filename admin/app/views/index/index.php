<div class="container-fluid">
	<h1 class="page-header">Inicio</h1>
	<div class="row">
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Articulos</div>
				<div class="panel-body">
					<table class="table table-hover table-striped">
						<?php foreach($count_articles as $key => $value){ ?>
							<tr>
								<td><?=$key?></td><td><?=$value?></td>
							</tr>	
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Categorias</div>
				<div class="panel-body">
					<table class="table table-hover table-striped">
						<?php foreach($count_categorias as $key => $value){ ?>
							<tr>
								<td><?=$key?></td><td><?=$value?></td>
							</tr>	
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="panel panel-primary">
				<div class="panel-heading">Resultados</div>
				<div class="panel-body">
					<table class="table table-hover table-striped">
						<?php foreach($count_resultados as $key => $value){ ?>
							<tr>
								<td><?=$key?></td><td><?=$value?></td>
							</tr>	
						<?php } ?>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">
		</div>
	</div>
</div>