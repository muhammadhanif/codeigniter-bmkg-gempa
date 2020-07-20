<?php

namespace App\Models;

class BMKG_v1
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
        $json['type']             = $type;
        $json['data_source']      = 'BMKG (Badan Meteorologi, Klimatologi, dan Geofisika)';
        $json['data_source_url']  = $url;

        // validation
        if (strpos($curl, "html") or $curl === FALSE) {
            // error
            $json['success']  = FALSE;
            $json['message']  = 'Galat! Gagal mengambil data dari BMKG.';
            $json['data']     = array();
        } else {
            // success
            $json['success']    = TRUE;
            $json['message']    = 'OK!';

            $json['data']       = array();
            $json['data']       = simplexml_load_string($curl);

            if (strpos($url, "autogempa.xml")) {
                $json['data']->eqmap  = 'https://data.bmkg.go.id/eqmap.gif';
            }
        }

        // creator
        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https://github.com/muhammadhanif/codeigniter-bmkg-gempa";

        return $json;
    }
}
