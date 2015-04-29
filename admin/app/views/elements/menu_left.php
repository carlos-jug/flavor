<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
		<li class="<?=$controller=='index'?'active':'';?>"><a href="<?=Path?>"><i class="fa fa-fw fa-home"></i> Inicio</a></li>
		<li class="<?=$controller=='categorias'?'active':'';?>"><a href="<?=Path?>/categorias"><i class="fa fa-fw fa-list-alt"></i> Categorias</a></li>
		<li class="<?=$controller=='articulos'?'active':'';?>"><a href="<?=Path?>/articulos"><i class="fa fa-fw fa-file-o"></i> Articulos</a></li>
        <li class="<?php if($controller=='teams' or $controller=='players' or $controller=='estadios' or $controller=='transferencias') echo 'active'; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#equipos"><i class="fa fa-fw fa-users"></i> Equipos <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="equipos" class="collapse <?php if($controller=='teams' or $controller=='players' or $controller=='estadios' or $controller=='transferencias') echo 'in'; ?>">
				<li class="<?=$controller=='teams'?'active':'';?>"><a href="<?=Path?>/teams"><i class="fa fa-fw fa-users"></i> Equipos</a></li>
				<li class="<?=$controller=='estadios'?'active':'';?>"><a href="<?=Path?>/estadios"><i class="fa fa-fw fa-institution"></i> Estadios</a></li>
				<li class="<?=$controller=='players'?'active':'';?>"><a href="<?=Path?>/players"><i class="fa fa-fw fa-user"></i> Jugadores</a></li>
				<li class="<?=$controller=='transferencias'?'active':'';?>"><a href="<?=Path?>/transferencias"><i class="fa fa-fw fa-refresh"></i> Transferencias</a></li>
            </ul>
        </li>
		<li class="<?php if($controller=='vines' or $controller=='youtube') echo 'active'; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#multimedia"><i class="fa fa-fw fa-film"></i> Multimedia <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="multimedia" class="collapse <?php if($controller=='vines' or $controller=='youtube') echo 'in'; ?>">
				<li class="<?=$controller=='vines'?'active':'';?>"><a href="<?=Path?>/vines"><i class="fa fa-fw fa-vine"></i> Vines</a></li>
				<li class="<?=$controller=='youtube'?'active':'';?>"><a href="<?=Path?>/youtube"><i class="fa fa-fw fa-youtube"></i> Youtube</a></li>
            </ul>
        </li>
        <li class="<?=$controller=='tournaments'?'active':'';?>"><a href="<?=Path?>/tournaments"><i class="fa fa-fw fa-trophy"></i> Torneos</a></li>
		<li class="<?php if($controller=='editores' or $controller=='usuarios' or $controller=='newsletters') echo 'active'; ?>">
            <a href="javascript:;" data-toggle="collapse" data-target="#configuracion"><i class="fa fa-fw fa-gear"></i> Configuracion <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="configuracion" class="collapse <?php if($controller=='editores' or $controller=='usuarios' or $controller=='newsletters') echo 'in'; ?>">
				<li class="<?=$controller=='editores'?'active':'';?>"><a href="<?=Path?>/editores"><i class="fa fa-fw fa-users"></i> Editores</a></li>
				<li class="<?=$controller=='newsletters'?'active':'';?>"><a href="<?=Path?>/newsletters"><i class="fa fa-fw fa-envelope-o"></i> Newsletters</a></li>
            </ul>
        </li>
		<li class="<?=$controller=='registros'?'active':'';?>"><a href="<?=Path?>/registros"><i class="fa fa-fw fa-list-ol"></i> Most Wanted</a></li>
	</ul>
</div>