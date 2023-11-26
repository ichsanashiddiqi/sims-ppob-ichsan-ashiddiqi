<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // ini adalah kondisi sebelum filter dijalankan,
        // jika gk ada token kembali ke login
        if (!session('profile')) {
            return redirect()->to(site_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
    // jgn lupa daftarkan LoginFilter.php di config/filters, dan atur juga halaman apa yg tidak boleh diakses sebelum login, config/filters
}