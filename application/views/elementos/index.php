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
	    	"Fecha": "<?php echo date("Y-m-d H:i:s"); ?>",
	    	"Observaciones": $.trim($("#input_observaciones").val()),
	    	// "Fk_Id_Usuario": "<?php // echo $this->session->userdata('Pk_Id_Usuario'); ?>",
	    }
	    // imprimir(datos);

	    ajax("<?php echo site_url('elementos/insertar'); ?>", {"tipo": "asignacion_usuario", "datos": datos}, 'HTML');


		cerrar_notificaciones();
		imprimir_notificacion("Guardado.", "success");

		redireccionar("<?php echo site_url('elementos'); ?>");
	}

	function usuario(id_elemento)
	{
		cargar_interfaz("cont_modal", "<?php echo site_url('elementos/cargar_interfaz'); ?>", {"tipo": "index_asignar_usuario", "id_elemento": id_elemento});
	}

	/**
	 * Carga de interfaz de creación
	 * @return {void}
	 */
	function crear()
	{
		redireccionar(`<?php echo site_url('elementos/crear'); ?>`)
	}

	/**
	 * Lista todos los registros disponibles
	 * @return [void]
	 */
	function listar()
	{
		cerrar_notificaciones();
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