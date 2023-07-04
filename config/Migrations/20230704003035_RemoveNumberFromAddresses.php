<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class RemoveNumberFromAddresses extends AbstractMigration
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
        $table = $this->table('addresses');
        $table->removeColumn('number');
        
        /**
         * Trecho abaixo será comentado para não ser executado.
         * Apenas para exemplificar a forma de remover um campo na tabela
         **/  
        // $table->update();
    }
}
