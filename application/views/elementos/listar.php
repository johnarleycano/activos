<div id="datos">
    <!-- Carga de datos -->
    <?php $this->load->view("elementos/datos", $this->data); ?>
</div>

<script type="text/javascript">
    // Contador
    var cont = 1

    // Evento scroll
    $(window).on("scroll", function() {
        var scrollHeight = $(document).height();
        var scrollPosition = $(window).height() + $(window).scrollTop();
        
        // Cuando llega al final del documento
        if ((scrollHeight - scrollPosition) / scrollHeight === 0) {
            // Se aumenta el contador de registros
            $("#contador").val(parseInt($("#contador").val()) + 15)
            // imprimir($("#contador").val())

            // Si no ha llegado al final de las órdenes
            if($("#fin_ordenes").val() != 1) cargar_mas_datos(cont)
            
            // Aumento de contador
            cont++
        }
    })

    function cargar_mas_datos(cont){
        var datos = {
            'tipo': 'index_lista_dinamica', 
            'contador': $("#contador").val(), 
            "busqueda": $("#input_buscar").val(),
        }
        // imprimir(datos, "tabla")

        $.ajax({
            url: "<?php echo site_url('elementos/cargar_interfaz'); ?>",
            data: datos,
            type: "POST",
            beforeSend: function()
            {
                $('.ajax-load').show()
            }
        })
        .done(function(data){
            $('.ajax-load').hide()
            $("#datos").append(data)
        })
        .fail(function(jqXHR, ajaxOptions, thrownError){
            imprimir('El servidor no responde.')
        })
    }
</script>