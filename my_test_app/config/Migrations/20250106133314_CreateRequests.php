<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateRequests extends BaseMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/migrations/4/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('requests');
        $table->addColumn('departure_date', 'date', [
            'null' => false
        ]);
        $table->addColumn('departure_time', 'time', [
            'null' => false
        ]);
        $table->addColumn('amount_passengers', 'integer', [
            'null' => false
        ]);
        $table->addColumn('first_name', 'string', [
            'null' => false,
            'limit' => 64
        ]);
        $table->addColumn('last_name', 'string', [
            'null' => false,
            'limit' => 64
        ]);
        $table->addColumn('mail_address', 'string', [
            'null' => false,
            'limit' => 64
        ]);
        $table->addColumn('phone_number', 'string', [
            'default' => null,
            'null' => true,
            'limit' => 64
        ]);
        $table->addColumn('gdpr_agreed', 'boolean', [
            'null' => false
        ]);
        $table->create();
    }
}
