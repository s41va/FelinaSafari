<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260215182014 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE TipoEntrada (id INT AUTO_INCREMENT NOT NULL, tipo VARCHAR(50) NOT NULL, precio DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_ECE205A416A9C1A2 (precio), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('ALTER TABLE entradas ADD tipo_entrada_id INT NOT NULL, DROP tipo_entrada');
        $this->addSql('ALTER TABLE entradas ADD CONSTRAINT FK_4CAF338C370E2002 FOREIGN KEY (tipo_entrada_id) REFERENCES TipoEntrada (id)');
        $this->addSql('CREATE INDEX IDX_4CAF338C370E2002 ON entradas (tipo_entrada_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE TipoEntrada');
        $this->addSql('ALTER TABLE entradas DROP FOREIGN KEY FK_4CAF338C370E2002');
        $this->addSql('DROP INDEX IDX_4CAF338C370E2002 ON entradas');
        $this->addSql('ALTER TABLE entradas ADD tipo_entrada VARCHAR(50) NOT NULL, DROP tipo_entrada_id');
    }
}
