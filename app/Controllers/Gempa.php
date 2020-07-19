<?php

namespace App\Controllers;

class Gempa extends BaseController
{
	private $api_version;

	public function __construct()
	{
		$this->api_version = "v1";
	}

	public function m_5_terkini()
	{
		$data['api_version'] = $this->api_version;

		return view('gempa/m_5_terkini', $data);
	}

	public function m_5()
	{
		$data['api_version'] = $this->api_version;

		return view('gempa/m_5', $data);
	}

	public function dirasakan()
	{
		$data['api_version'] = $this->api_version;

		return view('gempa/dirasakan', $data);
	}

	public function api_endpoint()
	{
		$data['api_version'] = $this->api_version;

		return view('gempa/api_endpoint', $data);
	}
}
