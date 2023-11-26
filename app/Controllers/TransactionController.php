<?php

namespace App\Controllers;


class TransactionController extends BaseController
{

    public function index()
    {
        $curl = curl_init();

        // Mendapatkan nilai offset dari segmen URI
        $offset = $this->request->uri->getSegment(3) ?? 0;
        $limit = $offset + 5;

        if ($offset === null) {
            $offset = 0;
            $limit = 5;
        }

        $url = 'https://take-home-test-api.nutech-integrasi.app/transaction/history?limit=' . $limit . '&offset=' . $offset;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token')
            ),
        ));

        $response_transactions = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        } else {
            $data = array(
                'transactions' => json_decode($response_transactions)->data->records,
            );
        }
        
        return view('transaksi/index', $data);
        
    }

    // get data transactions
    public function getTransactions()
    {
        $curl = curl_init();

        $offset = $this->request->getPost('offset');
        $limit = $offset + 5;

        if ($offset === null) {
            $offset = 0;
            $limit = 5;
        }

        $url = 'https://take-home-test-api.nutech-integrasi.app/transaction/history?limit=' . $limit . '&offset=' . $offset;

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token')
            ),
        ));

        $response_transactions = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);
        
        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        }

        // return
        return $response_transactions;
        
    }

}