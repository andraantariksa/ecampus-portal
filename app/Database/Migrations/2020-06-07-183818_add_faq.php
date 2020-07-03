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
            'thumbnail_url' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => true
            ],
            'question_en' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'answer_en' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'question_id' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
                'null' => false
            ],
            'answer_id' => [
                'type' => 'TEXT',
                'null' => false
            ],
            'deleted_at DATETIME',
            'created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP',
            'updated_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('faq');

//         Sample FAQ
        for ($i = 0; $i <= 10; ++$i) {
            $i_multiply_by_2 = $i * 2;
            $thumbnail_url = ($i < 5) ? 'https://previews.123rf.com/images/fordzolo/fordzolo1506/fordzolo150600296/41026708-example-white-stamp-text-on-red-backgroud.jpg': null;
            $this->db->table('faq')->insert([
                'thumbnail_url' => $thumbnail_url,
                'question_id' => "Berapa hasil dari ${i} + ${i}?",
                'answer_id' => "Berikut merupakan jawabannya\n${i} + ${i} = ${i_multiply_by_2}.\n**Bold**, _italic_, `code`\n```\nprint('${i} + ${i} = ', ${i} + ${i})\n```",
                'question_en' => "What is the result of ${i} + ${i}?",
                'answer_en' => "Below is the answer\n${i} + ${i} = ${i_multiply_by_2}.\n**Bold**, _italic_, `code`\n```\nprint('${i} + ${i} = ', ${i} + ${i})\n```",
            ]);
        }
    }

    public function down(): void
    {
        $this->forge->dropTable('faq');
    }
}
