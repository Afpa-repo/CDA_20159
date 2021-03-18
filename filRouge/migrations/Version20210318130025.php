<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318130025 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_cat ADD id_cat_produit_id INT NOT NULL');
        $this->addSql('ALTER TABLE sous_cat ADD CONSTRAINT FK_2DEFF635EFB0E80C FOREIGN KEY (id_cat_produit_id) REFERENCES categorie_produits (id)');
        $this->addSql('CREATE INDEX IDX_2DEFF635EFB0E80C ON sous_cat (id_cat_produit_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_cat DROP FOREIGN KEY FK_2DEFF635EFB0E80C');
        $this->addSql('DROP INDEX IDX_2DEFF635EFB0E80C ON sous_cat');
        $this->addSql('ALTER TABLE sous_cat DROP id_cat_produit_id');
    }
}
