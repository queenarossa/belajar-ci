<?php

namespace App\Models;

use CodeIgniter\Model;

class DiskonModel extends Model
{
    protected $table            = 'diskon'; // perbaiki nama tabel
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;

    protected $allowedFields    = ['tanggal', 'nominal', 'created_at', 'updated_at'];

    protected $useTimestamps = true; // aktifkan agar otomatis isi created_at dan updated_at
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}