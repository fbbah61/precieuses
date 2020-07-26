<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200726184802 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE commande (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE goodies (id INT AUTO_INCREMENT NOT NULL, goodies_nom1 VARCHAR(255) NOT NULL, goodies_nom2 VARCHAR(255) NOT NULL, goodies_nom3 VARCHAR(255) NOT NULL, goodies_nom4 VARCHAR(255) NOT NULL, goodies_nom5 VARCHAR(255) NOT NULL, goodies_nom6 VARCHAR(255) NOT NULL, goodies_nom7 VARCHAR(255) NOT NULL, goodies_nom8 VARCHAR(255) NOT NULL, goodies_nom9 VARCHAR(255) NOT NULL, goodies_nom10 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE membre (id INT AUTO_INCREMENT NOT NULL, membre_nom VARCHAR(255) NOT NULL, membre_prenom VARCHAR(255) NOT NULL, membre_civilite VARCHAR(255) NOT NULL, membre_adresse VARCHAR(255) NOT NULL, membre_code INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE panier (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stampwish (id INT AUTO_INCREMENT NOT NULL, stampwish_nom1 VARCHAR(255) NOT NULL, stampwish_nom2 VARCHAR(255) NOT NULL, stampwish_nom3 VARCHAR(255) NOT NULL, stampwish_nom4 VARCHAR(255) NOT NULL, stampwish_nom5 VARCHAR(255) NOT NULL, stampwish_nom6 VARCHAR(255) NOT NULL, stampwish_nom7 VARCHAR(255) NOT NULL, stampwish_nom8 VARCHAR(255) NOT NULL, stampwish_nom9 VARCHAR(255) NOT NULL, stampwish_nom10 VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE commande');
        $this->addSql('DROP TABLE goodies');
        $this->addSql('DROP TABLE membre');
        $this->addSql('DROP TABLE panier');
        $this->addSql('DROP TABLE stampwish');
    }
}
