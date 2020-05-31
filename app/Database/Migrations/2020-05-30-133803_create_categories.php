<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateCategories extends Migration
{
	public function up()
	{
		$this->forge->addField([
		    'id' => ['type' => 'INT', 'unsigned' => true, 'auto_increment' => true],
            'name' => ['type' => 'VARCHAR', 'constraint' => 200],
            'parent_id' => ['type' => 'INT', 'unsigned' => true, 'default' => 0],
        ]);

		$this->forge->addPrimaryKey('id');
		$this->forge->createTable('categories');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('categories');
	}
}
