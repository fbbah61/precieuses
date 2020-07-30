<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200730203836 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE details_commande (id INT AUTO_INCREMENT NOT NULL, quantite INT NOT NULL, prix DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE article ADD details_commande_id INT NOT NULL');
        $this->addSql('ALTER TABLE article ADD CONSTRAINT FK_23A0E66E99004AB FOREIGN KEY (details_commande_id) REFERENCES details_commande (id)');
        $this->addSql('CREATE INDEX IDX_23A0E66E99004AB ON article (details_commande_id)');
        $this->addSql('ALTER TABLE commande ADD details_commande_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE commande ADD CONSTRAINT FK_6EEAA67DE99004AB FOREIGN KEY (details_commande_id) REFERENCES details_commande (id)');
        $this->addSql('CREATE INDEX IDX_6EEAA67DE99004AB ON commande (details_commande_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE article DROP FOREIGN KEY FK_23A0E66E99004AB');
        $this->addSql('ALTER TABLE commande DROP FOREIGN KEY FK_6EEAA67DE99004AB');
        $this->addSql('DROP TABLE details_commande');
        $this->addSql('DROP INDEX IDX_23A0E66E99004AB ON article');
        $this->addSql('ALTER TABLE article DROP details_commande_id');
        $this->addSql('DROP INDEX IDX_6EEAA67DE99004AB ON commande');
        $this->addSql('ALTER TABLE commande DROP details_commande_id');
    }
}
