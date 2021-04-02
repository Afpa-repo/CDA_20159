<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210331144505 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE clients (id INT AUTO_INCREMENT NOT NULL, employer_id INT DEFAULT NULL, cat_client_id INT DEFAULT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, matricule_societe VARCHAR(50) DEFAULT NULL, nom_societe VARCHAR(50) DEFAULT NULL, nom VARCHAR(50) DEFAULT NULL, prenom VARCHAR(50) DEFAULT NULL, adresse VARCHAR(50) DEFAULT NULL, code_postal VARCHAR(10) DEFAULT NULL, ville VARCHAR(50) DEFAULT NULL, pays VARCHAR(50) DEFAULT NULL, num_tel VARCHAR(20) DEFAULT NULL, num_fax VARCHAR(20) DEFAULT NULL, date_inscription DATETIME DEFAULT NULL, tva DOUBLE PRECISION DEFAULT NULL, verif_infos TINYINT(1) NOT NULL, UNIQUE INDEX UNIQ_C82E74E7927C74 (email), INDEX IDX_C82E7441CD9E7A (employer_id), INDEX IDX_C82E74F6BC514E (cat_client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E7441CD9E7A FOREIGN KEY (employer_id) REFERENCES employers (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E74F6BC514E FOREIGN KEY (cat_client_id) REFERENCES categorie_clients (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE clients');
    }
}
