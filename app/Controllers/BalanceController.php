<?php

namespace App\Controllers;


class BalanceController extends BaseController
{

    public function index()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/balance",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token')
            )
        ));
        
        $response_balance = curl_exec($curl);

        $err = curl_error($curl);
        
        curl_close($curl);

        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        }

        // return $data balance\
        return $response_balance;
    }

	
}