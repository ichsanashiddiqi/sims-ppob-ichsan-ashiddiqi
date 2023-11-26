<?php

namespace App\Controllers;


class HomeController extends BaseController
{

    public function index()
    {
        // masukkan data banner dari https://take-home-test-api.nutech-integrasi.app/banner
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/banner",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . session('token')
                )
        
        ));
        $banner = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        }

        // masukkan data services dari https://take-home-test-api.nutech-integrasi.app/services
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/services",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . session('token')
                )
        
        ));
        $services = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        }

        $data = [
            'banner' => json_decode($banner)->data,
            'services' => json_decode($services)->data
        ];

        return view('home/index', $data);
    }

}