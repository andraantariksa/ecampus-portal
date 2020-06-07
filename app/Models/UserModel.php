<?php namespace App\Models;

use CodeIgniter\Model;
use stdClass;

class UserModel extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'id';

    protected $allowedFields = ['id', 'username', 'password', 'email', 'firstname', 'lastname'];
    protected $useSoftDeletes = true;

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
}
