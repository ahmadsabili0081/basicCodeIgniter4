<?php

namespace App\Database\Seeds;

use CodeIgniter\I18n\Time;

use CodeIgniter\Database\Seeder;

class Tb_orangSedder extends Seeder
{
  public function run()
  {
    $faker = \Faker\Factory::create('id_ID');
    for ($i = 0; $i < 1000; $i++) {
      $data[$i] = [
        'nama_orang' => $faker->name,
        'alamat'    => $faker->address,
        'created_at' => Time::createFromTimestamp($faker->unixTime()),
        'updated_at' => Time::now()
      ];
    }

    // // // Simple Queries
    // $this->db->query('INSERT INTO tb_orang (nama_orang, alamat,created_at,updated_at) VALUES(:nama_orang:, :alamat:, :created_at:, :updated_at:)', $data);

    // Using Query Builder
    $this->db->table('tb_orang')->insertBatch($data);
  }
}
