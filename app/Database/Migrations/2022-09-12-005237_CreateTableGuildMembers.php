<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableGuildMembers extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
          'id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
            'auto_increment' => true,

          ],
          'user_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          'role' => [
            'type' => 'VARCHAR',
            'constraint' => '255',
          ],
          'updated_at' => [
            'type' => 'datetime',
            'null' => true,
          ],
          'created_at datetime default current_timestamp',

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('guild_members');
    }

    public function down()
    {
        //
        $this->forge->dropTable('guild_members');
    }
}
