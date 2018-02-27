<?php $elementos = $this->elementos_model->obtener("elementos"); ?>

<div id="cont_modal"></div>

<div class="uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 100; repeat: true">
    <?php foreach ($elementos as $elemento) { ?>
    	<?php
    	$ruta = "./archivos/elementos/{$elemento->Pk_Id}";
    	$logo = (file_exists("$ruta/foto.jpg")) ? "$ruta/foto.jpg" : base_url()."img/logos/devimed.png" ;
    	?>
	    <div>
	        <div class="uk-card uk-card-default uk-width-1-1@m">
			    <div class="uk-card-header">
			    	<div class="uk-card-badge uk-label uk-label-<?php echo $elemento->Color; ?>"><?php echo $elemento->Estado; ?></div>
			        <div class="uk-grid-small uk-flex-middle" uk-grid>
			            <div class="uk-width-auto">
			                <img class="uk-border-rounded" id="foto<?php echo $elemento->Pk_Id; ?>" width="60" src="<?php echo $logo; ?>" onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>);" style="cursor: pointer;">
			            </div>
			            <div class="uk-width-expand">
			                <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo "$elemento->Nombre $elemento->Marca"; ?></h3>
			                <p class="uk-text-meta uk-margin-remove-top"><?php echo strtoupper("<b>$elemento->Codigo</b> | $elemento->Modelo | $elemento->Oficina | $elemento->Area"); ?></p>
			            </div>
			        </div>
			    </div>
			    <div class="uk-card-footer">
			        <div class="uk-text-left">
			        	<?php $usuario = $this->elementos_model->obtener("usuario_elemento", $elemento->Pk_Id); ?>

			        	<span style="cursor: pointer;" title="Agregar foto" uk-tooltip="pos: top-center" onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>);">
			        		<i class="fas fa-camera"></i>
			        	</span>&nbsp;

			        	<span style="cursor: pointer;" title="Ver y editar elemento" uk-tooltip="pos: top-center" onClick="javascript:editar(<?php echo $elemento->Pk_Id; ?>);">
			        		<i class="fas fa-edit"></i>
			        	</span>&nbsp;
			        	
		                <span style="cursor: pointer;" title="Cambiar propietario" uk-tooltip="pos: top-center" onClick="javascript:ver_usuario(<?php echo $elemento->Pk_Id; ?>)">
		                	<i class="fas fa-user"></i> <?php echo (isset($usuario->Pk_Id)) ? $usuario->Nombres : "" ; ?>
		                </span>
		            </div>
		            <p id="cont_foto<?php echo $elemento->Pk_Id; ?>"></p>
			    </div>
			</div>
	    </div>
	<?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// Por defecto se carga el listado de registros
		cerrar_notificaciones();
	});
</script>