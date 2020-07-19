<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gempa extends CI_Controller
{

    public function index()
    {
        $this->load->view('gempa/terkini');
    }

    public function m5()
    {
        $this->load->view('gempa/m5');
    }

    public function dirasakan()
    {
        $this->load->view('gempa/dirasakan');
    }

    public function api()
    {
        $this->load->view('gempa/api');
    }
}
