<?php
defined('BASEPATH') or exit('No direct script access allowed');

class HistoryModel extends CI_Model
{
    function get_data_history()
    {
        return $this->db->query("SELECT tbl_history.*, tbl_user.username FROM tbl_history 	
        JOIN tbl_material ON tbl_history.material_number = tbl_material.material_number 
        JOIN tbl_user ON tbl_history.userID = tbl_user.username")->result();
    }

    function filtering_data($start, $end)
    {
        $query = "SELECT tbl_history.*, tbl_user.username FROM tbl_history 	
        JOIN tbl_material ON tbl_history.material_number = tbl_material.material_number 
        JOIN tbl_user ON tbl_history.userID = tbl_user.username WHERE tbl_history.date_time BETWEEN '$start' AND '$end'
	 ";
        return $this->db->query($query)->result();
    }

    function getListHistory($postData = null)
    {
        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        ## Search 
        $searchQuery = "";
        if ($searchValue != '') {
            $searchQuery = " (material_number like '%" . $searchValue . "%' ) ";
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $records = $this->db->get('tbl_history')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $records = $this->db->get('tbl_history')->result();
        $totalRecordwithFilter = $records[0]->allcount;


        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('material_number', $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $records = $this->db->get('tbl_history')->result();

        $data = array();
        $count = 1;
        foreach ($records as $record) {


            if ($record->status == '0') {
                $status = '<td class="text-center"><button class="btn btn-sm btn-warning">Waiting Approval</button></td>';
            } elseif ($record->status == 1) {
                $status = '<td class="text-center"><button class="btn btn-sm btn-success">Approved</button></td>';
            } elseif ($record->status == 2) {
                $status = '<td class="text-center"><button class="btn btn-sm btn-danger">Reject</button></td>';
            }

            $data[] = array(
                "nomor" => $count++,
                "material_number" => $record->material_number,
                "userid" => $record->userid,
                "action" => $record->action,
                "before_qty" => $record->before_qty,
                "after_qty" => $record->after_qty,
                "status" => $status,
                "remark" => $record->remark,
                "date_time" => $record->date_time,
            );
        }

        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
}
