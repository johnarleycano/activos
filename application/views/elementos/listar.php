<div class="uk-child-width-1-3@m" uk-grid uk-scrollspy="cls: uk-animation-fade; target: > div > .uk-card; delay: 100; repeat: true">
    <?php foreach ($this->elementos_model->obtener("elementos") as $elemento) { ?>
	    <div>
	        <div class="uk-card uk-card-default uk-width-1-1@m">
			    <div class="uk-card-header">
			        <div class="uk-grid-small uk-flex-middle" uk-grid>
			            <div class="uk-width-auto">
			                <img class="uk-border-circle" width="40" height="40" src="<?php echo base_url().'img/logos/devimed.png'; ?>">
			            </div>
			            <div class="uk-width-expand">
			                <h3 class="uk-card-title uk-margin-remove-bottom"><?php echo $elemento->Nombre; ?></h3>
			                <p class="uk-text-meta uk-margin-remove-top"><?php echo $elemento->Descripcion; ?></p>
			            </div>
			        </div>
			    </div><!-- 
			    <div class="uk-card-body">
			        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
			    </div> -->
			    <div class="uk-card-footer">
			        <a href="#" class="uk-button uk-button-text">FOTOS</a>
			    </div>
			</div>
	    </div>
	<?php } ?>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		// Botones del menú
		botones(Array("crear", "anterior"));

		// Por defecto se carga el listado de registros
		cerrar_notificaciones();
	});
</script>