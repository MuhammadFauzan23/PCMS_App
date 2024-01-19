<?php
defined('BASEPATH') or exit('No direct script access allowed');

class WarehouseModel extends CI_Model
{
    function get_data_material()
    {
        return $this->db->query("SELECT tbl_user.*, tbl_material.* FROM tbl_user
        JOIN tbl_material ON tbl_material.userID = tbl_user.username")->result();
    }

    // function insert_data($data)
    // {
    //     $this->db->insert_batch('tbl_material', $data);
    //     $pesan = [
    //         'stts' => true,
    //         'msg'  => 'Data berhasil ditambah....!',
    //     ];
    //     return $pesan;
    // }

    function update_data_before_approve($getID, $data)
    {
        $this->db->update('tbl_material_detail', $data, array('id' => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data berhasil diubah....!',
        ];
        return $pesan;
    }

    function approval_data_menyeluruh($getID, $data)
    {
        $this->db->update('tbl_material', $data, array('material_number' => $getID));
        $this->db->update('tbl_material_detail', $data, array('material_number' => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data material di approve....!',
        ];
        return $pesan;
    }

    function reject_data_menyeluruh($getID, $data1, $data2)
    {
        $this->db->update('tbl_material', $data1, array('material_number' => $getID));
        $this->db->update('tbl_material_detail', $data2, array('material_number' => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data material di riject....!',
        ];
        return $pesan;
    }

    // function approval_data_material($getID, $data)
    // {
    //     $this->db->update('tbl_material_detail', $data, array('id' => $getID));
    //     $pesan = [
    //         'stts' => true,
    //         'msg'  => 'Data material disetujui....!',
    //     ];
    //     return $pesan;
    // }

    // function delete_data($getID)
    // {
    //     $this->db->delete('tbl_material', array("id" => $getID));
    //     $pesan = [
    //         'stts' => true,
    //         'msg'  => 'Data berhasil dihapus....!',
    //     ];
    //     return $pesan;
    // }

    function data_material($materialID)
    {
        return $this->db->query("SELECT tbl_material.*, tbl_user.* FROM tbl_material 
            JOIN tbl_user ON tbl_user.username = tbl_material.userID  WHERE tbl_material.material_number = '$materialID'")->result();
    }

    function data_material_detail($materialID)
    {
        return $this->db->query("SELECT tbl_material_detail.* , tbl_user.id AS IDuser FROM tbl_material 
        JOIN tbl_user ON tbl_user.username = tbl_material.userID	
        JOIN tbl_material_detail ON tbl_material_detail.material_number = tbl_material.material_number WHERE tbl_material_detail.material_number = '$materialID'")->result();
    }

    // function data_material_detail($materialID)
    // {
    //     return $this->db->query("SELECT tbl_material.* , tbl_material_detail.*, tbl_user.* FROM tbl_material 
    //         JOIN tbl_user ON tbl_user.id = tbl_material.userID	
    //         JOIN tbl_material_detail ON tbl_material_detail.material_number = tbl_material.material_number WHERE tbl_material_detail.material_number = '$materialID'")->result();
    // }

}
