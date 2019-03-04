<!-- Búsqueda -->
<div class="uk-inline uk-width-1-1">
    <span class="uk-form-icon" uk-icon="icon: user"></span>
	<input class="uk-input" id="input_buscar" type="text" placeholder="Buscar cualquier elemento por código, marca, modelo, área..." autofocus>
</div>
<input type="hidden" id="contador" value="0">

<!-- Contenedor para carga de los modales -->
<div id="cont_elementos"></div>

<script type="text/javascript">
	/**
	 * Carga de interfaz de creación
	 * 
	 * @return {void}
	 */
	function crear()
	{
		redireccionar(`<?php echo site_url('elementos/crear'); ?>`)
	}

	/**
	 * Carga de interfaz de creación
	 * 
	 * @return {void}
	 */
	function editar(id_elemento)
	{
		redireccionar(`<?php echo site_url('elementos/crear/'); ?>${id_elemento}`)
	}
	
	/**
	 * Carga de interfaz de creación
	 * 
	 * @return {void}
	 */
	function foto(id_elemento)
	{
		cargar_interfaz(`cont_foto${id_elemento}`, "<?php echo site_url('elementos/cargar_interfaz'); ?>", {"tipo": "foto", "id_elemento": id_elemento})
	}

	/**
	 * Lista todos los registros disponibles
	 * @return [void]
	 */
	function listar()
	{
		cerrar_notificaciones()
		imprimir_notificacion("<div uk-spinner></div> Cargando elementos...")

        // Datos a enviar
        let datos = {
            "tipo": "index_lista", 
            "busqueda": $("#input_buscar").val(), 
            "contador": $("#contador").val(), 
        }
        // imprimir(datos, "tabla")

		cargar_interfaz("cont_elementos", "<?php echo site_url('elementos/cargar_interfaz'); ?>", datos)
	}

	$(document).ready(function(){
		// Botones del menú
		botones(Array("crear"))

		// Por defecto se carga el listado de registros
		listar()

		// Cuando se escriba algo en el campo de búsqueda
		$("#input_buscar").on("keyup", listar)
	})
</script>