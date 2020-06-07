<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUser extends Migration {

    public function up()
    {
        $this->forge->addField([
            'id'          => [
                'type'           => 'BIGINT',
                'unsigned'       => true,
                'auto_increment' => true
            ],
            'first_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => false
            ],
            'last_name'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => false
            ],
            'username'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => false
            ],
            'password'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => false
            ],
            'email'       => [
                'type'           => 'VARCHAR',
                'constraint'     => '50',
                'null'           => false
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('user');

        // Sample user
        $this->db->table('user')->insert([
            'username'   => 'luke',
            'password'   => 'skywalker',
            'email'      => 'luke.skywalker@starwars.com',
            'first_name' => 'Luke',
            'last_name'  => 'Skywalker'
        ]);
    }

    public function down()
    {
        $this->forge->dropTable('user');
    }
}
