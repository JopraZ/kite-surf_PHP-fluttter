<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260205172545 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE centre DROP FOREIGN KEY FK_C6A0EA75463CD7C3');
        $this->addSql('DROP INDEX IDX_C6A0EA75463CD7C3 ON centre');
        $this->addSql('ALTER TABLE centre DROP centre_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE centre ADD centre_id INT NOT NULL');
        $this->addSql('ALTER TABLE centre ADD CONSTRAINT FK_C6A0EA75463CD7C3 FOREIGN KEY (centre_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_C6A0EA75463CD7C3 ON centre (centre_id)');
    }
}
