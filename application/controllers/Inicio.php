<?php
date_default_timezone_set('America/Bogota');

defined('BASEPATH') OR exit('El acceso directo a este archivo no está permitido');

/**
 * @author: 	John Arley Cano Salinas
 * Fecha: 		15 de diciembre de 2017
 * Programa:  	Activos | Módulo inicial
 *            	Permite visualizar estados
 *            	e información a manera de resumen
 * Email: 		johnarleycano@hotmail.com
 */
class Inicio extends CI_Controller {
	/**
	 * Función constructora de la clase. Se hereda el mismo constructor 
	 * de la clase para evitar sobreescribirlo y de esa manera 
     * conservar el funcionamiento de controlador.
	 */
	function __construct() {
        parent::__construct();

        // Carga de modelos
        $this->load->model(array('inicio_model'));
    }

    /**
     * Interfaz inicial
     * 
     * @return [void]
     */
	function index()
	{
        $this->data['titulo'] = 'Inicio';
        $this->data['contenido_principal'] = 'inicio/index';
        $this->load->view('core/template', $this->data);
	}
}
/* Fin del archivo Inicio.php */
/* Ubicación: ./application/controllers/Inicio.php */