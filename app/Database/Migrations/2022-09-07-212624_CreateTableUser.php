<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableUser extends Migration
{
    public function up()
    {
        $this->forge->addField([
          'id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
            'auto_increment' => true,
          ],
          'name' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => false
          ],
          'email' => [
            'type' => 'VARCHAR',
            'constraint' => '100',
            'null' => false,
            'unique' => true
          ],
          'password_hash' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
            'null' => false,
          ],
          'updated_at' => [
            'type' => 'datetime',
            'null' => true,

          ],
          'created_at datetime default current_timestamp',

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('users');
    }

    public function down()
    {
        $this->forge->dropTable('users');
    }
}
