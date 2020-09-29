<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200915011459 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE goodies_line (id INT AUTO_INCREMENT NOT NULL, goodies_id INT NOT NULL, cart_id INT NOT NULL, quantity INT NOT NULL, INDEX IDX_14DF3A0EBBFA5614 (goodies_id), INDEX IDX_14DF3A0E1AD5CDBF (cart_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE goodies_line ADD CONSTRAINT FK_14DF3A0EBBFA5614 FOREIGN KEY (goodies_id) REFERENCES goodies (id)');
        $this->addSql('ALTER TABLE goodies_line ADD CONSTRAINT FK_14DF3A0E1AD5CDBF FOREIGN KEY (cart_id) REFERENCES cart (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE goodies_line');
    }
}
