<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiV1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('BMKG_v1');
    }

    public function gempa_m_5_terkini()
    {
        return $this->BMKG_v1->get_gempa_m_5_terkini();
    }

    public function gempa_m_5()
    {
        return $this->BMKG_v1->get_gempa_m_5();
    }

    public function gempa_dirasakan()
    {
        return $this->BMKG_v1->get_gempa_dirasakan();
    }

    public function gempa_tsunami_terkini()
    {
        return $this->BMKG_v1->get_gempa_tsunami_terkini();
    }
}
