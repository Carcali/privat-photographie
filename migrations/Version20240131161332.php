<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240131161332 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contact (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL, mail VARCHAR(255) NOT NULL, message LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE etiquette (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, description VARCHAR(600) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_category (projet_id INT NOT NULL, category_id INT NOT NULL, INDEX IDX_21CC7236C18272 (projet_id), INDEX IDX_21CC723612469DE2 (category_id), PRIMARY KEY(projet_id, category_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet_etiquette (projet_id INT NOT NULL, etiquette_id INT NOT NULL, INDEX IDX_3DF0FE8EC18272 (projet_id), INDEX IDX_3DF0FE8E7BD2EA57 (etiquette_id), PRIMARY KEY(projet_id, etiquette_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE projet_category ADD CONSTRAINT FK_21CC7236C18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_category ADD CONSTRAINT FK_21CC723612469DE2 FOREIGN KEY (category_id) REFERENCES category (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_etiquette ADD CONSTRAINT FK_3DF0FE8EC18272 FOREIGN KEY (projet_id) REFERENCES projet (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE projet_etiquette ADD CONSTRAINT FK_3DF0FE8E7BD2EA57 FOREIGN KEY (etiquette_id) REFERENCES etiquette (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projet_category DROP FOREIGN KEY FK_21CC7236C18272');
        $this->addSql('ALTER TABLE projet_category DROP FOREIGN KEY FK_21CC723612469DE2');
        $this->addSql('ALTER TABLE projet_etiquette DROP FOREIGN KEY FK_3DF0FE8EC18272');
        $this->addSql('ALTER TABLE projet_etiquette DROP FOREIGN KEY FK_3DF0FE8E7BD2EA57');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE contact');
        $this->addSql('DROP TABLE etiquette');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE projet_category');
        $this->addSql('DROP TABLE projet_etiquette');
    }
}
