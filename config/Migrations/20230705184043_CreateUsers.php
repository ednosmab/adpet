<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateUsers extends AbstractMigration
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
        if(!$this->hasTable('users')){
            $table = $this->table('users');
            $table->addColumn('name', 'string', ['default' => null, 'limit' => 255,
             'null' => false]);
            $table->addColumn('email', 'string', ['default' => null, 'limit' => 255,
             'null' => false]);
            $table->addColumn('password', 'string', ['default' => null, 'limit' => 255,
             'null' => false]);
            $table->addColumn('phone', 'string', ['default' => null, 'limit' => 255,
             'null' => false]);
            $table->create();
        }
    }
}
