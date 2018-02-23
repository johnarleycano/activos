<?php $usuario_asignado = $this->elementos_model->obtener("usuario_elemento", $id_elemento); ?>

<div id="modal_asignacion" class="modal" uk-modal>
    <div class="uk-modal-dialog">
    	<form class="uk-form-horizontal uk-margin-large">
			<button class="uk-modal-close-default" type="button" uk-close></button>

	        <div class="uk-modal-header">
	            <h2 class="uk-modal-title">Asignar usuario al elemento</h2>
	        </div>
	        
	        <div class="uk-modal-body" >
				<div class="uk-margin">
			        <label class="uk-form-label" for="select_usuario">Usuario *</label>
			        <div class="uk-form-controls">
			            <select class="uk-select" id="select_usuario" title="Usuario" autofocus>
			            	<option value="">Seleccione...</option>}
			            	<?php foreach($this->configuracion_model->obtener("usuarios_activos") as $usuario){ ?>
				                <option value="<?php echo $usuario->Pk_Id; ?>"><?php echo "$usuario->Nombres $usuario->Apellidos"; ?></option>
			                <?php } ?>
			            </select>
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="input_fecha_entrega">Fecha de entrega *</label>
			        <div class="uk-form-controls">
			            <input class="uk-input" type="date" id="input_fecha_entrega" title="Fecha de entrega" value="<?php if(isset($usuario_asignado->Fecha_Entrega)){echo $usuario_asignado->Fecha_Entrega;} ?>">
			        </div>
			    </div>
			    <div class="uk-margin">
			        <label class="uk-form-label" for="input_observaciones">Observaciones</label>
		            <textarea class="uk-textarea" id="input_observaciones" rows="5"><?php if(isset($usuario_asignado->Fecha_Entrega)){echo $usuario_asignado->Observaciones;} ?></textarea>
		        </div>
	    	</div>

	        <div class="uk-modal-footer uk-text-right">
	            <button class="uk-button uk-button-default uk-modal-close" type="button">Cancelar</button>
	            <button class="uk-button uk-button-primary" type="submit">Guardar</button>
	        </div>
		</form>
	</div>
</div>

<script type="text/javascript">


	$(document).ready(function(){
		UIkit.modal("#modal_asignacion").show();

		$("form").on("submit", function(){
			asignar_usuario("<?php echo $id_elemento; ?>");

			return false;
		});
	});
</script>

<?php if (isset($usuario_asignado->Pk_Id)){ ?>
	<script>
		select_por_defecto("select_usuario", "<?php echo $usuario_asignado->Pk_Id; ?>");	
	</script>
<?php } ?>