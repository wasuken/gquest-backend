<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableWorkers extends Migration
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
          'skills' => [
            'type' => 'TEXT',
          ],
          'rank' => [
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
        $this->forge->createTable('workers');
    }

    public function down()
    {
        //
        $this->forge->dropTable('workers');
    }
}
