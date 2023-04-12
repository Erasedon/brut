<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411124133 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles DROP FOREIGN KEY FK_BFDD31688706DDAD');
        $this->addSql('DROP INDEX IDX_BFDD31688706DDAD ON articles');
        $this->addSql('ALTER TABLE articles DROP fav_articles_id');
        $this->addSql('ALTER TABLE creer_articles ADD creationsarticles_id INT DEFAULT NULL, ADD favarticles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE creer_articles ADD CONSTRAINT FK_EF750E9B43DEE060 FOREIGN KEY (creationsarticles_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE creer_articles ADD CONSTRAINT FK_EF750E9BC88BDDB7 FOREIGN KEY (favarticles_id) REFERENCES articles (id)');
        $this->addSql('CREATE INDEX IDX_EF750E9B43DEE060 ON creer_articles (creationsarticles_id)');
        $this->addSql('CREATE INDEX IDX_EF750E9BC88BDDB7 ON creer_articles (favarticles_id)');
        $this->addSql('ALTER TABLE users DROP FOREIGN KEY FK_1483A5E929EB3AF3');
        $this->addSql('DROP INDEX IDX_1483A5E929EB3AF3 ON users');
        $this->addSql('ALTER TABLE users DROP creer_articles_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE articles ADD fav_articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE articles ADD CONSTRAINT FK_BFDD31688706DDAD FOREIGN KEY (fav_articles_id) REFERENCES creer_articles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_BFDD31688706DDAD ON articles (fav_articles_id)');
        $this->addSql('ALTER TABLE users ADD creer_articles_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE users ADD CONSTRAINT FK_1483A5E929EB3AF3 FOREIGN KEY (creer_articles_id) REFERENCES creer_articles (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_1483A5E929EB3AF3 ON users (creer_articles_id)');
        $this->addSql('ALTER TABLE creer_articles DROP FOREIGN KEY FK_EF750E9B43DEE060');
        $this->addSql('ALTER TABLE creer_articles DROP FOREIGN KEY FK_EF750E9BC88BDDB7');
        $this->addSql('DROP INDEX IDX_EF750E9B43DEE060 ON creer_articles');
        $this->addSql('DROP INDEX IDX_EF750E9BC88BDDB7 ON creer_articles');
        $this->addSql('ALTER TABLE creer_articles DROP creationsarticles_id, DROP favarticles_id');
    }
}
