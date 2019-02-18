<?php 
Class Elementos_model extends CI_Model{
	function __construct() {
        parent::__construct();
    }

    /**
     * Actualiza los registros en base de datos
     * 
     * @param  [string]     $tipo       [tipo de actualización]
     * @param  [int]    $id         [Id del registro actualizar]
     * @param  [string]     $datos      [Arreglo con datos a actualizar]
     * 
     * @return [boolear]        [true, false]
     */
    function actualizar($tipo, $id, $datos){
        switch ($tipo) {
            case 'elemento':
                return $this->db->where("Pk_Id", $id)->update('elementos', $datos);
            break;
        }
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
            case "asignacion_usuario":
                return $this->db->insert('elementos_usuarios', $datos);
            break;

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
            case 'elemento':
                $this->db
                    ->select(array(
                        'e.*',
                        'ce.Fk_Id_Tipo_Activo',
                        'm.Pk_Id Fk_Id_Marca',
                        'a.Fk_Id_Bloque',
                        'b.Fk_Id_Oficina',
                    ))
                    ->from('elementos e')
                    ->join('clasificacion_elementos ce', 'e.Fk_Id_Clasificacion = ce.Pk_Id')
                    ->join('marcas m', 'e.Fk_Id_Modelo = m.Pk_Id')
                    ->join('configuracion.areas a', 'e.Fk_Id_Area = a.Pk_Id')
                    ->join('configuracion.bloques b', 'a.Fk_Id_Bloque = b.Pk_Id')
                    ->where("e.Pk_Id", $id)
                ;
                
                // return $this->db->get_compiled_select(); // string de la consulta
                return $this->db->get()->row();
            break;

            case 'elementos':
                $this->db
                    ->select(array(
                        'e.Pk_Id',
                        'e.Fk_Id_Estado',
                        'e.Codigo',
                        'ma.Nombre Marca',
                        'mo.Nombre Modelo',
                        'e.Fk_Id_Area',
                        'ta.Nombre Area',
                        'ee.Clase Color',
                        'e.Fk_Id_Usuario',
                        'tb.Nombre Bloque',
                        'o.Nombre Oficina', 
                        'ee.Nombre Estado', 
                        'ce.Nombre',
                    ))
                    ->from('elementos e')
                    ->join('modelos mo', 'e.Fk_Id_Modelo = mo.Pk_Id')
                    ->join('marcas ma', 'mo.Fk_Id_Marca = ma.Pk_Id')
                    ->join('estados_elementos ee', 'e.Fk_Id_Estado = ee.Pk_Id')
                    ->join('clasificacion_elementos ce', 'e.Fk_Id_Clasificacion = ce.Pk_Id')
                    ->join('configuracion.areas a', 'e.Fk_Id_Area = a.Pk_Id')
                    ->join('configuracion.tipos_areas ta', 'a.Fk_Id_Tipo_Area = ta.Pk_Id')
                    ->join('configuracion.bloques b', 'a.Fk_Id_Bloque = b.Pk_Id')
                    ->join('configuracion.tipos_bloques tb', 'b.Fk_Id_Tipo_Bloque = tb.Pk_Id')
                    ->join('configuracion.oficinas o', 'b.Fk_Id_Oficina = o.Pk_Id')
                    ;
                
                // return $this->db->get_compiled_select(); // string de la consulta
                return $this->db->get()->result();
            break;

            case 'usuario_elemento':
                $this->db
                    ->select(array(
                        'u.Pk_Id',
                        'CONCAT(u.Nombres, " ", u.Apellidos) Nombres',
                        'eu.Fecha_Entrega',
                        'eu.Observaciones',
                        ))
                    ->from('elementos_usuarios eu')
                    ->where('eu.Fk_Id_Elemento', $id)
                    ->order_by('eu.Fecha_Entrega', "DESC")
                    ->limit(1)
                    ->join('configuracion.usuarios u', 'eu.Fk_Id_Usuario = u.Pk_Id')
                    ;

                return $this->db->get()->row();
                // return $this->db->get_compiled_select(); // string de la consulta
            break;
        }
    }
}
/* Fin del archivo Elementos_model.php */
/* Ubicación: ./application/models/Elementos_model.php */