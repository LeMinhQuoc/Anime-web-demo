<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414100834 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE storie (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stories_type (stories_id INT NOT NULL, type_id INT NOT NULL, INDEX IDX_14067726BF2402DE (stories_id), INDEX IDX_14067726C54C8C93 (type_id), PRIMARY KEY(stories_id, type_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stories_video (stories_id INT NOT NULL, video_id INT NOT NULL, INDEX IDX_ECE01F9DBF2402DE (stories_id), INDEX IDX_ECE01F9D29C1004E (video_id), PRIMARY KEY(stories_id, video_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stories_audio (stories_id INT NOT NULL, audio_id INT NOT NULL, INDEX IDX_885AF324BF2402DE (stories_id), INDEX IDX_885AF3243A3123C7 (audio_id), PRIMARY KEY(stories_id, audio_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stories_author (stories_id INT NOT NULL, author_id INT NOT NULL, INDEX IDX_1597C17BF2402DE (stories_id), INDEX IDX_1597C17F675F31B (author_id), PRIMARY KEY(stories_id, author_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE stories_type ADD CONSTRAINT FK_14067726BF2402DE FOREIGN KEY (stories_id) REFERENCES stories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_type ADD CONSTRAINT FK_14067726C54C8C93 FOREIGN KEY (type_id) REFERENCES type (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_video ADD CONSTRAINT FK_ECE01F9DBF2402DE FOREIGN KEY (stories_id) REFERENCES stories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_video ADD CONSTRAINT FK_ECE01F9D29C1004E FOREIGN KEY (video_id) REFERENCES video (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_audio ADD CONSTRAINT FK_885AF324BF2402DE FOREIGN KEY (stories_id) REFERENCES stories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_audio ADD CONSTRAINT FK_885AF3243A3123C7 FOREIGN KEY (audio_id) REFERENCES audio (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_author ADD CONSTRAINT FK_1597C17BF2402DE FOREIGN KEY (stories_id) REFERENCES stories (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories_author ADD CONSTRAINT FK_1597C17F675F31B FOREIGN KEY (author_id) REFERENCES author (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F1BD125E3');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F6AEACF52');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F76404F3C');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F791AECDB');
        $this->addSql('DROP INDEX UNIQ_9C8B9D5F6AEACF52 ON stories');
        $this->addSql('DROP INDEX UNIQ_9C8B9D5F1BD125E3 ON stories');
        $this->addSql('DROP INDEX IDX_9C8B9D5F76404F3C ON stories');
        $this->addSql('DROP INDEX UNIQ_9C8B9D5F791AECDB ON stories');
        $this->addSql('ALTER TABLE stories DROP id_video_id, DROP id_audio_id, DROP id_type_id, DROP id_author_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE storie');
        $this->addSql('DROP TABLE stories_type');
        $this->addSql('DROP TABLE stories_video');
        $this->addSql('DROP TABLE stories_audio');
        $this->addSql('DROP TABLE stories_author');
        $this->addSql('ALTER TABLE stories ADD id_video_id INT NOT NULL, ADD id_audio_id INT NOT NULL, ADD id_type_id INT NOT NULL, ADD id_author_id INT NOT NULL');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F1BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F6AEACF52 FOREIGN KEY (id_audio_id) REFERENCES audio (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F76404F3C FOREIGN KEY (id_author_id) REFERENCES author (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F791AECDB FOREIGN KEY (id_video_id) REFERENCES video (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C8B9D5F6AEACF52 ON stories (id_audio_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C8B9D5F1BD125E3 ON stories (id_type_id)');
        $this->addSql('CREATE INDEX IDX_9C8B9D5F76404F3C ON stories (id_author_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_9C8B9D5F791AECDB ON stories (id_video_id)');
    }
}
