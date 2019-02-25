<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

/**
 * @author: 	John Arley Cano Salinas
 * Fecha: 		15 de diciembre de 2017
 * Programa:  	Activos | Módulo de elementos
 *            	Interacción con los elementos que 
 *            	hacen parte del inventario de activos
 *            	fijos
 * Email: 		johnarleycano@hotmail.com
 */
class Elementos extends CI_Controller {
	/**
	 * Función constructora de la clase. Se hereda el mismo constructor 
	 * de la clase para evitar sobreescribirlo y de esa manera 
     * conservar el funcionamiento de controlador.
	 */
	function __construct() {
        parent::__construct();

        // Si no ha iniciado sesión, se redirige a la aplicación de configuración
        if(!$this->session->userdata('Pk_Id_Usuario')){
            redirect("sesion/cerrar");
        }

        // Carga de modelos
        $this->load->model(array('elementos_model', 'configuracion_model'));
    }

    /**
     * Interfaz inicial de los elementos
     * 
     * @return [void]
     */
	function index()
	{
        $this->data['titulo'] = 'Elementos';
        $this->data['contenido_principal'] = 'elementos/index';
        $this->load->view('core/template', $this->data);
	}

    /**
     * Actualización de registros en base de datos
     * 
     * @return [void]
     */
    function actualizar()
    {
         //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            $datos = $this->input->post('datos');
            $tipo = $this->input->post('tipo');

            switch ($tipo) {
                case 'elemento':
                    echo $this->elementos_model->actualizar($tipo, $this->input->post('id_elemento'), $datos);
                break;
            }
        }else{
            //Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        }
    }

	/**
	 * Carga de interfaces 
	 * @return [void]
	 */
	function cargar_interfaz()
    {
        //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            $tipo = $this->input->post("tipo");

            switch ($tipo) {
                case "index_asignar_usuario":
                    $this->data["id_elemento"] = $this->input->post("id_elemento");

                    $this->load->view("elementos/asignar_usuario", $this->data);
                break;

                case "index_lista":
                    $this->load->view("elementos/listar");
                break;

                case "foto":
                    $this->data["id_elemento"] = $this->input->post("id_elemento");

                    $this->load->view("elementos/foto", $this->data);
                break;
            }
        } else {
            // Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        }
    }

    /**
     * Interfaz de creación y edición de
     * elementos
     * 
     * @return [void]
     */
    function crear()
    {
        $this->data['id_elemento'] = $this->uri->segment(3);
        $this->data['titulo'] = 'Elementos';
        $this->data['contenido_principal'] = 'elementos/crear';
        $this->load->view('core/template', $this->data);
    }

    /**
     * Permite la inserción de datos en la base de datos 
     * 
     * @return [void]
     */
    function insertar()
    {
        //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            // Datos vía POST
            $datos = $this->input->post('datos');
            $tipo = $this->input->post('tipo');

            switch ($tipo) {
                case "elemento":
                    // Se inserta el registro y log en base de datos
                    if ($this->elementos_model->insertar($tipo, $datos)) {
                        echo $id = $this->db->insert_id();

                        // Se inserta el registro de logs enviando tipo de log y dato adicional si corresponde
                        // $this->logs_model->insertar(3, "Medición temporal $id");
                    }
                break;
                
                case "asignacion_usuario":
                    // Se inserta el registro y log en base de datos
                    if ($this->elementos_model->insertar($tipo, $datos)) {
                        echo $id = $this->db->insert_id();

                        // Se inserta el registro de logs enviando tipo de log y dato adicional si corresponde
                        // $this->logs_model->insertar(3, "Medición temporal $id");
                    }
                break;
            }
        }else{
            //Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        } // if
    }

    /**
     * Obtiene registros de base de datos
     * y los retorna a las vistas
     * 
     * @return [vois]
     */
    function obtener()
    {
        //Se valida que la peticion venga mediante ajax y no mediante el navegador
        if($this->input->is_ajax_request()){
            $tipo = $this->input->post("tipo");
            $id = $this->input->post("id");

            switch ($tipo) {
                case "elemento":
                    print json_encode($this->elementos_model->obtener($tipo, $id));
                break;
            }
        } else {
            // Si la peticion fue hecha mediante navegador, se redirecciona a la pagina de inicio
            redirect('');
        }
    }

    function subir()
    {
        // Se toman los datos por POST
        $tipo = $this->uri->segment(3);
        $id_elemento = $this->uri->segment(4);

        // Se establece el directorio principal de los elementos
        $directorio = "./archivos/elementos";

        foreach ($_FILES as $key){
            $archivo = new SplFileInfo($key['name']['0']);
            $extension = $archivo->getExtension();
            
            if (move_uploaded_file($key['tmp_name']["0"], "$directorio/$id_elemento.$extension")){
                // Se agrega el nombre en base de datos
                echo $this->elementos_model->actualizar("elemento", $id_elemento, array("Foto" => "$id_elemento.$extension"));

                // echo $key['name']['0'];
            }
        }

        echo "ok";
    }
}
/* Fin del archivo Elementos.php */
/* Ubicación: ./application/controllers/Elementos.php */