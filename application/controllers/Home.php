<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }
	public function index()
	{

		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('content');
        $this->load->view('footer');
	}

}
