<?php

use Phoenix\Migration\AbstractMigration;

class Create_users_table extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('users')
        ->addColumn('id', 'char', ['length' => 36])
        ->addColumn('username', 'string')
        ->addColumn('password', 'char', ['length' => 32])
        ->addColumn('nama', 'string')
        ->create();
    }

    protected function down(): void
    {
        $this->table('users')->drop();
    }
}
