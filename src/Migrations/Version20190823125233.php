<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190823125233 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idee ADD id_category_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE idee ADD CONSTRAINT FK_DE60E5CA545015 FOREIGN KEY (id_category_id) REFERENCES categorie (id)');
        $this->addSql('CREATE INDEX IDX_DE60E5CA545015 ON idee (id_category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idee DROP FOREIGN KEY FK_DE60E5CA545015');
        $this->addSql('DROP INDEX IDX_DE60E5CA545015 ON idee');
        $this->addSql('ALTER TABLE idee DROP id_category_id');
    }
}
