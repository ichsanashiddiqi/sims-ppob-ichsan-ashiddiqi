<?php

namespace App\Controllers;


class AuthController extends BaseController
{

	public function index()
    {
        return view('home/home');
    }
    
    public function register()
    {
        return view('register');
    } 

    

    public function processSignup(){

        $validation =  \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|valid_email',
            'confirm_password' => 'required|min_length[8]',
            'password' => 'required|matches[confirm_password]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if (!$isDataValid) {
            // return erro validation to flashdata and back to register
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/auth/register');
        }

        $curl = curl_init();
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/registration",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $email,
                "password" => $password
            )),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
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
        return redirect()->to('/');
        
    }

    // create method process here
    public function processLogin()
    {
        $curl = curl_init();

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/login",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode(array(
                "email" => $email,
                "password" => $password
            )),
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/json"
            )
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        // if json_decode($response)->data->token not found redirect
        if (json_decode($response)->data->token == null) {
            return redirect()->to('/');
        }

        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        } else {
            // add get profile from bearer token
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/profile",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . json_decode($response)->data->token
                )
            ));
            $response_profile = curl_exec($curl);
            
            
            // get balance
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/balance",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_HTTPHEADER => array(
                    "Authorization: Bearer " . json_decode($response)->data->token
                )
            ));
            $response_balance = curl_exec($curl);

            $err = curl_error($curl);
            curl_close($curl);
            
            if ($err) {
                // Handle error
                echo "cURL Error #:" . $err;
            } else {
                // Handle response
                $data = array(
                    'token' => json_decode($response)->data->token,
                    'profile' => json_decode($response_profile)->data,
                    'balance' => json_decode($response_balance)->data
                );
                session()->set($data);
                return redirect()->to('/home/index');
            }

               
        }


    }

    // show edit
    public function edit()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/profile",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token')
            )
        ));
        
        $response_profile = curl_exec($curl);

        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            // Handle error
            echo "cURL Error #:" . $err;
        } else {
            // Handle response
            $data = array(
                'profile' => json_decode($response_profile)->data,
            );
        }

        
        return view('akun/edit', $data);
    }

    // update profile
    public function update()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if (!$isDataValid) {
            // return erro validation to flashdata and back to register
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/auth/edit');
        }

        $curl = curl_init();
        $first_name = $this->request->getPost('first_name');
        $last_name = $this->request->getPost('last_name');
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/profile/update",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => json_encode(array(
                "first_name" => $first_name,
                "last_name" => $last_name,
            )),
            
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token'),
                "Content-Type: application/json"
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

        // return back ke halaman
        return redirect()->to('/auth/edit');
    }

    // update image
    public function updateImage()
    {
        $validation =  \Config\Services::validation();
        $validation->setRules([
            'img_upload' => 'uploaded[img_upload]|max_size[img_upload,100]|mime_in[img_upload,image/jpg,image/jpeg]'
        ]);
        $isDataValid = $validation->withRequest($this->request)->run();
        if (!$isDataValid) {
            // return erro validation to flashdata and back to register
            session()->setFlashdata('error', $validation->listErrors());
            return redirect()->to('/auth/edit');
        }

        $curl = curl_init();
        $img_upload = $this->request->getFile('img_upload');

        // Make sure the file exists and is readable
        if (!file_exists($img_upload) || !is_readable($img_upload)) {
            session()->setFlashdata('warning', 'Gagal: Image null');
        }

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://take-home-test-api.nutech-integrasi.app/profile/image",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "PUT",
            CURLOPT_POSTFIELDS => array(
                "file" => curl_file_create($img_upload->getTempName(), $img_upload->getMimeType(), $img_upload->getName()),
            ),
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer " . session('token'),
                "Content-Type: multipart/form-data"
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

        // return back ke halaman
        return redirect()->to('/auth/edit');
    }

    // create method logout here
    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }

    







	
}