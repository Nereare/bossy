<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20251001155540 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE shift (id INT AUTO_INCREMENT NOT NULL, head_id INT NOT NULL, date DATE NOT NULL, turn VARCHAR(255) NOT NULL, INDEX IDX_A50B3B45F41A619E (head_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shift_worker (shift_id INT NOT NULL, worker_id INT NOT NULL, INDEX IDX_136A2D77BB70BC0E (shift_id), INDEX IDX_136A2D776B20BA36 (worker_id), PRIMARY KEY(shift_id, worker_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE shiftstation (id INT AUTO_INCREMENT NOT NULL, worker_id INT NOT NULL, shift_id INT NOT NULL, station VARCHAR(128) NOT NULL, quality_score SMALLINT DEFAULT NULL, speed_score SMALLINT DEFAULT NULL, self_sufficiency_score SMALLINT DEFAULT NULL, team_relation_score SMALLINT DEFAULT NULL, patient_relation_score SMALLINT DEFAULT NULL, INDEX IDX_EAD28D276B20BA36 (worker_id), INDEX IDX_EAD28D27BB70BC0E (shift_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, current_shift_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, first_name VARCHAR(128) DEFAULT NULL, last_name VARCHAR(256) DEFAULT NULL, crm_state VARCHAR(2) NOT NULL, crm_number INT NOT NULL, email VARCHAR(512) NOT NULL, UNIQUE INDEX UNIQ_8D93D6492608C624 (current_shift_id), UNIQUE INDEX UNIQ_IDENTIFIER_USERNAME (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE worker (id INT AUTO_INCREMENT NOT NULL, first_name VARCHAR(128) NOT NULL, last_name VARCHAR(512) NOT NULL, prefix VARCHAR(8) NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(512) NOT NULL, phone_ddi VARCHAR(4) NOT NULL, phone_ddd VARCHAR(2) NOT NULL, phone_number VARCHAR(10) NOT NULL, notes LONGTEXT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE shift ADD CONSTRAINT FK_A50B3B45F41A619E FOREIGN KEY (head_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE shift_worker ADD CONSTRAINT FK_136A2D77BB70BC0E FOREIGN KEY (shift_id) REFERENCES shift (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shift_worker ADD CONSTRAINT FK_136A2D776B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE shiftstation ADD CONSTRAINT FK_EAD28D276B20BA36 FOREIGN KEY (worker_id) REFERENCES worker (id)');
        $this->addSql('ALTER TABLE shiftstation ADD CONSTRAINT FK_EAD28D27BB70BC0E FOREIGN KEY (shift_id) REFERENCES shift (id)');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D6492608C624 FOREIGN KEY (current_shift_id) REFERENCES shift (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE shift DROP FOREIGN KEY FK_A50B3B45F41A619E');
        $this->addSql('ALTER TABLE shift_worker DROP FOREIGN KEY FK_136A2D77BB70BC0E');
        $this->addSql('ALTER TABLE shift_worker DROP FOREIGN KEY FK_136A2D776B20BA36');
        $this->addSql('ALTER TABLE shiftstation DROP FOREIGN KEY FK_EAD28D276B20BA36');
        $this->addSql('ALTER TABLE shiftstation DROP FOREIGN KEY FK_EAD28D27BB70BC0E');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D6492608C624');
        $this->addSql('DROP TABLE shift');
        $this->addSql('DROP TABLE shift_worker');
        $this->addSql('DROP TABLE shiftstation');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE worker');
    }
}
