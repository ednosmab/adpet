<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateAddresses extends AbstractMigration
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
        if(!$this->hasTable('addresses')){
            $table = $this->table('addresses');
            $table->addColumn('street', 'string', [
                'default' => null,
                'limit' => 255,
                'null' => false,
            ]);
            $table->addColumn('zipcode', 'integer', [
                'default' => null,
                'limit' => 255,
            ]);
            $table->create();
        }
    }
}
