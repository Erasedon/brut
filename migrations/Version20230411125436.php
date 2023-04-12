<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411125436 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creer_forum (id INT AUTO_INCREMENT NOT NULL, creationf_id INT DEFAULT NULL, favorisf_id INT DEFAULT NULL, creation_forum TINYINT(1) NOT NULL, favoris_forum TINYINT(1) NOT NULL, INDEX IDX_1BD44CB490589F74 (creationf_id), INDEX IDX_1BD44CB4A823BE3 (favorisf_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE users_groupe (users_id INT NOT NULL, groupe_id INT NOT NULL, INDEX IDX_B5E02B167B3B43D (users_id), INDEX IDX_B5E02B17A45358C (groupe_id), PRIMARY KEY(users_id, groupe_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE creer_forum ADD CONSTRAINT FK_1BD44CB490589F74 FOREIGN KEY (creationf_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE creer_forum ADD CONSTRAINT FK_1BD44CB4A823BE3 FOREIGN KEY (favorisf_id) REFERENCES forum (id)');
        $this->addSql('ALTER TABLE users_groupe ADD CONSTRAINT FK_B5E02B167B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE users_groupe ADD CONSTRAINT FK_B5E02B17A45358C FOREIGN KEY (groupe_id) REFERENCES groupe (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE creer_forum DROP FOREIGN KEY FK_1BD44CB490589F74');
        $this->addSql('ALTER TABLE creer_forum DROP FOREIGN KEY FK_1BD44CB4A823BE3');
        $this->addSql('ALTER TABLE users_groupe DROP FOREIGN KEY FK_B5E02B167B3B43D');
        $this->addSql('ALTER TABLE users_groupe DROP FOREIGN KEY FK_B5E02B17A45358C');
        $this->addSql('DROP TABLE creer_forum');
        $this->addSql('DROP TABLE users_groupe');
    }
}
