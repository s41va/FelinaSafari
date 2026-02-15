<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260215200151 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE donacion (id INT AUTO_INCREMENT NOT NULL, importe DOUBLE PRECISION NOT NULL, user_id INT DEFAULT NULL, INDEX IDX_FC2BEE86A76ED395 (user_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE donacion ADD CONSTRAINT FK_FC2BEE86A76ED395 FOREIGN KEY (user_id) REFERENCES user (user_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE donacion DROP FOREIGN KEY FK_FC2BEE86A76ED395');
        $this->addSql('DROP TABLE donacion');
    }
}
