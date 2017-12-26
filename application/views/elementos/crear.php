<div id="modal_elemento" class="modal" uk-modal>
    <div class="uk-modal-dialog">
    	<form class="uk-form-horizontal uk-margin-large">
	        <button class="uk-modal-close-default" type="button" uk-close></button>

	        <div class="uk-modal-header">
	            <h2 class="uk-modal-title">Agregar elemento</h2>
	        </div>

	        <div class="uk-modal-body" uk-overflow-auto>
	        	<h4 class="uk-heading-line uk-text-right"><span>Características</span></h4>

	        	<div class="uk-margin">
			        <label class="uk-form-label" for="select_tipo_elemento">Tipo de elemento *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_tipo_elemento" title="Tipo de elemento" autofocus>
			            	<option value="">Seleccione...</option>}
			            	<?php foreach($this->configuracion_model->obtener("tipos_elementos") as $tipo_elemento){ ?>
				                <option value="<?php echo $tipo_elemento->Pk_Id; ?>"><?php echo $tipo_elemento->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_marca">Marca *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_marca" title="Marca">
			            	<option value="">Seleccione...</option>
			            	<?php foreach($this->configuracion_model->obtener("marcas") as $marca){ ?>
				                <option value="<?php echo $marca->Pk_Id; ?>"><?php echo $marca->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_modelo">Modelo *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_modelo" title="Modelo">
			            	<option value="">Elija primero una marca...</option>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="input_numero_serie">Número de serie *</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" type="input" id="input_numero_serie" title="Número de serie">
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_color">Color *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_color" title="Color">
			            	<option value="">Seleccione...</option>
			            	<?php foreach($this->configuracion_model->obtener("colores") as $color){ ?>
				                <option value="<?php echo $color->Pk_Id; ?>"><?php echo $color->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_estado">Estado *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_estado" title="Estado">
			            	<option value="">Seleccione...</option>
			            	<?php foreach($this->configuracion_model->obtener("estados_elementos") as $estado){ ?>
				                <option value="<?php echo $estado->Pk_Id; ?>"><?php echo $estado->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>

	        	<h4 class="uk-heading-line uk-text-right"><span>Ubicación</span></h4>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_oficina">Oficina *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_oficina" title="Oficina">
			            	<option value="">Seleccione...</option>}
			            	<?php foreach($this->configuracion_model->obtener("oficinas") as $oficina){ ?>
				                <option value="<?php echo $oficina->Pk_Id; ?>"><?php echo $oficina->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_area">Área *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_area" title="Área">
			            	<option value="">Elija primero una oficina...</option>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="input_fecha_compra">Fecha de compra *</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" type="date" id="input_fecha_compra" title="Fecha de compra">
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="select_proveedor">Proveedor *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_proveedor" title="Proveedor">
			            	<option value="">Seleccione...</option>}
			            	<?php foreach($this->configuracion_model->obtener("proveedores") as $proveedor){ ?>
				                <option value="<?php echo $proveedor->Pk_Id; ?>"><?php echo $proveedor->Nombre; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
	        </div>

	        <div class="uk-modal-footer uk-text-right">
	            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
	            <button class="uk-button uk-button-primary" type="submit">Guardar</button>
	        </div>
		</form>
    </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
		UIkit.modal("#modal_elemento").show();

		$("form").on("submit", function(){
			guardar();

			return false;
		});
		
		// Cuando se elija la oficina, se cargan las áreas de esa oficina
		$("#select_oficina").on("change", function(){
			datos = {
				url: "<?php echo site_url('configuracion/obtener'); ?>",
				tipo: "areas",
				id: $(this).val(),
				elemento_padre: $("#select_oficina"),
				elemento_hijo: $("#select_area"),
				mensaje_padre: "Elija primero una oficina...",
				mensaje_hijo: "Elija el área..."
			}
			cargar_lista_desplegable(datos);
		});

		// Cuando se elija la marca, se cargan sus modelos
		$("#select_marca").on("change", function(){
			datos = {
				url: "<?php echo site_url('configuracion/obtener'); ?>",
				tipo: "modelos",
				id: $(this).val(),
				elemento_padre: $("#select_marca"),
				elemento_hijo: $("#select_modelo"),
				mensaje_padre: "Elija primero una marca...",
				mensaje_hijo: "Elija un modelo..."
			}
			cargar_lista_desplegable(datos);
		});
	});
</script>