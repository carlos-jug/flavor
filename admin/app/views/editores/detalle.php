<form method="post" id="form_user" enctype="multipart/form-data" role="form" action="<?=Path?>/editores/detalle/<?=$editor["idEditor"]?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title" id="myModalLabel">Detalle</h4>
	</div>
	<div class="modal-body">
		<div class="container-fluid" role="main">
			<div class="row">
				<div class="col-md-6">
					<div class="form-group">
						<label for="name">Nombre</label><br />
						<input required="required" type="text" class="name form-control" id="name" name="name" value="<?=$editor["name"]?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="idEscritorio">Id Version de Escritorio</label><br />
						<input type="text" class="idEscritorio form-control" id="idEscritorio" name="idEscritorio" value="<?=$editor["idEscritorio"]?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="email">Correo</label><br />
						<input type="text" class="email form-control" id="email" name="email" value="<?=$editor["email"]?>">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="pass">Contraseña</label><br />
						<input type="password" class="pass form-control" id="pass" placeholder="Contraseña" name="pass" value="">
					</div>
				</div>
				<div class="col-md-6">
					<div class="form-group">
						<label for="activo">Activo?</label>
						<select class="activo form-control" id="activo" name="activo">
							<option <?=$editor["activo"]==1?'selected="selected"':'';?> value="1">Activo</option>
							<option <?=$editor["activo"]==0?'selected="selected"':'';?> value="0">Inactivo</option>
						</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label for="avatar">Avatar</label><br />
						<?php if($editor["avatar"]){ ?><img style="max-height: 148px;" src="<?=Path_front?>/images/editores/<?=$editor["avatar"]?>" /><br /> <?php } ?>
						<input type="file" class="avatar form-control" id="avatar" name="avatar">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal-footer">
		<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		<button type="submit" class="btn btn-primary">
	    	<span class="glyphicon glyphicon-save"></span> Guardar
		</button>
	</div>
</form>