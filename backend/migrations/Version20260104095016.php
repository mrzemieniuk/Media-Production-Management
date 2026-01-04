<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20260104095016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE asset (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, filename VARCHAR(255) NOT NULL, metadata JSON DEFAULT NULL, status VARCHAR(255) NOT NULL, production_id INT NOT NULL, INDEX IDX_2AF5A5CECC6147F (production_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE production (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, status VARCHAR(255) NOT NULL, PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE production_member (id INT AUTO_INCREMENT NOT NULL, role VARCHAR(255) NOT NULL, production_id INT NOT NULL, person_id INT NOT NULL, INDEX IDX_BF446E25ECC6147F (production_id), INDEX IDX_BF446E25217BBB47 (person_id), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, last_name VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY (id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci`');
        $this->addSql('ALTER TABLE asset ADD CONSTRAINT FK_2AF5A5CECC6147F FOREIGN KEY (production_id) REFERENCES production (id)');
        $this->addSql('ALTER TABLE production_member ADD CONSTRAINT FK_BF446E25ECC6147F FOREIGN KEY (production_id) REFERENCES production (id)');
        $this->addSql('ALTER TABLE production_member ADD CONSTRAINT FK_BF446E25217BBB47 FOREIGN KEY (person_id) REFERENCES `user` (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE asset DROP FOREIGN KEY FK_2AF5A5CECC6147F');
        $this->addSql('ALTER TABLE production_member DROP FOREIGN KEY FK_BF446E25ECC6147F');
        $this->addSql('ALTER TABLE production_member DROP FOREIGN KEY FK_BF446E25217BBB47');
        $this->addSql('DROP TABLE asset');
        $this->addSql('DROP TABLE production');
        $this->addSql('DROP TABLE production_member');
        $this->addSql('DROP TABLE `user`');
    }
}
