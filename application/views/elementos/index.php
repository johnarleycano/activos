<!-- Contenedor para carga de los modales -->
<div id="cont_elementos"></div>
<div id="cont_modal"></div>

<script type="text/javascript">
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
			"input_descripcion": $("#input_descripcion").val(),
			"select_area": $("#select_area").val(),
			"select_tipo_elemento": $("#select_tipo_elemento").val(),
			"select_modelo": $("#select_modelo").val(),
			"select_proveedor": $("#select_proveedor").val(),
			"input_cantidad": $("#input_cantidad").val(),
			"input_fecha_compra": $("#input_fecha_compra").val(),
		}
		// imprimir(campos_obligatorios);
		
		// Si existen campos obligatorios sin diligenciar
		if(validar_campos_obligatorios(campos_obligatorios)){
			return false;
		}

		datos = {
	    	"Descripcion": $("#input_descripcion").val(),
	    	"Fk_Id_Tipo_Elemento": $("#select_tipo_elemento").val(),
	    	"Fk_Id_Area": $("#select_area").val(),
	    	"Fk_Id_Modelo": $("#select_modelo").val(),
	    	"Fk_Id_Proveedor": $("#select_proveedor").val(),
	    	"Cantidad": $("#input_cantidad").val(),
	    	"Fecha": "<?php echo date("Y-m-d h:i:s"); ?>",
	    	"Fecha_Compra": $("#input_fecha_compra").val(),
	    	// "Fk_Id_Usuario": "<?php // echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }
	    // imprimir(datos);

        id = ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "elemento", "datos": datos}, 'HTML');
        // imprimir(id);
        
        UIkit.modal("#modal_elemento").hide();


		cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		listar();
        

        return false;
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
		// Por defecto se carga el listado de registros
		listar();
	});
</script>