<?php

namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['first_name', 'last_name', 'username', 'password', 'email', 'last_login'];

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    public function getUserWithUsernameAndPassword(string $username, string $password): ?stdClass
    {
        return $this->db->table($this->table)->getWhere([
            'username' => $username,
            'password' => $password
        ])->getFirstRow();
    }

    public function isEmailExists(string $email): bool
    {
        return $this->db->table($this->table)->getWhere([
                'email' => $email,
            ])->getFirstRow() != null;
    }

    public function isUsernameExists(string $username): bool
    {
        return $this->db->table($this->table)->getWhere([
                'username' => $username,
            ])->getFirstRow() != null;
    }

    public function createNewUser(string $username, string $email, string $password)
    {
        return $this->db->table($this->table)->insert(
            [
                'email' => $email,
                'password' => $password,
                'username' => $username
            ])->getResult();
    }
}
