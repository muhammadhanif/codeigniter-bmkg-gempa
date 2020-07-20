<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class ApiV1 extends ResourceController
{
	private $_BMKG;

	public function __construct()
	{
		$this->_BMKG = model('App\Models\BMKG_v1', false);
	}

	public function gempaM5Terkini()
	{
		$data = $this->_BMKG->getGempaM5Terkini();

		return $this->respond($data);
	}

	public function gempaM5()
	{
		$data = $this->_BMKG->getGempaM5();

		return $this->respond($data);
	}

	public function gempaDirasakan()
	{
		$data = $this->_BMKG->getGempaDirasakan();

		return $this->respond($data);
	}

	public function gempaTsunamiTerkini()
	{
		$data = $this->_BMKG->getGempaTsunamiTerkini();

		return $this->respond($data);
	}
}
