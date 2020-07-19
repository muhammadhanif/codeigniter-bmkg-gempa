<?php

namespace App\Controllers;

class Gempa extends BaseController
{
	public function index()
	{
		return view('gempa/terkini');
	}

	public function m5()
	{
		return view('gempa/m5');
	}

	public function dirasakan()
	{
		return view('gempa/dirasakan');
	}

	public function api()
	{
		return view('gempa/api');
	}
}
