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
     * Permite la inserción de datos en la base de datos 
     * 
     * @param  [string] $tipo  Tipo de inserción
     * @param  [array]  $datos Datos que se van a insertar
     * 
     * @return [boolean]        true, false
     */
    function insertar($tipo, $datos)
    {
        switch ($tipo) {
            case "clasificacion":
                return $this->db->insert('clasificacion_elementos', $datos);
            break;

            case "color":
                return $this->db->insert('colores', $datos);
            break;

            case "modelo":
                return $this->db->insert('modelos', $datos);
            break;

            case "proveedor":
                return $this->db->insert('proveedores', $datos);
            break;
        }
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
            case "aplicacion":
                return $this->db_configuracion
                ->where("Pk_Id", $id)
                ->get("aplicaciones")->row();
            break;
            
			case 'areas':
				$this->db_configuracion
		        	->select(array(
			            'a.Pk_Id ',
			            'ta.Nombre ',
			            ))
		            ->from('areas a')
		            ->join('tipos_areas ta', 'a.Fk_Id_Tipo_Area = ta.Pk_Id')
		            ->where('a.Fk_Id_Bloque', $id)
		            ->order_by('ta.Nombre');
		        
		        // return $this->db_configuracion->get_compiled_select(); // string de la consulta
		        return $this->db_configuracion->get()->result();
			break;

			case 'bloques':
				$this->db_configuracion
		        	->select(array(
			            'b.Pk_Id',
						'tb.Nombre'
		            ))
		            ->from('bloques b')
		            ->join('tipos_bloques tb', 'b.Fk_Id_Tipo_Bloque = tb.Pk_Id')
		            ->where('b.Fk_Id_Oficina', $id)
		            ->order_by('tb.Nombre');

	            // return $this->db_configuracion->get_compiled_select(); // string de la consulta
		        return $this->db_configuracion->get()->result();
			break;

			case 'clasificaciones':
				return $this->db
					->order_by("Nombre")
					->where("Fk_Id_Tipo_Activo", $id)
					->get("clasificacion_elementos")->result();
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

			case 'tipos_activos':
				return $this->db
					->order_by("Nombre")
					->get("tipos_activos")->result();
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