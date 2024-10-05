<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20241005210212 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create the user table';
    }

    public function up(Schema $schema): void
    {
        $table = $schema->createTable('user');
        $table->addColumn('id', 'integer', ['autoincrement' => true]);
        $table->addColumn('email', 'string', ['length' => 255]);
        $table->addColumn('password', 'string', ['length' => 255]);
        $table->addColumn('pseudo', 'string', ['length' => 255]);
        $table->addColumn('created_at', 'datetime', ['notnull' => false]);
        $table->addColumn('updated_at', 'datetime', ['notnull' => false]);
        $table->setPrimaryKey(['id']);
        $table->addUniqueIndex(['email']);
        $table->addUniqueIndex(['pseudo']);
    }

    public function down(Schema $schema): void
    {
        $schema->dropTable('user');
    }
}
