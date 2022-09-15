<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateTableWorkerQuests extends Migration
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
          'worker_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          'quest_id' => [
            'type' => 'INT',
            'constraint' => 10,
            'unsigned' => true,
          ],
          // 0 => 交渉中等。なんらかの要因により特定のワーカーが予約しているような状態
          // 1 => 受領中。
          // 2 => 達成
          'status' => [
            'type' => 'SMALLINT',
            'constraint' => 3,
            'unsigned' => true,
          ],
          'status_detail' => [
            'type' => 'TEXT',
          ],
          'updated_at' => [
            'type' => 'datetime',
            'null' => true,

          ],
          'created_at datetime default current_timestamp',

        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('worker_quests');
    }

    public function down()
    {
        //
        $this->forge->dropTable('worker_quests');
    }
}
