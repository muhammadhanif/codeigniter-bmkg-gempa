<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BMKG_v1 extends CI_Model
{
    public function get_gempa_m_5_terkini()
    {
        $url    = 'https://data.bmkg.go.id/autogempa.xml';
        $type   = 'Gempabumi M 5.0+ Terkini';

        return $this->data($url, $type);
    }

    public function get_gempa_m_5()
    {
        $url    = 'https://data.bmkg.go.id/gempaterkini.xml';
        $type   = '60 Gempabumi M 5.0+';

        return $this->data($url, $type);
    }

    public function get_gempa_dirasakan()
    {
        $url    = 'https://data.bmkg.go.id/gempadirasakan.xml';
        $type   = '20 Gempabumi Dirasakan';

        return $this->data($url, $type);
    }

    public function get_gempa_tsunami_terkini()
    {
        $url    = 'https://data.bmkg.go.id/lasttsunami.xml';
        $type   = 'Gempabumi Berpotensi Tsunami Terkini';

        return $this->data($url, $type);
    }

    private function curl($url)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($ch);

        curl_close($ch);
    }

    private function data($url, $type)
    {
        $curl  = $this->curl($url);

        // json
        $json['type']             = $type;
        $json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
        $json['data_source_url']  = $url;

        // validation
        if (strpos($curl, "html") or $curl === FALSE) {
            // error
            $json['success']  = FALSE;
            $json['message']  = 'Galat! Gagal mengambil data dari BMKG.';
            $json['data']     = array();;
        } else {
            // success
            $json['success']  = TRUE;
            $json['message']  = 'OK!';
            $json['data']     = simplexml_load_string($curl);

            if (strpos($url, "autogempa.xml")) {
                $json['data']->eqmap  = 'https://data.bmkg.go.id/eqmap.gif';
            }
        }

        // creator
        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

        return $this->output->set_header('HTTP/1.0 200 OK')
            ->set_header('HTTP/1.1 200 OK')
            ->set_status_header(200)
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
    }
}
