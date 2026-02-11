<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260202112129 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE entradas (entrada_id INT AUTO_INCREMENT NOT NULL, user_id VARCHAR(255) NOT NULL, tipo_entrada VARCHAR(50) NOT NULL, fecha_visita DATETIME NOT NULL, fecha_compra DATETIME NOT NULL, UNIQUE INDEX UNIQ_4CAF338CA76ED395 (user_id), PRIMARY KEY (entrada_id)) DEFAULT CHARACTER SET utf8mb4');
        $this->addSql('CREATE TABLE felino (felino_id INT AUTO_INCREMENT NOT NULL, nombre_comun VARCHAR(50) NOT NULL, nombre_cientifico VARCHAR(100) NOT NULL, estado_conservacion VARCHAR(50) NOT NULL, dieta VARCHAR(100) DEFAULT NULL, habitat VARCHAR(50) DEFAULT NULL, image VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_2E38372DE0AF01BF (nombre_comun), UNIQUE INDEX UNIQ_2E38372D598C641B (nombre_cientifico), PRIMARY KEY (felino_id)) DEFAULT CHARACTER SET utf8mb4');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE entradas');
        $this->addSql('DROP TABLE felino');
    }
}
