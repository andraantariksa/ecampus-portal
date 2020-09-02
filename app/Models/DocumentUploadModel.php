<?php
namespace App\Models;

use CodeIgniter\Model;
use Elasticsearch\ClientBuilder;

class DocumentUploadModel extends Model
{
    protected $table = 'document_upload';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'filename',
    ];
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
