<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412064938 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE sous_categories_forum (sous_categories_id INT NOT NULL, forum_id INT NOT NULL, INDEX IDX_C5E0F7BE9F751138 (sous_categories_id), INDEX IDX_C5E0F7BE29CCBAD0 (forum_id), PRIMARY KEY(sous_categories_id, forum_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categories_drive (sous_categories_id INT NOT NULL, drive_id INT NOT NULL, INDEX IDX_28D6BCFC9F751138 (sous_categories_id), INDEX IDX_28D6BCFC86E5E0C4 (drive_id), PRIMARY KEY(sous_categories_id, drive_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sous_categories_suggestion (sous_categories_id INT NOT NULL, suggestion_id INT NOT NULL, INDEX IDX_E86D48179F751138 (sous_categories_id), INDEX IDX_E86D4817A41BB822 (suggestion_id), PRIMARY KEY(sous_categories_id, suggestion_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE sous_categories_forum ADD CONSTRAINT FK_C5E0F7BE9F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sous_categories_forum ADD CONSTRAINT FK_C5E0F7BE29CCBAD0 FOREIGN KEY (forum_id) REFERENCES forum (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sous_categories_drive ADD CONSTRAINT FK_28D6BCFC9F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sous_categories_drive ADD CONSTRAINT FK_28D6BCFC86E5E0C4 FOREIGN KEY (drive_id) REFERENCES drive (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sous_categories_suggestion ADD CONSTRAINT FK_E86D48179F751138 FOREIGN KEY (sous_categories_id) REFERENCES sous_categories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE sous_categories_suggestion ADD CONSTRAINT FK_E86D4817A41BB822 FOREIGN KEY (suggestion_id) REFERENCES suggestion (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE sous_categories_forum DROP FOREIGN KEY FK_C5E0F7BE9F751138');
        $this->addSql('ALTER TABLE sous_categories_forum DROP FOREIGN KEY FK_C5E0F7BE29CCBAD0');
        $this->addSql('ALTER TABLE sous_categories_drive DROP FOREIGN KEY FK_28D6BCFC9F751138');
        $this->addSql('ALTER TABLE sous_categories_drive DROP FOREIGN KEY FK_28D6BCFC86E5E0C4');
        $this->addSql('ALTER TABLE sous_categories_suggestion DROP FOREIGN KEY FK_E86D48179F751138');
        $this->addSql('ALTER TABLE sous_categories_suggestion DROP FOREIGN KEY FK_E86D4817A41BB822');
        $this->addSql('DROP TABLE sous_categories_forum');
        $this->addSql('DROP TABLE sous_categories_drive');
        $this->addSql('DROP TABLE sous_categories_suggestion');
    }
}
