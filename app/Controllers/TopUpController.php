<?php

namespace App\Controllers;


class TopUpController extends BaseController
{

    public function index()
    {
        return view('topup/index');
    }

    public function create()
    {
        $curl = curl_init();

        $top_up_amount = $this->request->getPost('top_up_amount');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/topup",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "top_up_amount" => $top_up_amount,
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

        // return back ke halaman /topup/index
        return redirect()->to('/topup/index');

        
    }
	
}