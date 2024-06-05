<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Barang extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'barang_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barang_koderuangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_pembelian' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_spesifikasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_kondisi' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_ruangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_penanggungjawab' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barang_jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'barang_keterangan' => [
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
        $this->forge->addKey('barang_id', true);
        $this->forge->createTable('barang');
    }

    public function down()
    {
        $this->forge->dropTable('barang');
    }
}
