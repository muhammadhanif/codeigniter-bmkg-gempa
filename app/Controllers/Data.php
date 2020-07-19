<?php

namespace App\Controllers;

use CodeIgniter\RESTful\ResourceController;

class Data extends ResourceController
{
	public function gempaTerkini()
	{
		$curl  = $this->curl('https://data.bmkg.go.id/autogempa.xml');

		// json
		$json['type']             = 'Gempabumi M 5.0+ Terkini';
		$json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
		$json['data_source_url']  = 'https://data.bmkg.go.id/autogempa.xml';

		// validation
		if (strpos($curl, "html")) {
			// error
			$json['success']  = false;
			$json['data']     = array();
		} else {
			// success
			$json['success']      = true;
			$json['data']         = simplexml_load_string($curl);
			$json['data']->eqmap  = 'https://data.bmkg.go.id/eqmap.gif';
		}

		$json['creator'] = array();
		$json['creator']['name']          = "Muhammad Hanif";
		$json['creator']['homepage']      = "https://hanifmu.com";
		$json['creator']['telegram']      = "https://t.me/muhammad_hanif";
		$json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

		return $this->respond($json);
	}

	public function gempaM5()
	{
		$curl  = $this->curl('https://data.bmkg.go.id/gempaterkini.xml');

		// json
		$json['type']             = '60 Gempabumi M 5.0+';
		$json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
		$json['data_source_url']  = 'https://data.bmkg.go.id/gempaterkini.xml';

		// validation
		if (strpos($curl, "html")) {
			// error
			$json['success']  = false;
			$json['data']     = array();
		} else {
			// success
			$json['success']  = true;
			$json['data'] = simplexml_load_string($curl);
		}

		$json['creator'] = array();
		$json['creator']['name']          = "Muhammad Hanif";
		$json['creator']['homepage']      = "https://hanifmu.com";
		$json['creator']['telegram']      = "https://t.me/muhammad_hanif";
		$json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

		return $this->respond($json);
	}

	public function gempaDirasakan()
	{
		$curl  = $this->curl('https://data.bmkg.go.id/gempadirasakan.xml');

		// json
		$json['type']             = '20 Gempabumi Dirasakan';
		$json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
		$json['data_source_url']  = 'https://data.bmkg.go.id/gempadirasakan.xml';

		// validation
		if (strpos($curl, "html")) {
			// error
			$json['success']  = false;
			$json['data']     = array();

			$this->output->set_header('HTTP/1.0 404 Not Found');
			$this->output->set_header('HTTP/1.1 404 Not Found');
			$this->output->set_status_header(404);
		} else {
			// success
			$json['success']  = true;
			$json['data']     = simplexml_load_string($curl);
		}

		$json['creator'] = array();
		$json['creator']['name']          = "Muhammad Hanif";
		$json['creator']['homepage']      = "https://hanifmu.com";
		$json['creator']['telegram']      = "https://t.me/muhammad_hanif";
		$json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

		return $this->respond($json);
	}

	public function lastTsunami()
	{
		$curl  = $this->curl('https://data.bmkg.go.id/lasttsunami.xml');

		// json
		$json['type']             = 'Gempabumi Berpotensi Tsunami Terkini';
		$json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
		$json['data_source_url']  = 'https://data.bmkg.go.id/lasttsunami.xml';

		// validation
		if (strpos($curl, "html")) {
			// error
			$json['success']  = false;
			$json['data']     = array();
		} else {
			// success
			$json['success']  = true;
			$json['data']     = simplexml_load_string($curl);
		}

		$json['creator'] = array();
		$json['creator']['name']          = "Muhammad Hanif";
		$json['creator']['homepage']      = "https://hanifmu.com";
		$json['creator']['telegram']      = "https://t.me/muhammad_hanif";
		$json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

		return $this->respond($json);
	}

	private function curl($url)
	{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

		return curl_exec($ch);

		curl_close($ch);
	}
}
