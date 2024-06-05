<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreatePengguna extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'pengguna_id'         => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'pengguna_nama'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengguna_username'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengguna_email'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengguna_password'   => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengguna_foto'       => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
            ],
            'pengguna_role'       => [
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
        $this->forge->addKey('pengguna_id', true);
        $this->forge->createTable('pengguna');
    }

    public function down()
    {
        $this->forge->dropTable('pengguna');
    }
}
