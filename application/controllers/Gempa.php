<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gempa extends CI_Controller
{
    private $api_version;

    public function __construct()
    {
        parent::__construct();

        $this->api_version = "v1";
    }

    public function m_5_terkini()
    {
        $data['api_version'] = $this->api_version;
        $this->load->view('gempa/m5_terkini', $data);
    }

    public function m_5()
    {
        $data['api_version'] = $this->api_version;
        $this->load->view('gempa/m5', $data);
    }

    public function dirasakan()
    {
        $data['api_version'] = $this->api_version;
        $this->load->view('gempa/dirasakan', $data);
    }

    public function api_endpoint()
    {
        $data['api_version'] = $this->api_version;
        $this->load->view('gempa/api', $data);
    }
}
