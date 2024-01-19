<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthModel extends CI_Model
{
    function login_1($username, $password)
    {
        $data = [
            'username' => $username,
            'password' => $password
        ];
        return $this->db->get_where('tbl_user', $data)->row_array();
    }
}
