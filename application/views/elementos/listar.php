<div class="uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 100; repeat: true">
    <?php foreach ($this->elementos_model->obtener("elementos") as $elemento) { ?>
	    <div>
	        <div class="uk-card uk-card-default uk-width-1-1@m">
			    <div class="uk-card-header">
			    	<div class="uk-card-badge uk-label uk-label-<?php echo $elemento->Color; ?>"><?php echo $elemento->Estado; ?></div>
			        <div class="uk-grid-small uk-flex-middle" uk-grid>
			            <div class="uk-width-auto">
			                <img class="uk-border-circle" width="40" height="40" src="<?php echo base_url().'img/logos/devimed.png'; ?>">
			            </div>
			            <div class="uk-width-expand">
			                <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo "$elemento->Nombre $elemento->Marca"; ?></h3>
			                <p class="uk-text-meta uk-margin-remove-top"><?php echo strtoupper("<b>$elemento->Codigo</b> | $elemento->Modelo | $elemento->Oficina | $elemento->Area"); ?></p>
			            </div>
			        </div>
			    </div>
			    <div class="uk-card-footer">
			        <div class="uk-text-right">
			        	<?php $usuario = $this->elementos_model->obtener("usuario_elemento", $elemento->Pk_Id); ?>
		                <span style="cursor: pointer;" title="Cambiar propietario" uk-tooltip="pos: top-center" onClick="javascript:usuario(<?php echo $elemento->Pk_Id; ?>)"> <span uk-icon="icon: user"></span> <?php echo (isset($usuario->Pk_Id)) ? $usuario->Nombres : "" ; ?></span>
		            </div>
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