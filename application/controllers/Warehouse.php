<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warehouse extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('WarehouseModel');
        $this->load->model('AuthModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function view_dashboard()
    {
        $data = [
            'title' => 'Warehouse',
            'data_material' => $this->WarehouseModel->get_data_material(),
        ];
        $this->template->load('layout/template', 'Warehouse/dashboard', $data);
    }

    public function material_detail()
    {
        $materialID = $this->input->get('materialID');
        $data = [
            'title' => 'Material Detail',
            'data_material' => $this->WarehouseModel->data_material($materialID),
            'data_material_detail' => $this->WarehouseModel->data_material_detail($materialID)
        ];
        return $this->template->load('layout/template', 'warehouse/material_detail', $data);
    }

    public function approval_menyeluruh()
    {
        $getID = $this->input->get('materialID');
        $data = [
            'status' => 1,
            'approved_date' => date('Y-m-d'),
            'approved_by' => $this->session->username,
        ];

        $pesan = $this->WarehouseModel->approval_data_menyeluruh($getID, $data);

        $data_history = [
            'userid' => $this->session->username,
            'material_number' => $getID,
            'action' => 'Melakukan approval material',
            'before_qty' => 0,
            'after_qty' => 0,
            'status' => 1,
            'remark' => null,
            'date_time' => date('Y-m-d'),
        ];
        $this->db->insert('tbl_history', $data_history);

        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }

    public function reject_menyeluruh()
    {
        $getID = $this->input->post('material_number');
        $data1 = [
            'remark' => $this->input->post('remark'),
            'status' => 2,
            'approved_date' => date('Y-m-d'),
            'approved_by' => $this->session->username,
        ];

        $data2 = [
            'status' => 2,
            'approved_date' => date('Y-m-d'),
            'approved_by' => $this->session->username,
        ];

        $data_history = [
            'userid' => $this->session->username,
            'material_number' => $getID,
            'action' => 'Melakukan reject material',
            'before_qty' => 0,
            'after_qty' => 0,
            'status' => 2,
            'remark' => $this->input->post('remark'),
            'date_time' => date('Y-m-d')
        ];
        $this->db->insert('tbl_history', $data_history);

        $pesan = $this->WarehouseModel->reject_data_menyeluruh($getID, $data1, $data2);
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }

    // public function delete()
    // {
    //     $getID = $this->input->get('id');
    //     $pesan = $this->WarehouseModel->delete_data($getID);
    //     $this->session->set_flashdata('pesan', $pesan);
    //     return redirect('warehouse/view_dashboard');
    // }


    public function edit_material_before_approve()
    {
        $getID = $this->input->post('id');
        $getMaterialNumber = $this->input->post('material_number');
        $material_name = $this->input->post('material_name');
        $data = [
            'requested_quantity' => $this->input->post('requested_quantity'),
            'description_usage' => $this->input->post('description_usage'),
            'updated_date' => date('Y-m-d'),
            'updated_by' => $this->session->username,
        ];

        $data_history = [
            'userid' => $this->session->username,
            'material_number' => $getMaterialNumber,
            'action' => 'Melakukan ubah material' . ' ' . $material_name,
            'before_qty' => 0,
            'after_qty' => $this->input->post('requested_quantity'),
            'status' => 0,
            'remark' => null,
            'date_time' => date('Y-m-d')
        ];
        $this->db->insert('tbl_history', $data_history);

        $pesan = $this->WarehouseModel->update_data_before_approve($getID, $data);
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }
}
