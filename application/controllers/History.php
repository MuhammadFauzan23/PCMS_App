<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ProductionModel');
        $this->load->model('AuthModel');
        $this->load->model('HistoryModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
    }

    public function history()
    {
        $data = [
            'title' => 'History',
            'data_history' => $this->HistoryModel->get_data_history(),
        ];
        return $this->template->load('layout/template', '/history', $data);
    }

    public function listHistory()
    {
        // POST data
        $postData = $this->input->post();
        // Get data
        $data = $this->HistoryModel->getListHistory($postData);
        echo json_encode($data);
    }

    public function filter()
    {
        $data = [
            'title' => 'Filter',
            'data_history' => $this->HistoryModel->get_data_history(),
        ];
        return $this->template->load('layout/template', '/filtering', $data);
    }

    public function filtering_data()
    {
        $start = $this->input->post('start_time');
        $end = $this->input->post('end_time');
        $data = [
            'data_history' =>  $this->HistoryModel->filtering_data($start, $end),
        ];
        return $this->template->load('layout/template', '/filtering', $data);
    }
}
