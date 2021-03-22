<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318125613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits ADD id_sous_cat_id INT NOT NULL, ADD id_fournisseur_id INT NOT NULL');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C2EA09643 FOREIGN KEY (id_sous_cat_id) REFERENCES sous_cat (id)');
        $this->addSql('ALTER TABLE produits ADD CONSTRAINT FK_BE2DDF8C5A6AC879 FOREIGN KEY (id_fournisseur_id) REFERENCES fournisseurs (id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C2EA09643 ON produits (id_sous_cat_id)');
        $this->addSql('CREATE INDEX IDX_BE2DDF8C5A6AC879 ON produits (id_fournisseur_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C2EA09643');
        $this->addSql('ALTER TABLE produits DROP FOREIGN KEY FK_BE2DDF8C5A6AC879');
        $this->addSql('DROP INDEX IDX_BE2DDF8C2EA09643 ON produits');
        $this->addSql('DROP INDEX IDX_BE2DDF8C5A6AC879 ON produits');
        $this->addSql('ALTER TABLE produits DROP id_sous_cat_id, DROP id_fournisseur_id');
    }
}
