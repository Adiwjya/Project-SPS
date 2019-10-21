<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
    public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }

    public function index()
	{
        $id['tittle'] = "A00001";
        $data = $this->Mglobals->get_by_id("about_us",$id);

		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('about/index',$data);
        $this->load->view('footer');
    }

    public function ajax_edit() {
        $config['upload_path'] = './assets/temp/';
        $config['upload_newpath'] = './assets/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5000'; //1 MB

        if (isset($_FILES['file']['name'])) {
            if(0 < $_FILES['file']['error']) {
                $status = "Error during file upload ".$_FILES['file']['error'];
            }else{
                $status = $this->simpanfotoedit($config);
            }
        }else{
            $status = "File not exits";
        }
        echo json_encode(array("status" => $status));
    }

    private function simpanfotoedit($config) {
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $datafile = $this->upload->data();
            $path = $config['upload_path'].$datafile['file_name'];
            $newpath = $config['upload_newpath'].$datafile['file_name'];

            $resize_foto = $this->resizeImage($path, $newpath);
            if($resize_foto){
            $id = $this->input->post('tittle');
            $data = array(
                'tittle' => $this->input->post('tittle'),
                'content' => $this->input->post('content'),
                'img' => $newpath
            );
            $condition['tittle'] = $id;
            $simpan = $this->Mglobals->update("about_us",$data, $condition);
                if($simpan == 1){
                    unlink($path);
                    $status = "Data terupdate";
                }else{
                    $status = "Data gagal terupdate";
                }
            }else{
                $status = "Resize image failed";
            }
        } else {
            $status = $this->upload->display_errors();
        }
        return $status;
    }
    private function resizeImage($path, $newpath){
        $config_manip = array(
            'image_library' => 'gd2',
            'source_image' => $path,
            'new_image' => $newpath,
            'maintain_ratio' => FALSE,
            'width' => 696,
            'height' => 375
        );
        $this->load->library('image_lib', $config_manip);
        $hasil = $this->image_lib->resize();
        $this->image_lib->clear();
        return $hasil;
   }
}
