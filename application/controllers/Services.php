<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

	public function __construct() {
	    parent::__construct();
	    $this->load->model('Mglobals');
	    $this->load->library('Modul');
    }

	public function index()
	{
        $id['tittle'] = "service";
        $data = $this->Mglobals->get_by_id("service",$id);

		$this->load->view('header');
        $this->load->view('menu');
        $this->load->view('service/index',$data);
        $this->load->view('footer');
	}

	public function ajax_list(){
		$data = array();
        $list = $this->Mglobals->getAll("service_content");
        foreach ($list->result() as $row) {
            $val = array();
            $val[] = $row->item_tittle;
            $val[] = $row->item_subtittle;
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
            $data = array(
                'id' => $this->modul->autokode1('C','id','service_content','2','7'),
                'item_tittle' => $this->input->post('item_tittle'),
                'item_subtittle' => $this->input->post('item_subtittle')
            );
            $update = $this->Mglobals->add("service_content",$data);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
        echo json_encode(array("status" => $status));
    }
    

    public function hapus(){
        $kond['id'] = $this->uri->segment(3);
        $hapus = $this->Mglobals->delete("service_content", $kond);
        if($hapus == 1){
            $status = "Data terhapus";
        }else{
            $status = "Data gagal terhapus";
        }
        echo json_encode(array("status" => $status));
    }
    
    
    public function ganti(){
            $id['id'] = $this->uri->segment(3);
            $data = $this->Mglobals->get_by_id("service_content",$id);
            echo json_encode($data);
    }
    public function ajax_edit() {
        $id = $this->input->post('id');
            $data = array(
                'item_tittle' => $this->input->post('item_tittle'),
                'item_subtittle' => $this->input->post('item_subtittle')
            );
            $condition['id'] = $id;
            $update = $this->Mglobals->update("service_content",$data, $condition);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
        echo json_encode(array("status" => $status));
    }

    public function ajax_edit2() {
        $id = "service";
            $data = array(
                'subtittle' => $this->input->post('subtittle')
            );
            $condition['tittle'] = $id;
            $update = $this->Mglobals->update("service",$data, $condition);
            if($update == 1){
                $status = "Data terupdate";
            }else{
                $status = "Data gagal terupdate";
            }
        echo json_encode(array("status" => $status));
    }

}
