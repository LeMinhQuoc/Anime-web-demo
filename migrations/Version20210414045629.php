<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414045629 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stories ADD id_author_id INT NOT NULL');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F76404F3C FOREIGN KEY (id_author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_9C8B9D5F76404F3C ON stories (id_author_id)');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D64976404F3C');
        $this->addSql('DROP INDEX IDX_8D93D64976404F3C ON user');
        $this->addSql('ALTER TABLE user DROP id_author_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F76404F3C');
        $this->addSql('DROP INDEX IDX_9C8B9D5F76404F3C ON stories');
        $this->addSql('ALTER TABLE stories DROP id_author_id');
        $this->addSql('ALTER TABLE user ADD id_author_id INT NOT NULL');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D64976404F3C FOREIGN KEY (id_author_id) REFERENCES author (id)');
        $this->addSql('CREATE INDEX IDX_8D93D64976404F3C ON user (id_author_id)');
    }
}
