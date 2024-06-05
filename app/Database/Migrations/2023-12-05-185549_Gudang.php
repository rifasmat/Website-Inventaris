<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gudang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'gudang_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'gudang_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gudang_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gudang_spesifikasi' => [
                'type'       => 'TEXT',
            ],
            'gudang_kondisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gudang_pembelian' => [
                'type'       => 'INT',
                'constraint' => '11',
            ],
            'gudang_ruangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gudang_penanggungjawab' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'gudang_jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'gudang_keterangan' => [
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
        $this->forge->addKey('gudang_id', true);
        $this->forge->createTable('gudang');
    }

    public function down()
    {
        $this->forge->dropTable('gudang');
    }
}
