<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class BarangMasuk extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'barangmasuk_id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'barangmasuk_nama' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangmasuk_tanggal' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'barangmasuk_jumlah' => [
                'type'       => 'INT',
                'constraint' => 11,
            ],
            'barangmasuk_suplier' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
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
        $this->forge->addKey('barangmasuk_id', true);
        $this->forge->createTable('barangmasuk');
    }

    public function down()
    {
        $this->forge->dropTable('barangmasuk');
    }
}
