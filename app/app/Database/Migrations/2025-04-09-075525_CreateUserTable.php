<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateUserTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'          => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'firstname'   => ['type' => 'VARCHAR', 'constraint' => '100'],
            'lastname'    => ['type' => 'VARCHAR', 'constraint' => '100'],
            'email'       => ['type' => 'VARCHAR', 'constraint' => '150', 'unique' => true],
            'state'       => ['type' => 'TINYINT', 'default' => 0],
            'created_at'  => [ 'type'    => 'TIMESTAMP','default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'  => ['type'    => 'TIMESTAMP','default' => new RawSql('CURRENT_TIMESTAMP')],

            // 'state'      => ['type' => 'INT', 'constraint' => 1],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('users', true);
    }

    public function down()
    {
        $this->forge->dropTable('users', true);
    }
}
