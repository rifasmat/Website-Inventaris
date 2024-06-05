<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangKeluar extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'barangkeluar_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barangkeluar_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangkeluar_kode' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangkeluar_tanggalmasuk' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangkeluar_ruangan' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangkeluar_jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'barangkeluar_tanggalkeluar' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangkeluar_keterangan' => [
                'type'       => 'TEXT',
                'null'         =>  True,
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
        $this->forge->addKey('barangkeluar_id', true);
        $this->forge->createTable('barangkeluar');
    }

    public function down()
    {
        $this->forge->dropTable('barangkeluar');
    }
}
