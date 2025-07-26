<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateUsersTable extends Migration
{
    public function up()
    {
        // Mendefinisikan kolom untuk tabel 'users'
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'username' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true, // Username harus unik
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '255',
                'unique'     => true, // Email harus unik
            ],
            'password' => [
                'type'       => 'VARCHAR',
                'constraint' => '255', // Untuk menyimpan hash password
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null'       => true,
            ],
        ]);

        // Menentukan primary key
        $this->forge->addKey('id', true);

        // Membuat tabel 'users'
        $this->forge->createTable('users');
    }

    public function down()
    {
        // Menghapus tabel 'users' jika migrasi di-rollback
        $this->forge->dropTable('users');
    }
}

