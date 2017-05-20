<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Alternatif extends CI_Controller{
    function __construct() {
        parent::__construct();
        $this->load->model('Model_alternatif');
    }
    function index(){
        $this->load->view('Alternatif');
    }
    function addAlternatif(){
        if($_POST){
            $data['nama_pegawai'] = $this->input->post('nama');
            $return = $this->Model_alternatif->add($data);
            echo $return;
        }else{
            redirect(base_url('Dashboard'));
        }
    }
    function editAlternatif(){
        if($_POST){
            $data = array('id_pegawai'=>$this->input->post('id'),'nama_pegawai'=>$this->input->post('nama'));
            $return = $this->Model_alternatif->edit($data);
            echo $return;
        }else{
            redirect(base_url('Dashboard'));
        }
    }
    function hapusAlternatif(){
        if($_POST){
            $data['id']=$this->input->post('id');
            $return = $this->Model_alternatif->hapus($data);
            echo $return;
        }else{
            redirect(base_url('Dashboard'));
        }
    }
    function lihatAlternatif(){
        $return = $this->Model_alternatif->view();
        echo json_encode($return);
    }
}
