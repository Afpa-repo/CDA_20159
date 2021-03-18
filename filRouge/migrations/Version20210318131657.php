<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210318131657 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients ADD id_employer_id INT NOT NULL, ADD id_cat_client_id INT NOT NULL');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E7459DF538D FOREIGN KEY (id_employer_id) REFERENCES employers (id)');
        $this->addSql('ALTER TABLE clients ADD CONSTRAINT FK_C82E744894802B FOREIGN KEY (id_cat_client_id) REFERENCES categorie_clients (id)');
        $this->addSql('CREATE INDEX IDX_C82E7459DF538D ON clients (id_employer_id)');
        $this->addSql('CREATE INDEX IDX_C82E744894802B ON clients (id_cat_client_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E7459DF538D');
        $this->addSql('ALTER TABLE clients DROP FOREIGN KEY FK_C82E744894802B');
        $this->addSql('DROP INDEX IDX_C82E7459DF538D ON clients');
        $this->addSql('DROP INDEX IDX_C82E744894802B ON clients');
        $this->addSql('ALTER TABLE clients DROP id_employer_id, DROP id_cat_client_id');
    }
}
