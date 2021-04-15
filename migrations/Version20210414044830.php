<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210414044830 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE audio (id INT AUTO_INCREMENT NOT NULL, link_audio VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE author (id INT AUTO_INCREMENT NOT NULL, author_name VARCHAR(100) NOT NULL, country VARCHAR(100) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_story_id INT NOT NULL, content VARCHAR(255) NOT NULL, INDEX IDX_9474526C79F37AE5 (id_user_id), INDEX IDX_9474526CFA86ACA3 (id_story_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE rating (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_story_id INT NOT NULL, point INT NOT NULL, INDEX IDX_D889262279F37AE5 (id_user_id), INDEX IDX_D8892622FA86ACA3 (id_story_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE stories (id INT AUTO_INCREMENT NOT NULL, id_video_id INT NOT NULL, id_audio_id INT NOT NULL, id_type_id INT NOT NULL, image VARCHAR(255) NOT NULL, story_name VARCHAR(255) NOT NULL, content VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_9C8B9D5F791AECDB (id_video_id), UNIQUE INDEX UNIQ_9C8B9D5F6AEACF52 (id_audio_id), UNIQUE INDEX UNIQ_9C8B9D5F1BD125E3 (id_type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(100) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, full_name VARCHAR(100) NOT NULL, avatar VARCHAR(255) NOT NULL, phone_number VARCHAR(20) NOT NULL, email VARCHAR(150) NOT NULL, role VARCHAR(10) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE video (id INT AUTO_INCREMENT NOT NULL, link_video VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wish_list (id INT AUTO_INCREMENT NOT NULL, id_user_id INT NOT NULL, id_story_id INT NOT NULL, INDEX IDX_5B8739BD79F37AE5 (id_user_id), INDEX IDX_5B8739BDFA86ACA3 (id_story_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526C79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CFA86ACA3 FOREIGN KEY (id_story_id) REFERENCES stories (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D889262279F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE rating ADD CONSTRAINT FK_D8892622FA86ACA3 FOREIGN KEY (id_story_id) REFERENCES stories (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F791AECDB FOREIGN KEY (id_video_id) REFERENCES video (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F6AEACF52 FOREIGN KEY (id_audio_id) REFERENCES audio (id)');
        $this->addSql('ALTER TABLE stories ADD CONSTRAINT FK_9C8B9D5F1BD125E3 FOREIGN KEY (id_type_id) REFERENCES type (id)');
        $this->addSql('ALTER TABLE wish_list ADD CONSTRAINT FK_5B8739BD79F37AE5 FOREIGN KEY (id_user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE wish_list ADD CONSTRAINT FK_5B8739BDFA86ACA3 FOREIGN KEY (id_story_id) REFERENCES stories (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F6AEACF52');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CFA86ACA3');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D8892622FA86ACA3');
        $this->addSql('ALTER TABLE wish_list DROP FOREIGN KEY FK_5B8739BDFA86ACA3');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F1BD125E3');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526C79F37AE5');
        $this->addSql('ALTER TABLE rating DROP FOREIGN KEY FK_D889262279F37AE5');
        $this->addSql('ALTER TABLE wish_list DROP FOREIGN KEY FK_5B8739BD79F37AE5');
        $this->addSql('ALTER TABLE stories DROP FOREIGN KEY FK_9C8B9D5F791AECDB');
        $this->addSql('DROP TABLE audio');
        $this->addSql('DROP TABLE author');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE rating');
        $this->addSql('DROP TABLE stories');
        $this->addSql('DROP TABLE type');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE video');
        $this->addSql('DROP TABLE wish_list');
    }
}
