<?php 
Class Elementos_model extends CI_Model{
	function __construct() {
        parent::__construct();
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
            case "elemento":
                return $this->db->insert('elementos', $datos);
            break;
        }
    }

    /**
     * Obtiene registros de base de datos
     * y los retorna a las vistas
     * 
     * @param  [string] $tipo Tipo de consulta que va a hacer
     * @param  [int]    $id   Id foráneo para filtrar los datos
     * 
     * @return [array]       Arreglo de datos
     */
    function obtener($tipo, $id = null)
    {
        switch ($tipo) {
            case 'elementos':
                $this->db
                    ->select(array(
                        'e.Pk_Id',
                        'te.Nombre',
                        'e.Descripcion',
                        'ma.Nombre Marca',
                        'mo.Nombre Modelo',
                        ))
                    ->from('elementos e')
                    ->join('tipos_elementos te', 'e.Fk_Id_Tipo_Elemento = te.Pk_Id')
                    ->join('modelos mo', 'e.Fk_Id_Modelo = mo.Pk_Id')
                    ->join('marcas ma', 'mo.Fk_Id_Marca = ma.Pk_Id');
                
                // return $this->db_configuracion->get_compiled_select(); // string de la consulta
                return $this->db->get()->result();
            break;
        }
    }
}
/* Fin del archivo Elementos_model.php */
/* Ubicación: ./application/models/Elementos_model.php */