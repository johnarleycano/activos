<form>
	<div class="uk-column-1-2@m uk-column-divider">
		<h4 class="uk-heading-line uk-text-right"><span>Características</span></h4>
		<div class="uk-margin">
	        <label class="uk-form-label" for="select_tipo_activo">Tipo de activo *</label>
			<div class="uk-form-controls">
	            <select class="uk-select" id="select_tipo_activo" title="Tipo de activo" autofocus>
	            	<option value="">Seleccione...</option>}
	            	<?php foreach($this->configuracion_model->obtener("tipos_activos") as $tipo_activo){ ?>
		                <option value="<?php echo $tipo_activo->Pk_Id; ?>"><?php echo $tipo_activo->Nombre; ?></option>
	                <?php } ?>
	            </select>
	        </div>
		</div>

		<div class="uk-margin">
	        <label class="uk-form-label" for="select_clasificacion">Clasificación *</label>
			<div class="uk-form-controls">
	            <select class="uk-select" id="select_clasificacion" title="Clasificación">
	            	<option value="">Seleccione primero un tipo de activo</option>}
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
	        <label class="uk-form-label" for="select_bloque">Bloque *</label>
	        <div class="uk-form-controls">
	            <select class="uk-select" id="select_bloque" title="Bloque">
	            	<option value="">Elija primero una oficina...</option>
	            </select>
	        </div>
	    </div>

	    <div class="uk-margin">
	        <label class="uk-form-label" for="select_area">Área *</label>
	        <div class="uk-form-controls">
	            <select class="uk-select" id="select_area" title="Área">
	            	<option value="">Elija primero un bloque...</option>
	            </select>
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

		<div class="uk-margin">
	        <label class="uk-form-label" for="input_fecha_compra">Fecha de compra *</label>
	        <div class="uk-form-controls">
	            <input class="uk-input" type="date" id="input_fecha_compra" title="Fecha de compra">
	        </div>
	    </div>

		<div class="uk-margin">
	        <label class="uk-form-label" for="input_valor">Valor</label>
	        <div class="uk-form-controls">
	            <input class="uk-input" type="number" min="0" id="input_valor" title="Valor">
	        </div>
	    </div>
	</div>

	<button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
    <button class="uk-button uk-button-primary" type="submit">Guardar</button>
</form>

<script type="text/javascript">
	/**
	 * Guarda los registros en bases de datos
	 * 
	 * @return {void}
	 */
	function guardar()
	{
		cerrar_notificaciones();
		imprimir_notificacion("<div uk-spinner></div> Guardando el elemento...");

		campos_obligatorios = {
			"select_clasificacion": $("#select_clasificacion").val(),
			"select_modelo": $("#select_modelo").val(),
			"select_color": $("#select_color").val(),
			"select_estado": $("#select_estado").val(),
			"select_area": $("#select_area").val(),
			"select_proveedor": $("#select_proveedor").val(),
		}
		// imprimir(campos_obligatorios);
		
		// Si existen campos obligatorios sin diligenciar
		if(validar_campos_obligatorios(campos_obligatorios)){
			return false;
		}

		datos = {
	    	"Fk_Id_Clasificacion": $("#select_clasificacion").val(),
	    	"Fk_Id_Modelo": $("#select_modelo").val(),
	    	"Fk_Id_Color": $("#select_color").val(),
	    	"Fk_Id_Estado": $("#select_estado").val(),
	    	"Fk_Id_Area": $("#select_area").val(),
	    	"Fk_Id_Proveedor": $("#select_proveedor").val(),
	    	"Fecha": "<?php echo date("Y-m-d H:i:s"); ?>",
	    	"Fecha_Compra": $("#input_fecha_compra").val(),
	    	"Valor": $("#input_valor").val(),
	 //    	// "Fk_Id_Usuario": "<?php // echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }
	    // imprimir(datos);

        ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "elemento", "datos": datos}, 'HTML');
        
		cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		redireccionar("<?php echo site_url('elementos'); ?>");
	}

	$(document).ready(function(){
		$("form").on("submit", function(){
			guardar();

			return false;
		});

		// Cuando se elija el tipo de activo, se cargan las clasificaciones
		$("#select_tipo_activo").on("change", function(){
			datos = {
				url: "<?php echo site_url('configuracion/obtener'); ?>",
				tipo: "clasificaciones",
				id: $(this).val(),
				elemento_padre: $("#select_tipo_activo"),
				elemento_hijo: $("#select_clasificacion"),
				mensaje_padre: "Elija primero un tipo de activo...",
				mensaje_hijo: "Elija la clasificación..."
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

		// Cuando se elija la oficina, se cargan los bloques de esa oficina
		$("#select_oficina").on("change", function(){
			datos = {
				url: "<?php echo site_url('configuracion/obtener'); ?>",
				tipo: "bloques",
				id: $(this).val(),
				elemento_padre: $("#select_oficina"),
				elemento_hijo: $("#select_bloque"),
				mensaje_padre: "Elija primero una oficina...",
				mensaje_hijo: "Elija el bloque..."
			}
			cargar_lista_desplegable(datos);
		});

		// Cuando se elija el bloque, se cargan las áreas de ese bloque
		$("#select_bloque").on("change", function(){
			datos = {
				url: "<?php echo site_url('configuracion/obtener'); ?>",
				tipo: "areas",
				id: $(this).val(),
				elemento_padre: $("#select_bloque"),
				elemento_hijo: $("#select_area"),
				mensaje_padre: "Elija primero un bloque...",
				mensaje_hijo: "Elija el área..."
			}
			cargar_lista_desplegable(datos);
		});
	})
</script>