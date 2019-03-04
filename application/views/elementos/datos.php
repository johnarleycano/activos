<?php
// Se obtienen los datos
$elementos = $this->elementos_model->obtener("elementos", array("busqueda" => $busqueda, "contador" => $contador));
// print_r(array("busqueda" => $busqueda, "contador" => $contador));
// echo $elementos;
// exit();
// Si no hay más elementos
if(count($elementos) == 0) {
	echo '<li class="list-group-item">No hay más elementos.</li>';
	echo "<input type='hidden' id='fin_ordenes' value='1'></input>";
}

foreach ($elementos as $elemento) {
	$ruta = "./archivos/elementos";
	$logo = (file_exists("$ruta/$elemento->Pk_Id.jpg")) ? "$ruta/$elemento->Pk_Id.jpg" : "$ruta/logo_devimed.png" ;

	?>
    <hr style="margin: 5px;">
	<div style="display: inline-block; vertical-align: middle; width: 100px;">
		<img class="uk-border-rounded" id="foto<?php echo $elemento->Pk_Id; ?>" src="<?php echo $logo; ?>" onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>);" style="cursor: pointer; vertical-align: middle;">
	</div>

	<div style="display: inline-block;  vertical-align: middle; width: 60%;">
		<p style="min-height: 30px; margin: 0; padding: 0; font-size: 1.5em;">
			<?php echo $elemento->Nombre; ?>
		</p>

		<p style="min-height: 25px; margin: 0; padding: 0; color: gray;">
			<span class="uk-badge uk-label-<?php echo $elemento->Color; ?>"></span>
			<?php echo "#$elemento->Codigo | $elemento->Marca"; ?> | <i class="fa fa-industry"></i> <?php echo $elemento->Oficina; ?> <i class="fa fa-home"></i> <?php echo $elemento->Area; ?> 
		</p>
		
		<p style="height: 20px; margin: 2px;">
			<a onCLick="javascript:editar(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: file-edit"></a>
			<!-- <a href="#" uk-icon="icon: copy"></a> -->
			<a onClick="javascript:foto(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: camera"></a>
			<a onClick="javascript:ver_usuario(<?php echo $elemento->Pk_Id; ?>)" uk-icon="icon: user"></a> <?php echo (isset($usuario->Pk_Id)) ? $usuario->Nombres : "" ; ?>
		</p>
	</div>
	
	<!-- <div style="border: 1px solid orange; display: inline-block; vertical-align: middle; width: 29%; position: right;"></div> -->
	<p id="cont_foto<?php echo $elemento->Pk_Id; ?>"></p>
	<?php
}
?>