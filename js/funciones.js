/**
 * Método para realizar consultas y carga
 * de información mediante Ajax
 * 
 * @param  [string]  url            Url del controlador y método que consultará
 * @param  [string]  datos          Datos que enviará. Normalmente en formato JSON
 * @param  [string]  tipo_respuesta La respuesta que retorna. Se da en Ajax o HTML
 * @param  [boolean] async          paso de datos síncrono o asíncrono
 * 
 * @return [array]                Respuesta con los datos
 * 
 */
function ajax(url, datos, tipo_respuesta, async = false){
    //Variable de exito
    var exito;

    // Esta es la petición ajax que llevará 
    // a la interfaz los datos pedidos
    $.ajax({
        url: url,
        data: datos,
        type: "POST",
        dataType: tipo_respuesta,
        async: async,
        success: function(respuesta){
            //Si la respuesta no es error
            if(respuesta){
                //Se almacena la respuesta como variable de éxito
                exito = respuesta;
            } else {
                //La variable de éxito será un mensaje de error
                // exito = 'error';
                exito = respuesta;
            } //If
        },//Success
        error: function(respuesta){
            //Variable de exito será mensaje de error de ajax
            exito = respuesta;
        }//Error
    });//Ajax

    //Se retorna la respuesta
    return exito;
}

/**
 * Oculta todos los íconos y habilita
 * los que estén parametrizados en cada
 * interfaz
 * 
 * @param  [array] parametros íconos a habilitar
 * 
 * @return [void]
 */
function botones(parametros)
{
    $("[id^='icono_']").hide();

    // Si trae parámetros
    if (parametros) {
        $("#menu_superior > div").removeClass("uk-hidden");
        
        for (i = 0; i < parametros.length; i++) { 
            $("#icono_" + parametros[i]).show();
        }
    }
}

/**
 * Carga de interfaz
 * 
 * @param  {string} contenedor 
 * @param  {string} url        
 * @param  {json} datos      
 * 
 * @return
 */
function cargar_interfaz(contenedor, url, datos)
{
    // Carga de la interfaz
    $("#" + contenedor).load(url, datos);
}

/**
 * Se limpia la lista, se consultan los elementos
 * y se cargan en la lista nuevamente
 * 
 * @param  [array] datos    Datos a cargar y mostrar
 * 
 * @return [void]
 */
function cargar_lista_desplegable(datos){
    // Si no se elige ninguna opción, se limpia la lista
    if (datos.elemento_padre.val() == "") {
        limpiar_lista(datos.elemento_hijo, datos.mensaje_padre);

        return false;
    }
    
    // Se limpia la lista
    limpiar_lista(datos.elemento_hijo, datos.mensaje_hijo);

    // Consulta de los valores, se recorren y se alimenta la lista desplegable
    valores = ajax(datos.url, {"tipo": datos.tipo, "id": datos.id}, "JSON");

    $.each(valores, function(clave, valor) {
        datos.elemento_hijo.append("<option value='" + valor.Pk_Id + "'>" + valor.Nombre + "</option>");
    });

    // Se pone el foco en la siguiente lista desplegable
    datos.elemento_hijo.focus();
}

/**
 * Cierra todas las notificaciones
 * en pantalla
 * 
 * @return [void]
 */
function cerrar_notificaciones()
{	
	UIkit.notification.closeAll();
}

/**
 * Imprime mensaje en consola
 * 
 * @param  [string] mensaje Mensaje a imprimir
 * 
 * @return [void]
 */
function imprimir(mensaje, tipo = null)
{
    switch(tipo) {
        case "tabla":
            console.table(mensaje)
        break;

        case "tiempo_inicio":
            console.time(mensaje)
        break;

        case "tiempo_final":
            console.timeEnd(mensaje)
        break;

        case "grupo":
            console.group(mensaje)
        break;

        default:
            console.log(mensaje)
    }
}

/**
 * Imprime el mensaje de notificación en pantalla
 * 
 * @param  [string] tipo    primary, success, warning, danger
 * @param  [string] mensaje Mensaje de la notificación
 * 
 * @return [void]
 */
function imprimir_notificacion(mensaje, tipo = null)
{
	// datos para la notificación
	datos = {
	    message: mensaje,
	    pos: 'bottom-center',
	    timeout: 0
	}

	// Si trae un tipo (para formatear el mensaje)
	if (tipo) datos.status = tipo

	datos.timeout = 5000

	// Se lanza la notificación
	UIkit.notification(datos)
}

