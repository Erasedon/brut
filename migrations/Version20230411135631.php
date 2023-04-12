<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411135631 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE reponse_forum (id INT AUTO_INCREMENT NOT NULL, usersrf_id INT DEFAULT NULL, mediarf_id INT DEFAULT NULL, forumrf_id INT DEFAULT NULL, description_rf VARCHAR(2000) NOT NULL, date_rf DATETIME NOT NULL, INDEX IDX_6AC2C5AE50D1CE5A (usersrf_id), INDEX IDX_6AC2C5AE5C1F5F87 (mediarf_id), INDEX IDX_6AC2C5AE5CB92083 (forumrf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reponse_forum ADD CONSTRAINT FK_6AC2C5AE50D1CE5A FOREIGN KEY (usersrf_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE reponse_forum ADD CONSTRAINT FK_6AC2C5AE5C1F5F87 FOREIGN KEY (mediarf_id) REFERENCES media (id)');
        $this->addSql('ALTER TABLE reponse_forum ADD CONSTRAINT FK_6AC2C5AE5CB92083 FOREIGN KEY (forumrf_id) REFERENCES forum (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reponse_forum DROP FOREIGN KEY FK_6AC2C5AE50D1CE5A');
        $this->addSql('ALTER TABLE reponse_forum DROP FOREIGN KEY FK_6AC2C5AE5C1F5F87');
        $this->addSql('ALTER TABLE reponse_forum DROP FOREIGN KEY FK_6AC2C5AE5CB92083');
        $this->addSql('DROP TABLE reponse_forum');
    }
}
