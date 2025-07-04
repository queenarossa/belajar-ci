<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class DiskonSeeder extends Seeder
{
    public function run()
    {
        $data = [];
        $tanggal = Time::today();

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'tanggal'    => $tanggal->addDays($i)->toDateString(),
                'nominal'    => 100000,
                'created_at' => Time::now(),
                'updated_at' => Time::now(),
            ];
        }

        $this->db->table('diskon')->insertBatch($data);
    }
}
