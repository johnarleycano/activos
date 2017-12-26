<?php 
Class Configuracion_model extends CI_Model{
	function __construct() {
        parent::__construct();

        /*
         * db_configuracion es la conexion a los datos de configuración de la aplicación, como lo son los sectores, vías,
         * tramos, entre otros.
         * Esta se llama porque en el archivo database.php la variable ['configuracion']['pconnect] esta marcada como false,
         * lo que quiere decir que no se conecta persistentemente sino cuando se le invoca, como en esta ocasión.
         */
        $this->db_configuracion = $this->load->database('configuracion', TRUE);
    }

    /**
	 * Obtiene registros de base de datos
	 * y los retorna a las vistas
	 * 
	 * @param  [string] $tipo Tipo de consulta que va a hacer
	 * @param  [int] 	$id   Id foráneo para filtrar los datos
	 * 
	 * @return [array]       Arreglo de datos
	 */
	function obtener($tipo, $id = null)
	{
		switch ($tipo) {
			case 'areas':
				$this->db_configuracion
		        	->select(array(
			            'a.Pk_Id ',
			            'ta.Nombre ',
			            ))
		            ->from('areas a')
		            ->join('tipos_areas ta', 'a.Fk_Id_Tipo_Area = ta.Pk_Id')
		            ->where('a.Fk_Id_Oficina', $id)
		            ->order_by('ta.Nombre');
		        
		        // return $this->db_configuracion->get_compiled_select(); // string de la consulta
		        return $this->db_configuracion->get()->result();
			break;

			case 'colores':
				return $this->db
					->order_by("Nombre")
					->get("colores")->result();
			break;

			case 'estados_elementos':
				return $this->db
					->order_by("Nombre")
					->get("estados_elementos")->result();
			break;

			case 'marcas':
				return $this->db
					->order_by("Nombre")
					->get("marcas")->result();
			break;

			case 'modelos':
				return $this->db
					->where("Fk_Id_Marca", $id)
					->order_by("Nombre")
					->get("modelos")->result();
			break;
			
			case 'oficinas':
				return $this->db_configuracion
					->where("Fk_Id_Proyecto", 1)
					->order_by("Nombre")
					->get("oficinas")->result();
			break;

			case 'proveedores':
				return $this->db
					->order_by("Nombre")
					->get("proveedores")->result();
			break;

			case 'tipos_elementos':
				return $this->db
					->order_by("Nombre")
					->get("tipos_elementos")->result();
			break;

			case 'usuarios_activos':
				return $this->db_configuracion
					->where("Estado", 1)
					->order_by("Nombres, Apellidos")
					->get("usuarios")->result();
			break;
		}
	}
}
/* Fin del archivo Configuracion_model.php */
/* Ubicación: ./application/models/Configuracion_model.php */