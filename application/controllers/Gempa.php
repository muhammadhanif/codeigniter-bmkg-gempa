<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gempa extends CI_Controller
{

    public function index()
    {
        $data['api_version'] = 'api/v1';
        $this->load->view('gempa/m5_terkini', $data);
    }

    public function m5()
    {
        $data['api_version'] = 'api/v1';
        $this->load->view('gempa/m5', $data);
    }

    public function dirasakan()
    {
        $data['api_version'] = 'api/v1';
        $this->load->view('gempa/dirasakan', $data);
    }

    public function api()
    {
        $data['api_version'] = 'api/v1';
        $this->load->view('gempa/api', $data);
    }
}
