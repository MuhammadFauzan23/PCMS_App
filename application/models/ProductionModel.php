<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductionModel extends CI_Model
{
    function get_data_material()
    {
        return $this->db->query("SELECT * FROM tbl_material")->result();
    }

    // function getMaterialList($postData = null)
    // {
    //     $response = array();

    //     ## Read value
    //     $draw = $postData['draw'];
    //     $start = $postData['start'];
    //     $rowperpage = $postData['length']; // Rows display per page
    //     $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
    //     $searchValue = $postData['search']['value']; // Search value

    //     ## Search 
    //     $searchQuery = "";
    //     if ($searchValue != '') {
    //         $searchQuery = " (material_number like '%" . $searchValue . "%' ) ";
    //     }

    //     ## Total number of records without filtering
    //     $this->db->select('count(*) as allcount');
    //     $records = $this->db->get('tbl_material')->result();
    //     $totalRecords = $records[0]->allcount;

    //     ## Total number of record with filtering
    //     $this->db->select('count(*) as allcount');
    //     if ($searchQuery != '')
    //         $this->db->where($searchQuery);
    //     $records = $this->db->get('tbl_material')->result();
    //     $totalRecordwithFilter = $records[0]->allcount;


    //     ## Fetch records
    //     $this->db->select('*');
    //     if ($searchQuery != '')
    //         $this->db->where($searchQuery);
    //     $this->db->order_by('material_number', $columnSortOrder);
    //     $this->db->limit($rowperpage, $start);
    //     $records = $this->db->get('tbl_material')->result();

    //     $data = array();
    //     $count = 1;
    //     foreach ($records as $record) {

    //         if ($record->status == '0') {
    //             $status = '<td class="text-center"><button class="btn btn-sm btn-warning">Waiting Approval</button></td>';
    //         } elseif ($record->status == 1) {
    //             $status = '<td class="text-center"><button class="btn btn-sm btn-success">Approved</button></td>';
    //         } elseif ($record->status == 2) {
    //             $status = '<td class="text-center"><button class="btn btn-sm btn-danger">Reject</button></td>';
    //         }

    //         $data[] = array(
    //             "nomor" => $count++,
    //             "material_number" => $record->material_number,
    //             "status" => $status,
    //             "remark" => $record->remark,
    //             "datetime" => $record->datetime,
    //         );
    //     }

    //     ## Response
    //     $response = array(
    //         "draw" => intval($draw),
    //         "iTotalRecords" => $totalRecords,
    //         "iTotalDisplayRecords" => $totalRecordwithFilter,
    //         "aaData" => $data
    //     );

    //     return $response;
    // }

    function get_data_temporary()
    {
        return $this->db->query("SELECT * FROM tbl_temporary")->result();
    }

    public function get_last_num()
    {
        $this->db->select('MAX(material_number) + 1 AS last_number');
        $this->db->from('tbl_material');
        $this->db->order_by('material_number', 'DESC');
        return $this->db->get();
    }

    function insert_data_temporary($data)
    {
        $this->db->insert('tbl_temporary', $data);
        $pesan = [
            'stts' => true,
            'msg'  => 'Data berhasil ditambah....!',
        ];
        return $pesan;
    }

    function update_data_temporary($getID, $data)
    {
        $this->db->update('tbl_temporary', $data, array('id' => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data berhasil diubah....!',
        ];
        return $pesan;
    }

    function delete_data_temporary($getID)
    {
        $this->db->delete('tbl_temporary', array("id" => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data berhasil dihapus....!',
        ];
        return $pesan;
    }

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

    function update_data_edit_after_reject($getMatNum, $getID, $data1, $data2)
    {
        $this->db->update('tbl_material', $data1, array('material_number' => $getMatNum));
        $this->db->update('tbl_material_detail', $data2, array('id' => $getID));
        $pesan = [
            'stts' => true,
            'msg'  => 'Data berhasil diubah....!',
        ];
        return $pesan;
    }
}
