<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ApiV1 extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('BMKG_v1');
    }

    public function gempaM5Terkini()
    {
        return $this->BMKG_v1->getGempaM5Terkini();
    }

    public function gempaM5()
    {
        return $this->BMKG_v1->getGempaM5();
    }

    public function gempaDirasakan()
    {
        return $this->BMKG_v1->getGempaDirasakan();
    }

    public function gempaTsunamiTerkini()
    {
        return $this->BMKG_v1->getGempaTsunamiTerkini();
    }
}
