<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190825004211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE categorie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE idee (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(250) NOT NULL, description LONGTEXT DEFAULT NULL, author VARCHAR(150) DEFAULT NULL, date_created DATETIME DEFAULT NULL, ispublished TINYINT(1) NOT NULL, file VARCHAR(255) DEFAULT NULL, user INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE idee_categorie (idee_id INT NOT NULL, categorie_id INT NOT NULL, INDEX IDX_4B63875BD40D782A (idee_id), INDEX IDX_4B63875BBCF5E72D (categorie_id), PRIMARY KEY(idee_id, categorie_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE serie (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(200) DEFAULT NULL, description VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(200) DEFAULT NULL, first_name VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE idee_categorie ADD CONSTRAINT FK_4B63875BD40D782A FOREIGN KEY (idee_id) REFERENCES idee (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE idee_categorie ADD CONSTRAINT FK_4B63875BBCF5E72D FOREIGN KEY (categorie_id) REFERENCES categorie (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE idee_categorie DROP FOREIGN KEY FK_4B63875BBCF5E72D');
        $this->addSql('ALTER TABLE idee_categorie DROP FOREIGN KEY FK_4B63875BD40D782A');
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE idee');
        $this->addSql('DROP TABLE idee_categorie');
        $this->addSql('DROP TABLE serie');
        $this->addSql('DROP TABLE user');
    }
}
