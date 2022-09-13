<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableQuests extends Migration
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
          'client_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          'manage_guild_member_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          'description' => [
            'type' => 'TEXT',
          ],
          'reward' => [
            'type' => 'TEXT',
          ],
          'reward_yen' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          'updated_at' => [
            'type' => 'datetime',
            'null' => true,

          ],
          'created_at datetime default current_timestamp',

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('quests');
    }

    public function down()
    {
        //
        $this->forge->dropTable('quests');
    }
}
