<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class TestSeed extends Seeder
{
    public function run()
    {
        try {
            $this->db->table("worker_quests")->truncate();
            $this->db->table("quests")->truncate();
            $this->db->table("workers")->truncate();
            $this->db->table("guild_members")->truncate();
            $this->db->table("clients")->truncate();
            $this->db->table("users")->truncate();
            // users
            $pwdh = password_hash("testtest", PASSWORD_BCRYPT);
            $users = [
              [
                "email" => "client@test.com",
                "name" => "test",
              ],
              [
                "email" => "guild@test.com",
                "name" => "hoge",
              ],
              [
                "email" => "worker@test.com",
                "name" => "huga",
              ],
            ];
            foreach ($users as $k => $user) {
                $data = $user;
                $data["password_hash"] = $pwdh;
                $rst = $this->db->query("insert into users(name, email, password_hash) values(:name:, :email:, :password_hash:);", $data);
            }
            //// guild_members
            $this->db->query("insert into guild_members(id, user_id, role) values(:id:, :user_id:, :role:)", [
              "id" => 0,
              "user_id" => 2,
              "role" => "guild_leader",
            ]);
            //// clients
            $this->db->query("insert into clients(user_id) values(:user_id:)", [
              "user_id" => 1,
            ]);
            //// workers
            $this->db->query("insert into workers(user_id) values(:user_id:)", [
              "user_id" => 3,
            ]);

            // quests
            $this->db->query("insert into quests(id, client_id, title, manage_guild_member_id, description, reward, reward_yen, limit_date) values(:quest_id:, :client_id:, :title:, :manage_guild_member_id:, :description:, :reward:, :reward_yen:, :limit_date:)", [
              "quest_id" => 1,
              "client_id" => 1,
              "manage_guild_member_id" => 0,
              "description" => "もうだめだ...おしまいだぁ...",
              "title" => "リオなんとかを討伐せよ",
              "reward" => "10000yen+素材諸々",
              "reward_yen" => "50000",
              "limit_date" => "2022-10-10 00:00:00",
            ]);
            $this->db->query("insert into quests(id, client_id, title, manage_guild_member_id, description, reward, reward_yen, limit_date) values(:quest_id:, :client_id:, :title:, :manage_guild_member_id:, :description:, :reward:, :reward_yen:, :limit_date:)", [
              "quest_id" => 2,
              "client_id" => 1,
              "manage_guild_member_id" => 0,
              "title" => "ゴブリンを倒せ！",
              "description" => "C級冒険者昇格試験です",
              "reward" => "2000yen+素材諸々",
              "reward_yen" => "10000",
              "limit_date" => "2022-10-20 00:00:00",
            ]);

            // worker_quests
            $this->db->query("insert into worker_quests(worker_id, quest_id, status, status_detail) values(:worker_id:, :quest_id:, :status:, :status_detail:)", [
              "worker_id" => 1,
              "quest_id" => 1,
              "status" => 0,
              "status_detail" => "交渉中",
            ]);
        } catch(\Exception $e) {
            log_message("error", $e->__toString());
            var_dump($this->db->error());
        }
    }
}
