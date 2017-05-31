<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_alternatif extends CI_Model {

    function add($data) {
        $execute = $this->db->insert('tbl_pegawai', $data);
        if ($execute) {
            $response = array('status' => 'success', 'message' => 'Data Alternatif Berhasil Di Input');
            return json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Data Alternatif Gagal Di Input, Hubungi Developer!');
            return json_encode($response);
        }
    }

    function edit($data) {
        $check = $this->db->set($data)->where('id_pegawai', $data['id_pegawai'])->update('tbl_pegawai');
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Alternatif Pegawai Berhasil Di Edit'
            );
            return json_encode($response);
            //Jika Gagal Mengupdate Data
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }

    function hapus($data) {
        $check = $this->db->delete('tbl_pegawai',array('id_pegawai'=>$data['id']));
        if ($check) {
            //Pesan Response
            $response = array(
                'status' => 'success',
                'message' => 'Data Alternatif Pegawai Berhasil Di Edit'
            );
            return json_encode($response);
            //Jika Gagal Mengupdate Data
        } else {
            //Pesan Response
            $response = array(
                'status' => 'error',
                'message' => 'Telah Terjadi kesalahan'
            );
            return json_encode($response);
        }
    }

    function view() {
        $response = $this->db->select('*')->from('tbl_pegawai')->get()->result();
        return $response;
    }
    
    function select(){
        return $this->db->select('*')->from('tbl_pegawai')->get()->result();
    }
    
    function WeightedProduct($data){
        $data_wp = array();
        $bobot_kriteria = array();
        $bobot = $this->db->select('*')->from('tbl_kriteria')->get()->result();
        foreach($bobot as $row){
            $bobot_kriteria[$row->id_kriteria]=$row->hasil_bobot;
        }
        for($x=0;$x<count($data['id_pegawai']);$x++){
            $data_wp[$x]['id_pegawai']=$data['id_pegawai'][$x];
            $data_wp[$x]['nama_pegawai']=$data['nama_pegawai'][$x];
            $data_wp[$x]['vektor_s']= pow($data['ujian'][$x],$bobot_kriteria[1])+pow($data['prestasi'][$x],$bobot_kriteria[2])+pow($data['lama'][$x],$bobot_kriteria[3])+pow($data['kedisiplinan'][$x],$bobot_kriteria[4])+pow($data['pendidikan'][$x],$bobot_kriteria[5]);
        }
        $total = 0;
        for($y=0;$y<count($data_wp);$y++){
            $total = $total + $data_wp[$y]['vektor_s'];
        }
        for($x=0;$x<count($data_wp);$x++){
            $data_wp[$x]['vektor_v']=$data_wp[$x]['vektor_s']/$total;
        }
        usort($data_wp, function($a, $b) {
            if ($a['vektor_v'] == $b['vektor_v'])
                return 0;
            return $a['vektor_v'] < $b['vektor_v'] ? 1 : -1;
        });
        return $data_wp;
    }

}
