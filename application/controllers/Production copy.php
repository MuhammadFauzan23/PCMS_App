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
			'title' => 'Production Page',
			'data_material' => $this->ProductionModel->get_data_material(),
		];
		return $this->template->load('layout/template', 'production/dashboard', $data);
	}

	public function temporary()
	{
		$data = [
			'title' => 'Temporary Page',
			'data_material_detail' => $this->ProductionModel->get_data(),
			'terakhir' => $this->ProductionModel->get_last_num()->result(),
		];
		return $this->template->load('layout/template', 'production/temporary_detail', $data);
	}

	public function save()
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
		// var_dump($number);
		// die();
		// $material_number = $this->input->post('no_material');

		$data = [
			'material_number' => $number,
			'userID' => $this->session->id,
			'status' => '0',
			'datetime' => date('Y-m-d'),
		];
		$this->db->insert('tbl_material', $data);

		$this->db->query("INSERT INTO tbl_material_detail (material_number, material_name, requested_quantity, description_usage, created_date, created_by) 
		SELECT " . $number . ",material_name, requested_quantity, description_usage, created_date, created_by
			FROM tbl_temporary");
		$this->db->truncate('tbl_temporary');

		$pesan = [
			'stts' => true,
			'msg'  => 'Data berhasil simpan....!',
		];
		$this->session->set_flashdata('pesan', $pesan);
		return redirect('production/view_dashboard');
	}
}
