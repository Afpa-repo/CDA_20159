<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318113856 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE produits (id INT AUTO_INCREMENT NOT NULL, nom_produit VARCHAR(50) NOT NULL, code_produit VARCHAR(10) NOT NULL, libelle_produit VARCHAR(10) NOT NULL, description_produit LONGTEXT DEFAULT NULL, prix_produit NUMERIC(5, 2) DEFAULT NULL, stock_produit INT DEFAULT NULL, couleur_produit VARCHAR(15) DEFAULT NULL, photo_produit VARCHAR(5) DEFAULT NULL, date_ajout_produit DATE DEFAULT NULL, date_modif_produit DATE DEFAULT NULL, stock_alert INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE produits');
    }
}
