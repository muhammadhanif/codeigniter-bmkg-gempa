<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
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

            $this->output->set_header('HTTP/1.0 404 Not Found');
            $this->output->set_header('HTTP/1.1 404 Not Found');
            $this->output->set_status_header(404);
        } else {
            // success
            $json['success']      = true;
            $json['data']         = simplexml_load_string($curl);
            $json['data']->eqmap  = 'https://data.bmkg.go.id/eqmap.gif';

            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_status_header(200);
        }

        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
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

            $this->output->set_header('HTTP/1.0 404 Not Found');
            $this->output->set_header('HTTP/1.1 404 Not Found');
            $this->output->set_status_header(404);
        } else {
            // success
            $json['success']  = true;
            $json['data'] = simplexml_load_string($curl);

            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_status_header(200);
        }

        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
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

            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_status_header(200);
        }

        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
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

            $this->output->set_header('HTTP/1.0 404 Not Found');
            $this->output->set_header('HTTP/1.1 404 Not Found');
            $this->output->set_status_header(404);
        } else {
            // success
            $json['success']  = true;
            $json['data']     = simplexml_load_string($curl);

            $this->output->set_header('HTTP/1.0 200 OK');
            $this->output->set_header('HTTP/1.1 200 OK');
            $this->output->set_status_header(200);
        }

        $json['creator'] = array();
        $json['creator']['name']          = "Muhammad Hanif";
        $json['creator']['homepage']      = "https://hanifmu.com";
        $json['creator']['telegram']      = "https://t.me/muhammad_hanif";
        $json['creator']['source_code']   = "https: //github.com/muhammadhanif/codeigniter-bmkg-gempa";

        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($json));
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
