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
            'title' => 'Production Page',
            'data_material' => $this->WarehouseModel->get_data(),
        ];
        $this->template->load('layout/template', 'warehouse/dashboard', $data);
    }

    public function edit()
    {
        $getID = $this->input->post('id');
        $data = [
            'material_name' => $this->input->post('material_name'),
            'requested_quantity' => $this->input->post('requested_quantity'),
            'description_usage' => $this->input->post('description_usage'),
            'updated_date' => $this->input->post('updated_date'),
            'updated_by' => $this->input->post('updated_by'),
        ];

        $pesan = $this->WarehouseModel->update_data($getID, $data);
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }

    public function approval()
    {
        $getID = $this->input->post('id');
        $data = [
            'status' => $this->input->post('status'),
            'description_additional' => $this->input->post('description_additional'),
            'approved_date' => $this->input->post('approved_date'),
            'approved_by' => $this->input->post('approved_by'),
        ];

        $pesan = $this->WarehouseModel->approval_data($getID, $data);
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }

    public function delete()
    {
        $getID = $this->input->get('id');
        $pesan = $this->WarehouseModel->delete_data($getID);
        $this->session->set_flashdata('pesan', $pesan);
        return redirect('warehouse/view_dashboard');
    }
}
