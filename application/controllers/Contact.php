<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
    public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }
    public function index()
	{
        $id['tittle'] = "contact";
        $data = $this->Mglobals->get_by_id("contact",$id);

		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('contact/index',$data);
        $this->load->view('footer');
    }
    public function ajax_edit() {
            $id = "contact";
            $data = array(
                'tittle' => $this->input->post('tittle'),
                'subtittle' => $this->input->post('subtittle'),
                'location' => $this->input->post('location'),
                'phone' => $this->input->post('phone'),
                'email' => $this->input->post('email'),
                'facebook' => $this->input->post('facebook'),
                'twitter' => $this->input->post('twitter'),
                'instagram' => $this->input->post('instagram')
            );
            $condition['tittle'] = $id;
            $update = $this->Mglobals->update("contact",$data, $condition);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
        echo json_encode(array("status" => $status));
    }
}
