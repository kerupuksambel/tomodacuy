<?php

use Phoenix\Migration\AbstractMigration;

class Create_posts_table extends AbstractMigration
{
    protected function up(): void
    {
        $this->table('posts')
        ->addColumn('id', 'char', ['length' => 36])
        ->addColumn('user_id', 'char', ['length' => 36])
        ->addColumn('content', 'text', ['length' => 32])
        ->create();
    }

    protected function down(): void
    {
        $this->table('posts')->drop();
    }
}