/**
 * Limpia la lista desplegable y deja la opción por defecto
 * 
 * @param  [element]    elemento elemento del formulario (lista)
 * @param  [string]     mensaje  Mensaje de la opción por defecto
 * 
 * @return [void]
 */
function limpiar_lista(elemento, mensaje){
    elemento.html('').append("<option value=''>" + mensaje + "</option>");
}

/**
 * Redirige a la interfaz indicada
 * 
 * @param  [string] url Dirección a donde se dirige
 * 
 * @return [void]     
 */
function redireccionar(url){
    location.href = url;
}

/**
 * Pone un valor por defecto a un select
 * @param  {string}     elemento    Nombre del select
 * @param  {string}     valor       Valor del option
 * @param  {boolean}    Select2     Es un select de select2.js
 */
function select_por_defecto(elemento, valor)
{
     $(`#${elemento} option[value="${valor}"]`).attr("selected", true)
}

function subir(tipo, url, id)
{
    let barra_progreso = document.getElementById('js-progressbar');

    UIkit.upload('.js-upload', {
        url: `${url}/${tipo}/${id}`,
        multiple: false,
        datatype: "html",
        async: false,
        // allow : '*.(jpg|jpeg|gif|png)',
        beforeSend: function () {
            cerrar_notificaciones();
            imprimir_notificacion(`<div uk-spinner></div> Subiendo ${tipo}...`);

        },
        beforeAll: function () {
            // imprimir(arguments[0])
            // console.log('beforeAll', arguments);
        },
        load: function () {

        },
        error: function (e) {
            // console.log('error', arguments);
        },
        complete: function () {
            // console.log('complete', arguments);
        },

        loadStart: function (e) {
            // console.log('loadStart', arguments);

            barra_progreso.removeAttribute('hidden');
            barra_progreso.max = e.total;
            barra_progreso.value = e.loaded;
        },
        progress: function (e) {
            // console.log('progress', arguments);
            barra_progreso.max = e.total;
            barra_progreso.value = e.loaded;
        },
        loadEnd: function (e) {
            // console.log('loadEnd', arguments);
            barra_progreso.max = e.total;
            barra_progreso.value = e.loaded;
        },
        completeAll: function (e) {

            // $("#cont_subir").hide()
            // imprimir(e.response)
            barra_progreso.setAttribute('hidden', 'hidden');

            cerrar_notificaciones();
            imprimir_notificacion(`${tipo} subida correctamente.`, "success")

            $(`#cont_${tipo}${id}`).html("")

        }
    });
}

/**
 * Recorre los campos y obligatorios buscando
 * que todos estén diligenciados
 * 
 * @param  [array] campos Arreglo de campos a validar
 * 
 * @return [array]        Campos que no se han diligenciado
 */
function validar_campos_obligatorios(campos)
{
    campos_vacios = new Array();

    // Se recorren los registros y  se almacenan en un arreglo
    // los nombres de los campos que están vacíos
    $.each(campos, function(clave, campo) {
    	if ($.trim(campo) == "") {
    		campos_vacios.push(clave);
    	}
    });

    // Si existen campos obligatorios sin diligenciar,
    // se recorre cada campo y se genera notificación en pantalla
    if(campos_vacios.length > 0){
        cerrar_notificaciones();

        for (var i = 0; i < campos_vacios.length; i++){
			imprimir_notificacion("El valor de " + $("#" + campos_vacios[i]).attr("title")  + " no puede estar vacío", "warning");
		}
	}

    // Si hay campos vacíos se retorna el arreglo,
    // sino, false para continuar con el proceso del formulario
	if (campos_vacios.length > 0) {
		return true;
	}
}

/**
 * Se recorren los checks y se busca que
 * al menos esté uno marcado
 * 
 * @param  [string] elemento nombre del id de los checks
 * 
 * @return [boolean]          true = no hay checks marcados
 */
function validar_checks(elemento)
{
    var marcados = 0;

    // Se recorren los checks y se acumulan los marcados
    $("#" + elemento + ":checked").each(function(){
        marcados++;
    });

    if (marcados < 1) {
        return true;
    }
}