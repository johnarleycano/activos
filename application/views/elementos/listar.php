<div id="cont_modal"></div>

<?php
// Recorrido de los elementos
foreach ($this->elementos_model->obtener("elementos") as $elemento) {
	$ruta = "./archivos/elementos/$elemento->Pk_Id";
	$logo = (file_exists("$ruta/foto.jpg")) ? "$ruta/foto.jpg" : base_url()."img/logos/devimed.png" ;
	?>

	<div style="display: inline-block; vertical-align: middle; width: 100px;">
		<img class="uk-border-rounded" id="foto<?php echo $elemento->Pk_Id; ?>" src="<?php echo $logo; ?>" onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>);" style="cursor: pointer; vertical-align: middle;">
	</div>

	<div style="display: inline-block;  vertical-align: middle; width: 60%;">
		<p style="border: 1px solid red; min-height: 30px; margin: 0; padding: 0; font-size: 1.5em;">
			<?php echo $elemento->Nombre; ?>
		</p>

		<p style="border: 1px solid green; min-height: 25px; margin: 0; padding: 0; color: gray;">
			<span class="uk-badge uk-label-<?php echo $elemento->Color; ?>"></span>
			<?php echo "#$elemento->Codigo"; ?> | <i class="fa fa-industry"></i> <?php echo $elemento->Oficina; ?> <i class="fa fa-home"></i> <?php echo $elemento->Area; ?> 
		</p>
		
		<p style="height: 20px; margin: 2px;">
			<a onCLick="javascript:editar(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: file-edit"></a>
			<!-- <a href="#" uk-icon="icon: copy"></a> -->
			<a onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: camera"></a>
			<a onClick="javascript:ver_usuario(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: user"></a> <?php echo (isset($usuario->Pk_Id)) ? $usuario->Nombres : "" ; ?>
		</p>
	</div>
	
	<!-- <div style="border: 1px solid orange; display: inline-block; vertical-align: middle; width: 29%; position: right;"></div> -->
	<p id="cont_foto<?php echo $elemento->Pk_Id; ?>"></p>

    <hr style="margin: 5px;">
<?php } ?>

<script type="text/javascript">
	$(document).ready(function(){
		// Por defecto se carga el listado de registros
		cerrar_notificaciones();
	});
</script>

<?php exit(); ?>

<div class="uk-child-width-1-1@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 100; repeat: true">
    <?php
    foreach ($this->elementos_model->obtener("elementos") as $elemento) {
    	$ruta = "./archivos/elementos/$elemento->Pk_Id";
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