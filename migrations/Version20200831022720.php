<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200831022720 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `label` (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE record ADD labell_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE record ADD CONSTRAINT FK_9B349F91B03DCBCB FOREIGN KEY (labell_id) REFERENCES `label` (id)');
        $this->addSql('CREATE INDEX IDX_9B349F91B03DCBCB ON record (labell_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE record DROP FOREIGN KEY FK_9B349F91B03DCBCB');
        $this->addSql('DROP TABLE `label`');
        $this->addSql('DROP INDEX IDX_9B349F91B03DCBCB ON record');
        $this->addSql('ALTER TABLE record DROP labell_id');
    }
}
