<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddDocument extends Migration
{

    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'auto_increment' => true
            ],
            'thumbnail_url' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => false
            ],
            // If it's null, then it's a url, not a file
            'document_upload_id' => [
                'type' => 'BIGINT',
                'null' => true
            ],
            'url' => [
                'type' => 'TEXT',
                'null' => true
            ],
            'deleted_at DATETIME',
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('document');
    }

    public function down(): void
    {
        $this->forge->dropTable('document');
    }
}
