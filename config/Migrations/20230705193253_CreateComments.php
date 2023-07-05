<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateComments extends AbstractMigration
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
        if(!$this->hasTable('comments')){
            $table = $this->table('comments');
            $table->addColumn('content', 'text', ['default' => null,
             'null' => false]);
            $table->addColumn('created', 'datetime', ['default' => null, 'null' => true]);
            $table->addColumn('modified', 'datetime', ['default' => null, 'null' => true]);
            $table->addColumn('user_id', 'integer');
            $table->addForeignKey('user_id', 'users', 'id');
            $table->addColumn('pet_id', 'integer');
            $table->addForeignKey('pet_id', 'pets', 'id');
            $table->create();
        }
    }
}
