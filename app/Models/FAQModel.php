<?php
namespace App\Models;

use CodeIgniter\Model;
use Elasticsearch\ClientBuilder;

class FAQModel extends Model
{
    protected $table = 'faq';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'question_id',
        'answer_id',
        'question_en',
        'answer_en',
        'thumbnail_url'
    ];
    protected $useSoftDeletes = true;

    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

//    protected $elasticsearchClient;
//
//    public function __construct(ConnectionInterface &$db = null, ValidationInterface $validation = null)
//    {
//        parent::__construct($db, $validation);
//
//        TODO
//        Setup the elasticsearch configuration
//        $this->elasticsearchClient = ClientBuilder::create()->build();
//    }

//    public function create(string $question_id, string $answer_id, string $question_en, string $answer_en): bool
//    {
//        return $this->db
//            ->table($this->table)
//            ->insert([
//            'question_id' => $question_id,
//            'answer_id' => $answer_id,
//            'question_en' => $question_en,
//            'answer_en' => $answer_en,
//            ]
//        );
//    }
}
