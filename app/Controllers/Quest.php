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
            ->select("quests.*, worker_quests.id as wq_id")
            ->join("worker_quests", "worker_quests.quest_id = quests.id", "left outer")
            ->where("worker_quests.id is NULL")
            ->findAll();
        return $this->getResponse(
            [
                'message' => '',
                'clients' => $quests,
            ]
        );
    }
}
