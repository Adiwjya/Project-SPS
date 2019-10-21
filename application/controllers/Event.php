<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }

	public function index()
	{
        $id['id'] = "E00001";
        $data = $this->Mglobals->get_by_id("event",$id);
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('event/index',$data);
        $this->load->view('footer');
	}

	public function ajax_list(){
		$data = array();
        $list = $this->Mglobals->getAll("event_content");
        foreach ($list->result() as $row) {
            $val = array();
            $val[] = '<img src="'.$row->img.'" class="img-thumbnail">';
            $val[] = $row->tittle;
            $val[] = $row->subtittle;
            $val[] = $row->tgl;
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->id."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;'
                    . '<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$row->id."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
                    . '</div>';
            $data[] = $val; 
        }
        $output = array("data" => $data);
        echo json_encode($output);
	}

    public function ajax_add() {
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
                $status = $this->simpanfoto($config);
            }
        }else{
            $status = "File not exits";
        }
        echo json_encode(array("status" => $status));
    }
    
    private function simpanfoto($config) {
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('file')) {
            $datafile = $this->upload->data();
            $path = $config['upload_path'].$datafile['file_name'];
            $newpath = $config['upload_newpath'].$datafile['file_name'];

            $resize_foto = $this->resizeImage($path, $newpath);
            if($resize_foto){
                $data = array(
                    'id' => $this->modul->autokode1('EV','id','event_content','2','7'),
                    'tittle' => $this->input->post('content_tittle'),
                    'subtittle' => $this->input->post('content_subtittle'),
                    'tgl' => $this->input->post('tgl'),
                    'img' => $newpath
                );
                $simpan = $this->Mglobals->add("event_content",$data);
                if($simpan == 1){
                    unlink($path);
                    $status = "Data tersimpan";
                }else{
                    $status = "Data gagal tersimpan";
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
            'width' =>  360,
            'height' => 243
        );
        $this->load->library('image_lib', $config_manip);
        $hasil = $this->image_lib->resize();
        $this->image_lib->clear();
        return $hasil;
   }

    public function hapus(){
        $kond['id'] = $this->uri->segment(3);
        $hapus = $this->Mglobals->delete("event_content", $kond);
        if($hapus == 1){
            $status = "Data terhapus";
        }else{
            $status = "Data gagal terhapus";
        }
        echo json_encode(array("status" => $status));
    }
    
    
    public function ganti(){
            $id['id'] = $this->uri->segment(3);
            $data = $this->Mglobals->get_by_id("event_content",$id);
            echo json_encode($data);
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
                $id = $this->input->post('content_id');
            $data = array(
                    'tittle' => $this->input->post('content_tittle'),
                    'subtittle' => $this->input->post('content_subtittle'),
                    'tgl' => $this->input->post('tgl'),
                    'img' => $newpath
            );
            $condition['id'] = $id;
            $simpan = $this->Mglobals->update("event_content",$data, $condition);
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

    public function ajax_edit2() {
        $id = $this->input->post('id');
            $data = array(
                'tittle' => $this->input->post('tittle'),
                'subtittle' => $this->input->post('subtittle')
            );
            $condition['id'] = $id;
            $update = $this->Mglobals->update("event",$data, $condition);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
        echo json_encode(array("status" => $status));
    }
}
