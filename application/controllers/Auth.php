<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('AuthModel');
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->library('session');
    }


    public function view_login()
    {
        $data = ['title' => 'Login Page'];
        $this->load->view('login', $data);
    }

    public function dashboard_general()
    {
        $data = ['title' => 'Dashboard'];
        return $this->template->load('layout/template', '/dashboard', $data);
    }

    public function proses_login()
    {
        $username = $this->input->post('username');
        $password = sha1($this->input->post('password'));
        $cek = $this->AuthModel->login_1($username, $password);

        if ($cek) {
            if ($cek['is_active'] == 1) {
                $this->session->set_userdata('id', $cek['id']);
                $this->session->set_userdata('fullname', $cek['fullname']);
                $this->session->set_userdata('username', $cek['username']);
                $this->session->set_userdata('password', $cek['password']);
                $this->session->set_userdata('is_Active', $cek['is_Active']);
                $this->session->set_userdata('role', $cek['role']);
                $pesan = [
                    'stts' => true,
                    'msg' => 'Selamat datang di MPS App!'
                ];
                $this->session->set_flashdata('pesan', $pesan);
                return redirect('Auth/dashboard_general');
            } elseif ($cek['is_active'] == 0) {
                $pesan = [
                    'stts' => false,
                    'msg' => 'Akun anda sudah ditutup!'
                ];
                $this->session->set_flashdata('pesan', $pesan);
                return redirect('auth/view_login');
            }
        } else {
            $pesan = [
                'stts' => false,
                'msg' => 'Username atau password anda salah!'
            ];
            $this->session->set_flashdata('pesan', $pesan);
            return redirect('auth/view_login');
        }
    }

    function logout()
    {
        // $this->session->sess_destroy('fullname');
        // $this->session->sess_destroy('username');
        // $this->session->sess_destroy('password');
        // $this->session->sess_destroy('role');
        // $this->session->sess_destroy('is_active');

        session_destroy();
        $pesan = [
            'stts' => true,
            'msg' => 'Terima kasih!'
        ];
        $this->session->set_flashdata('pesan', $pesan);
        $data = ['title' => 'Login Page'];
        return redirect('Auth/view_login');
    }
}
