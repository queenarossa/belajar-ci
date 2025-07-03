<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CategoryModel;

class Home extends BaseController
{
    protected $product;
    function __construct()
    {
        $this->product = new ProductModel();
    }
    public function index()
    {
        helper(['form', 'number']);

        $product = $this->product->findAll();
        $data['product'] = $product;

        return view('v_home', $data);
    }
}
