<!-- Si tiene id de elemento, lo carga -->
<?php $elemento = ($id_elemento) ? $this->elementos_model->obtener("elemento", $id_elemento) : null ; ?>

<!-- Id del elemento (cuando se cree el registro) -->
<input type="hidden" id="id_elemento" value="<?php echo $id_elemento; ?>">

<div class="col-md-6">
    <h4 class="uk-heading-line uk-text-right"><span>Características</span></h4>

    <div class="col-md-12">
        <label class="uk-form-label" for="input_codigo">Código *</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="text" min="0" id="input_codigo" title="Código" value="<?php if(isset($elemento->Codigo)) echo $elemento->Codigo; ?>" autofocus>
        </div>
    </div>
	
	<div class="col-md-12">
		<label class="uk-form-label" for="select_tipo_activo">Tipo de activo *</label>
		<div class="uk-form-controls">
            <select class="uk-select" id="select_tipo_activo" title="Tipo de activo">
            	<option value="">Seleccione...</option>}
            	<?php foreach($this->configuracion_model->obtener("tipos_activos") as $tipo_activo){ ?>
	                <option value="<?php echo $tipo_activo->Pk_Id; ?>"><?php echo $tipo_activo->Nombre; ?></option>
                <?php } ?>
            </select>
        </div>
	</div>

	<div class="col-md-6">
		<label class="uk-form-label" for="select_clasificacion">Clasificación *</label>
		<div class="uk-form-controls">
            <select class="uk-select" id="select_clasificacion" title="Clasificación">
            	<option value="">Seleccione primero un tipo de activo</option>}
            </select>
        </div>
	</div>

	<div class="col-md-6">
        <label class="uk-form-label" for="input_otra_clasificacion">Otra clasificación</label>
        <input class="uk-input" type="text" id="input_otra_clasificacion" title="Otra clasificación">
    </div>

	<div class="col-md-12">
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

	<div class="col-md-6">
	    <label class="uk-form-label" for="select_modelo">Modelo *</label>
	    <div class="uk-form-controls">
	        <select class="uk-select" id="select_modelo" title="Modelo">
	        	<option value="">Elija primero una marca...</option>
	        </select>
	    </div>
    </div>

	<div class="col-md-6">
	    <label class="uk-form-label" for="input_otro_modelo">Otro modelo</label>
        <input class="uk-input" type="text" id="input_otro_modelo" title="Otro modelo">
    </div>

    <div class="col-md-6">
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

    <div class="col-md-6">
        <label class="uk-form-label" for="input_otro_color">Otro color</label>
        <input class="uk-input" type="text" id="input_otro_color" title="Otro color">
    </div>

    <div class="col-md-12">
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
</div>

<div class="col-md-6">
    <h4 class="uk-heading-line uk-text-right"><span>Ubicación</span></h4>
	
	<div class="col-md-6">
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
    
    <div class="col-md-6">
        <label class="uk-form-label" for="select_bloque">Bloque *</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="select_bloque" title="Bloque">
            	<option value="">Elija primero una oficina...</option>
            </select>
        </div>
    </div>

    <div class="col-md-12">
        <label class="uk-form-label" for="select_area">Área *</label>
        <div class="uk-form-controls">
            <select class="uk-select" id="select_area" title="Área">
            	<option value="">Elija primero un bloque...</option>
            </select>
        </div>
    </div>
	
	<div class="col-md-6">
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

    <div class="col-md-6">
        <label class="uk-form-label" for="input_otro_proveedor">Otro proveedor</label>
        <input class="uk-input" type="text" id="input_otro_proveedor" title="Otro proveedor">
    </div>

	<div class="col-md-12">
        <label class="uk-form-label" for="input_fecha_compra">Fecha de compra</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="date" id="input_fecha_compra" title="Fecha de compra">
        </div>
    </div>

	<div class="col-md-12">
        <label class="uk-form-label" for="input_valor">Valor</label>
        <div class="uk-form-controls">
            <input class="uk-input" type="number" min="0" id="input_valor" title="Valor">
        </div>
    </div>

    <div class="col-md-12">
	    <label class="uk-form-label" for="input_observaciones_tecnicas">Observaciones técnicas</label>
		<textarea class="uk-textarea" id="input_observaciones_tecnicas" rows="5"></textarea>
	</div>
