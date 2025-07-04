<?php

namespace App\Controllers;

use App\Models\DiskonModel;
use CodeIgniter\Controller;

class DiskonController extends BaseController
{
    protected $diskonModel;

    public function __construct()
    {
        $this->diskonModel = new DiskonModel();
    }

    public function index()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $diskon = $this->diskonModel->findAll();
    return view('v_diskon', [
        'mode' => 'index',
        'diskon' => $diskon
    ]);
}

    public function create()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    return view('v_diskon', [
        'mode' => 'create'
    ]);
}


    public function store()
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $rules = [
        'tanggal' => 'required|is_unique[diskon.tanggal]',
        'nominal' => 'required|numeric'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $this->diskonModel->save([
        'tanggal' => $this->request->getPost('tanggal'),
        'nominal' => $this->request->getPost('nominal')
    ]);

    return redirect()->to('/diskon')->with('success', 'Diskon berhasil ditambahkan.');
}


    public function edit($id)
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $diskon = $this->diskonModel->find($id);
    return view('v_diskon', [
        'mode' => 'edit',
        'diskon' => $diskon
    ]);
}


    public function update($id)
{
    if (session()->get('role') !== 'admin') {
        return redirect()->to('/')->with('error', 'Akses ditolak.');
    }

    $rules = [
        'nominal' => 'required|numeric'
    ];

    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('validation', $this->validator);
    }

    $this->diskonModel->update($id, [
        'nominal' => $this->request->getPost('nominal')
    ]);

    return redirect()->to('/diskon')->with('success', 'Diskon berhasil diperbarui.');
}


    public function delete($id)
    {
        
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Akses ditolak.');
        }

        $this->diskonModel->delete($id);
        return redirect()->to('/diskon')->with('success', 'Diskon berhasil dihapus.');
    }
}
