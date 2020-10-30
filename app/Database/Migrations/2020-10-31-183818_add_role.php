<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddFAQ extends Migration
{

    public function up(): void
    {
        $this->forge->addField([
            'id' => [
                'type' => 'BIGINT',
                'unsigned' => true,
                'auto_increment' => true
            ],
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'deleted_at DATETIME',
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);

        $this->forge->addUniqueKey('slug');
        $this->forge->addKey('id', true);

        $this->forge->createTable('faq');

        $this->db->table('role')->insert([
            'slug' => 'admin',
            'name' => 'Admin'
        ]);
        $this->db->table('role')->insert([
            'slug' => 'staff',
            'name' => 'Staff'
        ]);
        $this->db->table('role')->insert([
            'slug' => 'teacher',
            'name' => 'Teacher'
        ]);
        $this->db->table('role')->insert([
            'slug' => 'student',
            'name' => 'Student'
        ]);
    }

    public function down(): void
    {
        $this->forge->dropTable('role');
    }
}
