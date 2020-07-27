<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BMKG_v1 extends CI_Model
{
    public function getGempaM5Terkini()
    {
        $url    = 'https://data.bmkg.go.id/autogempa.xml';
        $type   = 'Gempa M 5.0+ Terkini';

        return $this->_data($url, $type);
    }

    public function getGempaM5()
    {
        $url    = 'https://data.bmkg.go.id/gempaterkini.xml';
        $type   = 'Gempa M 5.0+';

        return $this->_data($url, $type);
    }

    public function getGempaDirasakan()
    {
        $url    = 'https://data.bmkg.go.id/gempadirasakan.xml';
        $type   = 'Gempa Dirasakan';

        return $this->_data($url, $type);
    }

    public function getGempaTsunamiTerkini()
    {
        $url    = 'https://data.bmkg.go.id/lasttsunami.xml';
        $type   = 'Gempa Berpotensi Tsunami Terkini';

        return $this->_data($url, $type);
    }

    private function _curl($url)
    {

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        return curl_exec($ch);

        curl_close($ch);
    }

    private function _data($url, $type)
    {
        $curl  = $this->_curl($url);

        // json
        $result['type']             = $type;
        $result['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
        $result['data_source_url']  = $url;
        $result['data']     = array();

        // validation
        if (strpos($curl, "html") or $curl === false) {
            // error
            $result['success']  = false;
            $result['message']  = 'Galat! Gagal mengambil data dari BMKG.';
        } else {
            // success
            $result['success']  = true;
            $result['message']  = 'OK!';
            $result['data']     = simplexml_load_string($curl);

            if (strpos($url, "autogempa.xml")) {
                $result['data']->eqmap  = 'https://data.bmkg.go.id/eqmap.gif';
            }
        }

        // creator
        $result['creator'] = array();
        $result['creator']['name']          = "Muhammad Hanif";
        $result['creator']['homepage']      = "https://hanifmu.com";
        $result['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $result['creator']['source_code']   = "https://github.com/muhammadhanif/codeigniter-bmkg-gempa";

        return $result;
    }
}
