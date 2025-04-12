<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreatePostTable extends Migration
{

    public function up()
    {
        $this->forge->addField([
            'id'         => ['type' => 'INT','constraint'     => 11, 'unsigned' => true, 'auto_increment' => true],
            'user_id'    => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true], 
            'title'      => ['type' => 'VARCHAR', 'constraint' => '100'],
            'content'    => ['type' => 'TEXT', 'null' => true],
            'created_at'  => [ 'type'    => 'TIMESTAMP','default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'  => ['type'    => 'TIMESTAMP','default' => new RawSql('CURRENT_TIMESTAMP')],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('posts' ,true);
    }

    public function down()
    {
        $this->forge->dropTable('posts',true);
    }
}

