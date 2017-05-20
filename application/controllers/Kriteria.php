<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Kriteria extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_kriteria');
    }
    function index(){
        $this->load->view('Kriteria');
    }
    function editBobot(){
        if($_POST){
            $data = array(
                'id_kriteria'=>$this->input->post('id_kriteria'),
                'nama_kriteria'=>$this->input->post('nama_kriteria'),
                'bobot_kriteria'=>$this->input->post('bobot_kriteria')
            );
            $return = $this->Model_kriteria->edit($data);
            echo $return;
        }else{
            redirect(base_url('dashboard'));
        }
    }
    function lihatKriteria(){
        $return = $this->Model_kriteria->dataKriteria();
        echo json_encode($return);
    }
}