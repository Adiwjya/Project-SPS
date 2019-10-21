<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }

	public function index()
	{
		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('barang/index');
        $this->load->view('footer');
	}

	public function ajax_list(){
		$data = array();
        $list = $this->Mglobals->getAll("barang");
        foreach ($list->result() as $row) {
            $val = array();
            $val[] = $row->idbarang;
            $val[] = $row->nama;
            $val[] = $row->stok;
            $val[] = number_format($row->harga);
            $val[] = $row->deskripsi;
            $val[] = '<img src="'.$row->gambar.'" class="img-thumbnail">';
            $val[] = '<div style="text-align: center;">'
                    . '<a class="btn btn-xs btn-primary" href="javascript:void(0)" title="Edit" onclick="ganti('."'".$row->idbarang."'".')"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;'
                    . '<a class="btn btn-xs btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus('."'".$row->idbarang."'".','."'".$row->nama."'".')"><i class="glyphicon glyphicon-trash"></i> Delete</a>'
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
        $config['max_size'] = '1024'; //1 MB

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
                    'idbarang' => $this->modul->autokode1('B','idbarang','barang','2','7'),
                    'nama' => $this->input->post('nama'),
                    'stok' => $this->input->post('stok'),
                    'harga' => $this->input->post('harga'),
                    'deskripsi' => $this->input->post('deskripsi'),
                    'gambar' => $newpath
                );
                $simpan = $this->Mglobals->add("barang",$data);
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
            'width' => 600,
            'height' => 480
        );
        $this->load->library('image_lib', $config_manip);
        $hasil = $this->image_lib->resize();
        $this->image_lib->clear();
        return $hasil;
   }

    public function hapus(){
        $kond['idbarang'] = $this->uri->segment(3);
        $hapus = $this->Mglobals->delete("barang", $kond);
        if($hapus == 1){
            $status = "Data terhapus";
        }else{
            $status = "Data gagal terhapus";
        }
        echo json_encode(array("status" => $status));
    }
    
    
    public function ganti(){
            $id['idbarang'] = $this->uri->segment(3);
            $data = $this->Mglobals->get_by_id("barang",$id);
            echo json_encode($data);
    }
    public function ajax_edit() {
        $config['upload_path'] = './assets/temp/';
        $config['upload_newpath'] = './assets/foto/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_filename'] = '255';
        $config['encrypt_name'] = TRUE;
        $config['max_size'] = '1024'; //1 MB

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
                $id = $this->input->post('id');
            $data = array(
                'idbarang' => $this->input->post('id'),
                'nama' => $this->input->post('nama'),
                'stok' => $this->input->post('stok'),
                'harga' => $this->input->post('harga'),
                'deskripsi' => $this->input->post('deskripsi'),
                'gambar' => $newpath
            );
            $condition['idbarang'] = $id;
            $simpan = $this->Mglobals->update("barang",$data, $condition);
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
}
