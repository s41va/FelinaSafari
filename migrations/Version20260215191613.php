<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260215191613 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entradas DROP INDEX UNIQ_4CAF338CA76ED395, ADD INDEX IDX_4CAF338CA76ED395 (user_id)');
        $this->addSql('ALTER TABLE entradas CHANGE user_id user_id INT NOT NULL');
        $this->addSql('ALTER TABLE entradas ADD CONSTRAINT FK_4CAF338CA76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE entradas DROP INDEX IDX_4CAF338CA76ED395, ADD UNIQUE INDEX UNIQ_4CAF338CA76ED395 (user_id)');
        $this->addSql('ALTER TABLE entradas DROP FOREIGN KEY FK_4CAF338CA76ED395');
        $this->addSql('ALTER TABLE entradas CHANGE user_id user_id VARCHAR(255) NOT NULL');
    }
}
