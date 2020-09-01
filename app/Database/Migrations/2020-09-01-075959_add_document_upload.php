<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocumentUpload extends Migration
{

    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'filename' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'deleted_at DATETIME',
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('document_upload');
    }

    public function down(): void
    {
        $this->forge->dropTable('document_upload');
    }
}
