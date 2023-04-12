<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230411134629 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partager ADD userpart_id INT DEFAULT NULL, ADD drivepart_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE partager ADD CONSTRAINT FK_C688215CD082B752 FOREIGN KEY (userpart_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE partager ADD CONSTRAINT FK_C688215C1100D582 FOREIGN KEY (drivepart_id) REFERENCES drive (id)');
        $this->addSql('CREATE INDEX IDX_C688215CD082B752 ON partager (userpart_id)');
        $this->addSql('CREATE INDEX IDX_C688215C1100D582 ON partager (drivepart_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE partager DROP FOREIGN KEY FK_C688215CD082B752');
        $this->addSql('ALTER TABLE partager DROP FOREIGN KEY FK_C688215C1100D582');
        $this->addSql('DROP INDEX IDX_C688215CD082B752 ON partager');
        $this->addSql('DROP INDEX IDX_C688215C1100D582 ON partager');
        $this->addSql('ALTER TABLE partager DROP userpart_id, DROP drivepart_id');
    }
}
