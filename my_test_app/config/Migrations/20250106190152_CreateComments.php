<?php

declare(strict_types=1);

use Migrations\BaseMigration;

class CreateComments extends BaseMigration
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
        $table = $this->table('comments');
        $table->addColumn('content', 'string', [
            'limit' => 2048,
            'null' => false,
        ]);
        $table->addColumn('request_id', 'integer', [
            'null' => true,
        ])
            ->addForeignKey('request_id', 'requests', 'id', [
                'delete' => 'SET_NULL',
                'update' => 'CASCADE',
            ]);
        $table->create();
    }
}
