<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Título que viene desde el controlador de cada interfaz -->
<title><?php echo $titulo; ?> | Activos Fijos</title>

<!-- Scripts -->
<script src="<?php echo base_url(); ?>js/jquery-3.2.1.min.js"></script>

<!-- Estilos -->
<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet"><!-- Bootstrap -->

<?php if(ENVIRONMENT === 'development') { ?>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/uikit.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/fontawesome-all.css" />

	<!-- Scripts -->
	<script src="<?php echo base_url(); ?>js/uikit.js"></script>
	<script src="<?php echo base_url(); ?>js/uikit-icons.js"></script>
	<script src="<?php echo base_url(); ?>js/fontawesome-all.js"></script>
<?php } ?>

<?php if(ENVIRONMENT === 'production') { ?>
	<!-- Estilos -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/uikit.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>css/fontawesome-all.min.css" />

	<!-- Scripts -->
	<script src="<?php echo base_url(); ?>js/uikit.min.js"></script>
	<script src="<?php echo base_url(); ?>js/uikit-icons.min.js"></script>
	<script src="<?php echo base_url(); ?>js/fontawesome-all.min.js"></script>
<?php } ?>

<!-- Estilos -->
<link rel="stylesheet" href="<?php echo base_url(); ?>css/estilos.css" /><!-- Estilos generales -->

<!-- Scripts -->
<script src="<?php echo base_url(); ?>js/funciones.js"></script> <!-- Funciones generales -->