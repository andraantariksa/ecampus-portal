<?php
namespace App\Models;

use CodeIgniter\Model;
use Elasticsearch\ClientBuilder;

class DocumentModel extends Model
{
    protected $table = 'document';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'document_upload_id',
        'description',
        'url',
        'thumbnail_url'
    ];
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
}
