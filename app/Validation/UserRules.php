<?php

namespace App\Validation;

use App\Models\UserModel;
use Exception;

class UserRules
{
    public function validateUser(string $str, string $fields, array $data): bool
    {
        try {
            $model = new UserModel();
            return $model->findUserCheckPasswdByEmailAddress($data['email'], $data['password']);
        } catch (Exception $e) {
            log_message("debug", $e);
            return false;
        }
    }
}
