<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210402154328 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE student DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE student DROP id, CHANGE nsc nsc VARCHAR(20) NOT NULL');
        $this->addSql('ALTER TABLE student ADD PRIMARY KEY (nsc)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE student ADD id INT AUTO_INCREMENT NOT NULL, CHANGE nsc nsc VARCHAR(20) CHARACTER SET utf8mb4 DEFAULT NULL COLLATE `utf8mb4_unicode_ci`, DROP PRIMARY KEY, ADD PRIMARY KEY (id)');
    }
}
