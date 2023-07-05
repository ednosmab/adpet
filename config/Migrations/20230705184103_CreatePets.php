<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreatePets extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        if(!$this->hasTable('pets')){
            $table = $this->table('pets');
            $table->addColumn('name', 'string', ['default' => null, 'limit' => 255,
             'null' => false]);
            $table->addColumn('description', 'text', ['default' => null, 'null' => false]);
            $table->addColumn('gender', 'string', ['default' => 'M', 'limit' => 2,
             'null' => false]);
            $table->addColumn('birthday', 'datetime', ['default' => null, 'null' => false]);
            $table->addColumn('created', 'datetime', ['default' => null, 'null' => false]);
            $table->addColumn('modified', 'datetime', ['default' => null, 'null' => true]);
            $table->addColumn('family_id', 'integer');
            $table->addForeignKey('family_id', 'families', 'id');
            $table->addColumn('breed_id', 'integer');
            $table->addForeignKey('breed_id', 'breeds', 'id');
            $table->addColumn('user_id', 'integer');
            $table->addForeignKey('user_id', 'users', 'id');
            $table->create();
        }
    }
}
