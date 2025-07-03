<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Periksa apakah user sudah login
        if ($session->has('logged_in') && $session->get('logged_in') === true) {
            // Jika login, arahkan ke route Contact
            return redirect()->to('/contact');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Tidak ada aksi khusus setelah request
    }
}
