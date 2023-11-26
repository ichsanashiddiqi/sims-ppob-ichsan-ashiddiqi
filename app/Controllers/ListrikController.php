<?php

namespace App\Controllers;


class ListrikController extends BaseController
{

    public function index()
    {
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
            'services' => json_decode($services)->data
        ];

        return view('listrik/index', $data);
        // return view('listrik/index.php');
    }

    public function create()
    {
        $curl = curl_init();

        $service_code = $this->request->getPost('service_code');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/transaction",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "service_code" => $service_code,
            )),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json",
                "Authorization: Bearer " . session('token')
            )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
            // send flashData error
            session()->setFlashdata('error', 'Error: ' . $err);
        }

        // if status = 0 then flashdata success message response, else flashdata warning message
        if (json_decode($response)->status == 0) {
            session()->setFlashdata('success', 'Sukses: ' . json_decode($response)->message);
        } else {
            session()->setFlashdata('warning', 'Gagal: ' . json_decode($response)->message);
        }

        // return back ke halaman /listrik/index
        return redirect()->to('PLN/index');
    }
	
}