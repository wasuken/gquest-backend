<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeed extends Seeder
{
    public function run()
    {
      // users
      $pwdh = password_hash("testtest", PASSWORD_BCRYPT);
      $users = [
        [
          "email" => "client@test.com",
          "name" => "test",
        ],
        [
          "email" => "guild@test.com",
          "name" => "test",
        ],
        [
          "email" => "worker@test.com",
          "name" => "test",
        ],
      ];
      $this->db->query("insert into users(name, email, password_hash) values(:name, :email, :password_hash);", $data);
      //// guild_members
      //// clients
      //// workers

      // quests
      // worker_quests
    }
}
