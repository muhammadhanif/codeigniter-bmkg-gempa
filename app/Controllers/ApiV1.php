<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiV1 extends ResourceController
{
	private $BMKG;

	public function __construct()
	{
		$this->BMKG = model('App\Models\BMKG_v1', false);
	}

	public function gempa_m_5_terkini()
	{
		$data = $this->BMKG->get_gempa_m_5_terkini();

		return $this->respond($data);
	}

	public function gempa_m_5()
	{
		$data = $this->BMKG->get_gempa_m_5();

		return $this->respond($data);
	}

	public function gempa_dirasakan()
	{
		$data = $this->BMKG->get_gempa_dirasakan();

		return $this->respond($data);
	}

	public function gempa_tsunami_terkini()
	{
		$data = $this->BMKG->get_gempa_tsunami_terkini();

		return $this->respond($data);
	}
}
