<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200220133305 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE nom (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gallerie (id INT AUTO_INCREMENT NOT NULL, img1 VARCHAR(255) DEFAULT NULL, img2 VARCHAR(255) DEFAULT NULL, img3 VARCHAR(255) DEFAULT NULL, img4 VARCHAR(255) DEFAULT NULL, img5 VARCHAR(255) DEFAULT NULL, img6 VARCHAR(255) DEFAULT NULL, img7 VARCHAR(255) DEFAULT NULL, img8 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, objet VARCHAR(255) NOT NULL, message MEDIUMTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE produit (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, detail MEDIUMTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, piecejointe VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE realisation (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, details MEDIUMTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, piecejointe VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT AUTO_INCREMENT NOT NULL, img1 VARCHAR(255) DEFAULT NULL, img2 VARCHAR(255) DEFAULT NULL, img3 VARCHAR(255) DEFAULT NULL, img4 VARCHAR(255) DEFAULT NULL, img5 VARCHAR(255) DEFAULT NULL, img6 VARCHAR(255) DEFAULT NULL, img7 VARCHAR(255) DEFAULT NULL, img8 VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE service (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, detail LONGTEXT NOT NULL, image VARCHAR(255) DEFAULT NULL, piecejointe VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE params (id INT AUTO_INCREMENT NOT NULL, imageaccueil VARCHAR(255) DEFAULT NULL, apropos VARCHAR(255) DEFAULT NULL, aproposou VARCHAR(255) DEFAULT NULL, aproposquand VARCHAR(255) DEFAULT NULL, logo VARCHAR(255) DEFAULT NULL, adresse VARCHAR(255) DEFAULT NULL, telephone VARCHAR(255) DEFAULT NULL, email VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE nom');
        $this->addSql('DROP TABLE gallerie');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE produit');
        $this->addSql('DROP TABLE realisation');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE service');
        $this->addSql('DROP TABLE params');
    }
}
