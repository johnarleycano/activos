<hr>
<center>
	Tipo <span class="uk-label">Todos</span>
	Marca <span class="uk-label">Todas</span>
	Modelos <span class="uk-label">Todos</span>
	Estado <span class="uk-label">Todos</span>
	Oficinas <span class="uk-label">Todas</span>
</center>
<hr>

<!-- Contenedor para carga de los modales -->
<div id="cont_elementos"></div>
<div id="cont_modal"></div>

<script type="text/javascript">
	function asignar_usuario(id_elemento)
	{
		cerrar_notificaciones();
		imprimir_notificacion("<div uk-spinner></div> Asignando el elemento al usuario...");

		campos_obligatorios = {
			"select_usuario": $("#select_usuario").val(),
			"input_fecha_entrega": $("#input_fecha_entrega").val(),
		}
		imprimir(campos_obligatorios);
		
		// Si existen campos obligatorios sin diligenciar
		if(validar_campos_obligatorios(campos_obligatorios)){
			return false;
		}

		datos = {
	    	"Fk_Id_Elemento": id_elemento,
	    	"Fk_Id_Usuario": $("#select_usuario").val(),
	    	"Fecha_Entrega": $("#input_fecha_entrega").val(),
	    	"Fecha": "<?php echo date("Y-m-d h:i:s"); ?>",
	    	"Observaciones": $.trim($("#input_observaciones").val()),
	    	// "Fk_Id_Usuario": "<?php // echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }
	    // imprimir(datos);

	    ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "asignacion_usuario", "datos": datos}, 'HTML');

        UIkit.modal("#modal_asignacion").hide();

		cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		listar();
	}

	function usuario(id_elemento)
	{
		cargar_interfaz("cont_modal", "<?php echo site_url('elementos/cargar_interfaz'); ?>", {"tipo": "index_asignar_usuario", "id_elemento": id_elemento});
	}

	function crear()
	{
		cargar_interfaz("cont_modal", "<?php echo site_url('elementos/cargar_interfaz'); ?>", {"tipo": "index_crear"});
	}

	function guardar()
	{
		cerrar_notificaciones();
		imprimir_notificacion("<div uk-spinner></div> Guardando el elemento...");

		campos_obligatorios = {
			"select_tipo_elemento": $("#select_tipo_elemento").val(),
			"select_area": $("#select_area").val(),
			"select_tipo_elemento": $("#select_tipo_elemento").val(),
			"select_modelo": $("#select_modelo").val(),
			"select_color": $("#select_color").val(),
			"select_estado": $("#select_estado").val(),
			"select_proveedor": $("#select_proveedor").val(),
			"input_numero_serie": $("#input_numero_serie").val(),
			"input_fecha_compra": $("#input_fecha_compra").val(),
		}
		// imprimir(campos_obligatorios);
		
		// Si existen campos obligatorios sin diligenciar
		if(validar_campos_obligatorios(campos_obligatorios)){
			return false;
		}

		datos = {
	    	"Fk_Id_Tipo_Elemento": $("#select_tipo_elemento").val(),
	    	"Fk_Id_Area": $("#select_area").val(),
	    	"Fk_Id_Modelo": $("#select_modelo").val(),
	    	"Fk_Id_Color": $("#select_color").val(),
	    	"Fk_Id_Estado": $("#select_estado").val(),
	    	"Fk_Id_Proveedor": $("#select_proveedor").val(),
	    	"Numero_Serie": $("#input_numero_serie").val(),
	    	"Fecha": "<?php echo date("Y-m-d h:i:s"); ?>",
	    	"Fecha_Compra": $("#input_fecha_compra").val(),
	    	// "Fk_Id_Usuario": "<?php // echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }
	    // imprimir(datos);

        id = ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "elemento", "datos": datos}, 'HTML');
        imprimir(id);
        
        UIkit.modal(".modal").hide();

		cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		listar();
	}

	/**
	 * Lista todos los registros disponibles
	 * @return [void]
	 */
	function listar()
	{
		// cerrar_notificaciones();
		imprimir_notificacion("<div uk-spinner></div> Cargando elementos...");

		cargar_interfaz("cont_elementos", "<?php echo site_url('elementos/cargar_interfaz'); ?>", {"tipo": "index_lista"});
	}

	$(document).ready(function(){
		// Botones del menú
		botones(Array("crear"));

		// Por defecto se carga el listado de registros
		listar();
	});
</script>