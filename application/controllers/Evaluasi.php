<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Evaluasi extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_alternatif');
        $this->load->model('Model_kriteria');
    }
    function Index(){
        $data['alternatif'] = $this->Model_alternatif->select();
        $this->load->view('Evaluasi',$data);
    }
    function calculate(){
        if($_POST){
            $data = array(
                'id_pegawai'=>$this->input->post('id_pegawai'),
                'nama_pegawai'=>$this->input->post('nama_pegawai'),
                'ujian'=>$this->input->post('ujian'),
                'prestasi'=>$this->input->post('prestasi'),
                'lama'=>$this->input->post('lama'),
                'kedisiplinan'=>$this->input->post('kedisiplinan'),
                'pendidikan'=>$this->input->post('pendidikan')
            );
            $return = $this->Model_alternatif->WeightedProduct($data);
            echo json_encode($return);
        }else{
            redirect(base_url('dashboard'));
        }
    }
}