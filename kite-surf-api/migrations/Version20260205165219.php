<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260205165219 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande ADD centre_id INT NOT NULL');
        $this->addSql('ALTER TABLE demande ADD CONSTRAINT FK_2694D7A5463CD7C3 FOREIGN KEY (centre_id) REFERENCES centre (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2694D7A5463CD7C3 ON demande (centre_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE demande DROP FOREIGN KEY FK_2694D7A5463CD7C3');
        $this->addSql('DROP INDEX UNIQ_2694D7A5463CD7C3 ON demande');
        $this->addSql('ALTER TABLE demande DROP centre_id');
    }
}
