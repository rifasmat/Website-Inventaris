<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Suplier extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'suplier_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'suplier_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'suplier_alamat' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'suplier_telepon' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'suplier_keterangan' => [
                'type'       => 'TEXT',
            ],
            'created_at'       => [
                'type'       => 'TEXT',
                'null'         =>  True,
            ],
            'updated_at'       => [
                'type'       => 'TEXT',
                'null'         =>  True,
            ],
        ]);
        $this->forge->addKey('suplier_id', true);
        $this->forge->createTable('suplier');
    }

    public function down()
    {
        $this->forge->dropTable('suplier');
    }
}
