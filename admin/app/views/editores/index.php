<div class="container-fluid" role="main">
	<h1 class="page-header">Editores</h1>
	<div class="row">
		<div class="col-md-9"></div>
		<div class="col-md-3 text-right">
			<a href="<?=Path?>/editores/detalle" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detalle">
				Nuevo <span class="glyphicon glyphicon-plus-sign"></span>
			</a>
			<!-- <a href="<?=Path?>/articulos/buscar" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#detalle">
				Buscar <span class="glyphicon glyphicon-search"></span>
			</a> -->
			<a href="<?=Path?>/editores/sincroNews" class="btn btn-primary btn-xs" data-toggle="modal">
				Sincronizar <span class="glyphicon glyphicon-refresh"></span>
			</a>
		</div>
	</div>
	<hr />
	<br />
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>Avatar</th>
						<th>Nombre</th>
						<th>Id Version Escritorio</th>
						<th>Email</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($editores as $editor){ ?>
						<tr class=" <?=$editor["activo"]==0?'danger':'';?>">
							<td><?php if($editor["avatar"]){ ?><img height="50px" src="<?=Path_front?>/images/editores/<?=$editor["avatar"]?>" /><?php } ?></td>
							<td><?=$editor["name"]?></td>
							<td><?=$editor["idEscritorio"]?></td>
							<td><?=$editor["email"]?></td>
							<td width="50">
								<div class="input-group">
									<div class="input-group-btn">
										<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-list-alt"></span></button>
										<ul class="dropdown-menu dropdown-menu-right" role="submenu">
											<li><a href="<?=Path?>/editores/sincro_editor/<?=$editor["idEditor"]?>"><span class="glyphicon glyphicon-refresh"></span> Sincronizar</a></li>
											<li><a href="<?=Path?>/editores/detalle/<?=$editor["idEditor"]?>" data-toggle="modal" data-target="#detalle"><span class="glyphicon glyphicon-edit"></span> Editar</a></li>
											<li><a class="confirmation" href="<?=Path?>/editores/eliminar/<?=$editor["idEditor"]?>"><span class="glyphicon glyphicon-remove"></span> Eliminar</a></li>
										</ul>
									</div>
								</div>
							</td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
			<?=$pagination;?>
		</div>
	</div>
</div>
<div class="modal fade" id="detalle" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content"></div>
	</div>
</div>
