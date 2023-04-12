<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230412065806 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE drive_media (drive_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_6B91216A86E5E0C4 (drive_id), INDEX IDX_6B91216AEA9FDD75 (media_id), PRIMARY KEY(drive_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suggestion_media (suggestion_id INT NOT NULL, media_id INT NOT NULL, INDEX IDX_EE99851DA41BB822 (suggestion_id), INDEX IDX_EE99851DEA9FDD75 (media_id), PRIMARY KEY(suggestion_id, media_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE suggestion_users (suggestion_id INT NOT NULL, users_id INT NOT NULL, INDEX IDX_903681F8A41BB822 (suggestion_id), INDEX IDX_903681F867B3B43D (users_id), PRIMARY KEY(suggestion_id, users_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE drive_media ADD CONSTRAINT FK_6B91216A86E5E0C4 FOREIGN KEY (drive_id) REFERENCES drive (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE drive_media ADD CONSTRAINT FK_6B91216AEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suggestion_media ADD CONSTRAINT FK_EE99851DA41BB822 FOREIGN KEY (suggestion_id) REFERENCES suggestion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suggestion_media ADD CONSTRAINT FK_EE99851DEA9FDD75 FOREIGN KEY (media_id) REFERENCES media (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suggestion_users ADD CONSTRAINT FK_903681F8A41BB822 FOREIGN KEY (suggestion_id) REFERENCES suggestion (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE suggestion_users ADD CONSTRAINT FK_903681F867B3B43D FOREIGN KEY (users_id) REFERENCES users (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE drive_media DROP FOREIGN KEY FK_6B91216A86E5E0C4');
        $this->addSql('ALTER TABLE drive_media DROP FOREIGN KEY FK_6B91216AEA9FDD75');
        $this->addSql('ALTER TABLE suggestion_media DROP FOREIGN KEY FK_EE99851DA41BB822');
        $this->addSql('ALTER TABLE suggestion_media DROP FOREIGN KEY FK_EE99851DEA9FDD75');
        $this->addSql('ALTER TABLE suggestion_users DROP FOREIGN KEY FK_903681F8A41BB822');
        $this->addSql('ALTER TABLE suggestion_users DROP FOREIGN KEY FK_903681F867B3B43D');
        $this->addSql('DROP TABLE drive_media');
        $this->addSql('DROP TABLE suggestion_media');
        $this->addSql('DROP TABLE suggestion_users');
    }
}
