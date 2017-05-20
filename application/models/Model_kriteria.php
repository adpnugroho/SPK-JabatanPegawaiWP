<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Model_kriteria extends CI_Model {

    function edit($data) {
        $check = $this->db->set($data)->where('id_kriteria', $data['id_kriteria'])->update('tbl_kriteria');
        if ($check) {
            $jumlah = $this->db->select('sum(bobot_kriteria) as total')->from('tbl_kriteria')->get()->row();
            $total = $jumlah->total;
            $kriteria = $this->db->select('*')->from('tbl_kriteria')->get()->result_array();
            for ($no=0; $no < count($kriteria); $no++) {
                $update = array(
                    'hasil_bobot' => $kriteria[$no]['bobot_kriteria'] / $total
                );
                $check_bobot = $this->db->set($update)->where('id_kriteria', $kriteria[$no]['id_kriteria'])->update('tbl_kriteria');
                if ($check_bobot) {
                    $boolean = TRUE;
                } else {
                    $boolean = FALSE;
                }
            }
            if ($boolean) {
                $response = array('status' => 'info','message' => 'Bobot Telah Disimpan');
                return json_encode($response);
            } else {
                $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
                return json_encode($response);
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Telah Terjadi kesalahan');
            return json_encode($response);
        }
    }

    function dataKriteria() {
        return $this->db->select('*')->from('tbl_kriteria')->get()->result();
    }

}
