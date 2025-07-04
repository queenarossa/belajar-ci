<?php

namespace App\Controllers;

class PageController extends BaseController
{
    public function contact()
    {
        return view('contact');
    }

    public function sendContact()
    {
        $nama = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $pesan = $this->request->getPost('pesan');
        
        session()->setFlashdata('success', 'Pesan Anda telah terkirim. Terima kasih!');

        return redirect()->to(base_url('contact'));
    }
}
