<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191220104252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE books (id INT AUTO_INCREMENT NOT NULL, authors_id INT DEFAULT NULL, prices_id INT DEFAULT NULL, title VARCHAR(120) NOT NULL, description LONGTEXT DEFAULT NULL, cover VARCHAR(255) DEFAULT NULL, INDEX IDX_4A1B2A926DE2013A (authors_id), INDEX IDX_4A1B2A92D9C9DE39 (prices_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE authors (id INT AUTO_INCREMENT NOT NULL, firstname VARCHAR(80) NOT NULL, lastname VARCHAR(80) NOT NULL, nickname VARCHAR(80) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE books_prices (id INT AUTO_INCREMENT NOT NULL, quantity INT NOT NULL, price NUMERIC(5, 2) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A926DE2013A FOREIGN KEY (authors_id) REFERENCES authors (id)');
        $this->addSql('ALTER TABLE books ADD CONSTRAINT FK_4A1B2A92D9C9DE39 FOREIGN KEY (prices_id) REFERENCES books_prices (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A926DE2013A');
        $this->addSql('ALTER TABLE books DROP FOREIGN KEY FK_4A1B2A92D9C9DE39');
        $this->addSql('DROP TABLE books');
        $this->addSql('DROP TABLE authors');
        $this->addSql('DROP TABLE books_prices');
    }
}
