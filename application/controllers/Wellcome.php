<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wellcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }
	public function index()
	{
		$data['about'] = $this->Mglobals->getAll("about_us");
		$data['service'] = $this->Mglobals->getAll("service");
		$data['service_content'] = $this->Mglobals->getAll("service_content");
		$data['barang'] = $this->Mglobals->getAll("barang");
		$data['contact'] = $this->Mglobals->getAll("contact");
		$data['slider'] = $this->Mglobals->getAll("slider");
		$data['sale'] = $this->Mglobals->getAll("sale");
		$data['testimoni'] = $this->Mglobals->getAll("testimoni");
		$data['event'] = $this->Mglobals->getAll("event");
		$data['event_content'] = $this->Mglobals->getAll("event_content");
		$this->load->view('home', $data);
	}

}
