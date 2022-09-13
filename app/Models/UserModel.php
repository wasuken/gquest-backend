<?php

namespace App\Models;

use CodeIgniter\Model;
use Exception;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
      'name',
      'email',
      'password',

    ];
    protected $updatedField = 'updated_at';

    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    protected function beforeUpdate(array $data): array
    {
        return $this->getUpdatedDataWithHashedPassword($data);
    }

    private function getUpdatedDataWithHashedPassword(array $data): array
    {
        if (isset($data['data']['password'])) {
            $plaintextPassword = $data['data']['password'];
            $data['data']['password_hash'] = $this->hashPassword($plaintextPassword);
            unset($data['data']['password']);
        }
        return $data;
    }

    private function hashPassword(string $plaintextPassword): string
    {
        return password_hash($plaintextPassword, PASSWORD_BCRYPT);
    }

    public function findUserByEmailAddress(string $emailAddress)
    {
        $user = $this
          ->asArray()
          ->where(['email' => $emailAddress])
          ->first();

        if (!$user) {
            throw new Exception('User does not exist for specified email address');
        }

        return $user;
    }
    public function findUserCheckPasswdByEmailAddress(string $emailAddress, string $passwd)
    {
        $user = $this->findUserByEmailAddress($emailAddress);
        return password_verify($passwd, $user['password_hash']);
    }
}