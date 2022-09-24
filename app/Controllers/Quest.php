<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;
use ReflectionException;

use App\Models\QuestModel;

/**
 * Auth
 *
 * @uses BaseController
 * @author wasuken
 * @license MIT
 */
class Quest extends BaseController
{
    /**
     * index
     *
     * @access public
     * @return void
     */
    public function index()
    {
        // helper('jwt');
        // $encodedToken = getJWTFromRequest($authenticationHeader);
        // $user = validateJWTFromRequest($encodedToken);
        $qm = new QuestModel();
        // 誰も受けてないクエストのみ
        // サブクエリだるそうだったのでJoinにした。遅すぎとかなら修正する
        $quests = $qm
            ->select("quests.*, users.name as client_name, worker_quests.id as wq_id")
            ->join(
                "worker_quests",
                "worker_quests.quest_id = quests.id",
                "left outer"
            )
            ->join("clients", "clients.id = quests.client_id")
            ->join("users", "clients.user_id = users.id")
            ->where("worker_quests.id is NULL")
            ->findAll();
        return $this->getResponse(
            [
                'message' => '',
                'quests' => $quests,
            ]
        );
    }
}
