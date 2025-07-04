<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductCategory extends Seeder
{
    public function run()
    {
        $data = [
            [
                'name' => 'Laptop Entry Level',
                'category' => 'Laptop dengan spesifikasi dasar untuk keperluan ringan seperti browsing, mengetik, dan kuliah.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Laptop Gaming',
                'category' => 'Laptop dengan spesifikasi tinggi untuk bermain game berat dan rendering.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Laptop Bisnis',
                'category' => 'Laptop dengan build quality tinggi dan keamanan ekstra untuk kebutuhan profesional.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Aksesoris Laptop',
                'category' => 'Tas laptop, cooling pad, mouse, keyboard, dan perangkat pendukung lainnya.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'name' => 'Laptop Premium/Ultrabook',
                'category' => 'Laptop tipis, ringan, dan elegan untuk mobilitas tinggi dan tampilan profesional.',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ];

        $this->db->table('product_category')->insertBatch($data);
    }
}
