<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411123407 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE creer_articles (id INT AUTO_INCREMENT NOT NULL, creation_articles TINYINT(1) NOT NULL, favoris_articles TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE articles ADD fav_articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31688706DDAD FOREIGN KEY (fav_articles_id) REFERENCES creer_articles (id)');
        $this->addSql('CREATE INDEX IDX_BFDD31688706DDAD ON articles (fav_articles_id)');
        $this->addSql('ALTER TABLE users ADD creer_articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E929EB3AF3 FOREIGN KEY (creer_articles_id) REFERENCES creer_articles (id)');
        $this->addSql('CREATE INDEX IDX_1483A5E929EB3AF3 ON users (creer_articles_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31688706DDAD');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E929EB3AF3');
        $this->addSql('DROP TABLE creer_articles');
        $this->addSql('DROP INDEX IDX_BFDD31688706DDAD ON articles');
        $this->addSql('ALTER TABLE articles DROP fav_articles_id');
        $this->addSql('DROP INDEX IDX_1483A5E929EB3AF3 ON users');
        $this->addSql('ALTER TABLE users DROP creer_articles_id');
    }
}
