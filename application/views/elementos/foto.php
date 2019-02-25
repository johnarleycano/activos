<div class="js-upload uk-placeholder uk-text-center" id="cont_subir">
    <span uk-icon="icon: cloud-upload"></span>
    <span class="uk-text-middle">Adjunte la foto del elemento arrastrándola aquí o</span>
    <div uk-form-custom>
        <input type="file" id="subir">
        <span class="uk-link">seleccione una desde su dispositivo.</span>
    </div>
</div>
<progress id="js-progressbar" class="uk-progress" value="0" max="100" hidden></progress>

<script type="text/javascript">
	function algo(id){
		// if(false){
			var elemento = ajax("<?php echo site_url('elementos/obtener'); ?>", {"tipo": "elemento", "id": id}, "JSON")
			imprimir(elemento)
			return false
		// }
	}
	// Cuando el DOM esté listo
    $(document).ready(function() {
		$("#subir").on("change", function(){
			subir_elemento = subir("foto", `<?php echo site_url("elementos/subir"); ?>`, "<?php echo $id_elemento; ?>")
			imprimir(subir_elemento)

			algo("<?php echo $id_elemento; ?>")
			

			// Se recarga la imagen
            // d = new Date()
            // $("#foto<?php // echo $id_elemento; ?>").attr("src", "<?php // echo base_url().'archivos/elementos/'; ?>" + "128" + ".jpg" + "?timestamp=" + new Date().getTime())
			

			redireccionar("elementos")
	    })
	})
</script>