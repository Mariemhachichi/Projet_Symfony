<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20241218233427 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance ADD enseignant_id INT DEFAULT NULL, ADD etudiant_id INT NOT NULL');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6EE455FCC0 FOREIGN KEY (enseignant_id) REFERENCES enseignant (id)');
        $this->addSql('ALTER TABLE soutenance ADD CONSTRAINT FK_4D59FF6EDDEAB1A3 FOREIGN KEY (etudiant_id) REFERENCES etudiant (id)');
        $this->addSql('CREATE INDEX IDX_4D59FF6EE455FCC0 ON soutenance (enseignant_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4D59FF6EDDEAB1A3 ON soutenance (etudiant_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6EE455FCC0');
        $this->addSql('ALTER TABLE soutenance DROP FOREIGN KEY FK_4D59FF6EDDEAB1A3');
        $this->addSql('DROP INDEX IDX_4D59FF6EE455FCC0 ON soutenance');
        $this->addSql('DROP INDEX UNIQ_4D59FF6EDDEAB1A3 ON soutenance');
        $this->addSql('ALTER TABLE soutenance DROP enseignant_id, DROP etudiant_id');
    }
}
