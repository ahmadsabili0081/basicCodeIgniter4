<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;


class TbOrang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id_orang' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_orang' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'alamat' => [
                'type' => 'varchar',
                'constraint' => '255',
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => TRUE,
            ],
        ]);
        $this->forge->addKey('id_orang', true);
        $this->forge->createTable('tb_orang');
    }

    public function down()
    {
        $this->forge->dropTable('tb_orang');
    }
}
