<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Production extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('ProductionModel');
		$this->load->model('AuthModel');
		$this->load->helper(array('form', 'url'));
		$this->load->library('form_validation');
	}

	public function view_dashboard()
	{
		$data = [
			'title' => 'Material',
			'data_material' => $this->ProductionModel->get_data_material(),
		];
		return $this->template->load('layout/template', 'production/material', $data);
	}
	// public function matList()
	// {
	// 	// POST data
	// 	$postData = $this->input->post();
	// 	// Get data
	// 	$data = $this->ProductionModel->getMaterialList($postData);

	// 	echo json_encode($data);
	// }

	public function temporary()
	{
		$data = [
			'title' => 'Temporary',
			'data_material_temporary' => $this->ProductionModel->get_data_temporary(),
			'terakhir' => $this->ProductionModel->get_last_num()->result(),
		];
		return $this->template->load('layout/template', 'production/temporary_detail', $data);
	}

	public function save_temporary()
	{
		$data = [
			'material_name' => $this->input->post('material_name'),
			'requested_quantity' => $this->input->post('requested_quantity'),
			'description_usage' => $this->input->post('description_usage'),
			'created_date' => $this->input->post('created_date'),
			'created_by' => $this->session->username,
		];
		$pesan = $this->ProductionModel->insert_data_temporary($data);
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/temporary');
	}

	public function edit_temporary()
	{
		$getID = $this->input->post('id');
		$data = [
			'material_name' => $this->input->post('material_name'),
			'requested_quantity' => $this->input->post('requested_quantity'),
			'description_usage' => $this->input->post('description_usage'),
			'updated_date' => $this->input->post('updated_date'),
			'updated_by' => $this->session->username,
		];

		$pesan = $this->ProductionModel->update_data_temporary($getID, $data);
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/temporary');
	}

	public function delete_temporary()
	{
		$getID = $this->input->get('id');
		$pesan = $this->ProductionModel->delete_data_temporary($getID);
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/temporary');
	}

	public function transferdata()
	{
		$getlastNumber = $this->db->query('SELECT MAX(material_number) + 1 AS last_number FROM tbl_material ORDER BY material_number DESC')->row_array();
		if (is_null($getlastNumber['last_number'])) {
			$number = 1;
		} else {
			$number = $getlastNumber['last_number'];
		}

		$data = [
			'material_number' => $number,
			'userID' => $this->session->username,
			'status' => '0',
			'datetime' => date('Y-m-d'),
		];
		$this->db->insert('tbl_material', $data);

		$this->db->query("INSERT INTO tbl_material_detail (material_number, material_name, requested_quantity, description_usage, created_date, created_by) 
		SELECT " . $number . ",material_name, requested_quantity, description_usage, created_date, created_by
			FROM tbl_temporary");
		$this->db->truncate('tbl_temporary');

		$data_history = [
			'userid' => $this->session->username,
			'material_number' => $number,
			'action' => 'Menambahkan request material',
			'before_qty' => 0,
			'after_qty' => 0,
			'status' => 0,
			'remark' => null,
			'date_time' => date('Y-m-d'),
		];
		$this->db->insert('tbl_history', $data_history);

		$pesan = [
			'stts' => true,
			'msg'  => 'Data berhasil simpan....!',
		];
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/view_dashboard');
	}

	public function view_material_detail()
	{
		$materialID = $this->input->get('materialID');
		$data = [
			'title' => 'Material Detail',
			'data_material' => $this->ProductionModel->data_material($materialID),
			'data_material_detail' => $this->ProductionModel->data_material_detail($materialID)
		];
		return $this->template->load('layout/template', 'production/material_detail', $data);
	}

	public function edit_after_reject()
	{
		$getMatNum = $this->input->post('material_number');
		$getID = $this->input->post('id');
		$data1 = [
			'status' => 0,
		];
		$data2 = [
			'status' => 0,
			// 'material_name' => $this->input->post('material_name'),
			'requested_quantity' => $this->input->post('requested_quantity'),
			'description_usage' => $this->input->post('description_usage'),
			'updated_date' => date('Y-m-d'),
			'updated_by' => $this->session->username,
		];

		$material_name = $this->input->post('material_name');
		$old = $this->input->post('requested_quantity2');
		$new = $this->input->post('requested_quantity');
		if ($old == $new) {
			$qty = 0;
			$qty1 = 0;
		} else {
			$qty = $this->input->post('requested_quantity2');
			$qty1 = $this->input->post('requested_quantity');
		}

		$data_history = [
			'userid' => $this->session->username,
			'material_number' => $getMatNum,
			'action' => 'Melakukan ubah material' . ' ' . $material_name,
			'before_qty' => $qty,
			'after_qty' => $qty1,
			'status' => 0,
			'remark' => null,
			'date_time' => date('Y-m-d'),
		];
		$this->db->insert('tbl_history', $data_history);

		$pesan = $this->ProductionModel->update_data_edit_after_reject($getMatNum, $getID, $data1, $data2);
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/view_dashboard');
	}
}