</div>

<p class="col-md-12">
	<button class="uk-button uk-button-default uk-modal-close" type="button" onCLick="javascript:history.back()">Cancelar</button>
	<button class="uk-button uk-button-primary" type="submit" onClick="javascript:guardar()">Guardar</button>
</p>

<script type="text/javascript">
	/**
	 * Guarda los registros en bases de datos
	 * 
	 * @return {void}
	 */
	function guardar()
	{
		let id_elemento = "<?php echo $id_elemento; ?>"

		cerrar_notificaciones()
		imprimir_notificacion("<div uk-spinner></div> Guardando el elemento...")

		let campos_obligatorios = {
			"input_codigo": $("#input_codigo").val(),
			"select_estado": $("#select_estado").val(),
			"select_area": $("#select_area").val(),
			"select_proveedor": $("#select_proveedor").val(),
		}
		// imprimir(campos_obligatorios, "tabla")
		
		// Si especifica otra clasificación
		if($("#input_otra_clasificacion").val() != "") {
			// El campo obligatorio es el elemento padre
			campos_obligatorios.select_tipo_activo = $("#select_tipo_activo").val()
		} else {
			// El campo obligatorio es el elemento hijo
			campos_obligatorios.select_clasificacion = $("#select_clasificacion").val()
		}

		// Si especifica otro modelo
		if($("#input_otro_modelo").val() != "") {
			// El campo obligatorio es el elemento padre
			campos_obligatorios.select_marca = $("#select_marca").val()
		} else {
			// El campo obligatorio es el elemento hijo
			campos_obligatorios.select_modelo = $("#select_modelo").val()
		}

		// Si no se especifica otro color, el campo obligatorio es el color
		if($("#input_otro_color").val() == "") campos_obligatorios.select_color = $("#select_color").val()

		// Si no se especifica otro proveedor, el campo obligatorio es el proveedor
		if($("#input_otro_proveedor").val() == "") campos_obligatorios.select_proveedor = $("#select_proveedor").val()
		
		// Si existen campos obligatorios sin diligenciar
		if(validar_campos_obligatorios(campos_obligatorios)) return false

		var datos = {
	    	"Codigo": $("#input_codigo").val(),
	    	"Observaciones": $("#input_observaciones_tecnicas").val(),
	    	"Fk_Id_Estado": $("#select_estado").val(),
	    	"Fk_Id_Area": $("#select_area").val(),
	    	"Fecha": "<?php echo date("Y-m-d H:i:s"); ?>",
	    	"Fecha_Compra": $("#input_fecha_compra").val(),
	    	"Valor": $("#input_valor").val(),
	    	"Fk_Id_Usuario": "<?php echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }

	    // Clasificación
	    let id_clasificacion = ($("#input_otra_clasificacion").val() != "") ? ajax("<?php echo site_url('configuracion/insertar'); ?>", {"tipo": "clasificacion", "datos": {Fk_Id_Tipo_Activo: $("#select_tipo_activo").val(), Nombre: $("#input_otra_clasificacion").val()}}, 'HTML') : $("#select_clasificacion").val()

	    // Modelo
	    let id_modelo = ($("#input_otro_modelo").val() != "") ? ajax("<?php echo site_url('configuracion/insertar'); ?>", {"tipo": "modelo", "datos": {Fk_Id_Marca: $("#select_marca").val(), Nombre: $("#input_otro_modelo").val()}}, 'HTML') : $("#select_modelo").val()

	    // Color
	    let id_color = ($("#input_otro_color").val() != "") ? ajax("<?php echo site_url('configuracion/insertar'); ?>", {"tipo": "color", "datos": {Nombre: $("#input_otro_color").val()}}, 'HTML') : $("#select_color").val()

	    // Proveedor
	    let id_proveedor = ($("#input_otro_proveedor").val() != "") ? ajax("<?php echo site_url('configuracion/insertar'); ?>", {"tipo": "proveedor", "datos": {Nombre: $("#input_otro_proveedor").val()}}, 'HTML') : $("#select_proveedor").val()

	    // Seagregan los valores al arreglo
	    datos.Fk_Id_Modelo = id_modelo
	    datos.Fk_Id_Clasificacion = id_clasificacion
	    datos.Fk_Id_Color = id_color
	    datos.Fk_Id_Proveedor = id_proveedor

	    // imprimir(datos)
	    
	    // Si trae un id de elemento
	    if ($("#id_elemento").val() == "") {
        	id = ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "elemento", "datos": datos}, 'HTML');

        	// Se pone el id en un campo para validar la demás información que se la asocie
	    	$("#id_elemento").val(id);
	    } else {
        	ajax("<?php echo site_url('elementos/actualizar'); ?>", {"tipo": "elemento", "datos": datos, "id_elemento": $("#id_elemento").val()}, 'HTML');
	    }

		// cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		redireccionar("<?php echo site_url('elementos'); ?>");
	}

	$(document).ready(function(){
		$("form").on("submit", function(){
			guardar()

			return false
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
			cargar_lista_desplegable(datos)
		})

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

<!-- Cuando tiene un elemento -->
<?php if ($elemento) { ?>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#input_fecha_compra").val("<?php echo $elemento->Fecha_Compra; ?>")
            $("#input_valor").val("<?php echo $elemento->Valor; ?>")

            select_por_defecto("select_color", <?php echo $elemento->Fk_Id_Color; ?>)
            select_por_defecto("select_estado", <?php echo $elemento->Fk_Id_Estado; ?>)
            select_por_defecto("select_proveedor", <?php echo $elemento->Fk_Id_Proveedor; ?>)

        	// Clasificación
        	datos = {
                url: "<?php echo site_url('configuracion/obtener'); ?>",
                tipo: "clasificaciones",
                id: "<?php echo $elemento->Fk_Id_Tipo_Activo; ?>",
                elemento_padre: $("#select_tipo_activo"),
                elemento_hijo: $("#select_clasificacion"),
                mensaje_padre: "Elija primero un tipo de activo...",
                mensaje_hijo: "Elija la clasificación..."
            }
            select_por_defecto("select_tipo_activo", <?php echo $elemento->Fk_Id_Tipo_Activo; ?>)
            cargar_lista_desplegable(datos)
            select_por_defecto("select_clasificacion", <?php echo $elemento->Fk_Id_Clasificacion; ?>)

            // Modelo
        	datos = {
                url: "<?php echo site_url('configuracion/obtener'); ?>",
                tipo: "modelos",
                id: "<?php echo $elemento->Fk_Id_Marca; ?>",
                elemento_padre: $("#select_marca"),
                elemento_hijo: $("#select_modelo"),
                mensaje_padre: "Elija primero una marca...",
                mensaje_hijo: "Elija un modelo..."
            }
            select_por_defecto("select_marca", "<?php echo $elemento->Fk_Id_Marca; ?>")
            cargar_lista_desplegable(datos);
            select_por_defecto("select_modelo", "<?php echo $elemento->Fk_Id_Modelo; ?>")

            select_por_defecto("select_oficina", "<?php echo $elemento->Fk_Id_Oficina; ?>")
            
            // Bloque
        	datos = {
                url: "<?php echo site_url('configuracion/obtener'); ?>",
                tipo: "bloques",
                id: "<?php echo $elemento->Fk_Id_Oficina; ?>",
                elemento_padre: $("#select_oficina"),
                elemento_hijo: $("#select_bloque"),
                mensaje_padre: "Elija primero una oficina...",
                mensaje_hijo: "Elija un bloque..."
            }
            cargar_lista_desplegable(datos);
            select_por_defecto("select_bloque", <?php echo $elemento->Fk_Id_Bloque; ?>)

            // Área
        	datos = {
                url: "<?php echo site_url('configuracion/obtener'); ?>",
                tipo: "areas",
                id: "<?php echo $elemento->Fk_Id_Bloque; ?>",
                elemento_padre: $("#select_bloque"),
                elemento_hijo: $("#select_area"),
                mensaje_padre: "Elija primero un bloque...",
                mensaje_hijo: "Elija un área..."
            }
            cargar_lista_desplegable(datos);
            select_por_defecto("select_area", <?php echo $elemento->Fk_Id_Area; ?>)

            $("#select_tipo_activo").focus()
        })
    </script>    
<?php } ?>