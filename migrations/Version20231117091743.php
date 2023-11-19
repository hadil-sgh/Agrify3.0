<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231117091743 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, animal_id VARCHAR(255) NOT NULL, medicament VARCHAR(255) NOT NULL, type_de_traitement VARCHAR(255) NOT NULL, dosage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, type_rec_id INT NOT NULL, rec_emp VARCHAR(255) NOT NULL, rec_date DATE NOT NULL, rec_description VARCHAR(255) NOT NULL, rec_target VARCHAR(255) NOT NULL, urgency VARCHAR(255) NOT NULL, INDEX IDX_CE60640435BEDAA3 (type_rec_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typede_reclamation (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640435BEDAA3 FOREIGN KEY (type_rec_id) REFERENCES typede_reclamation (id)');
        $this->addSql('ALTER TABLE field CHANGE field_id field_id INT AUTO_INCREMENT NOT NULL');
        $this->addSql('ALTER TABLE gestation ADD preparation_velage DATE NOT NULL, ADD velage_prevu DATE NOT NULL, DROP preparation_vêlage, DROP vêlage_prévu');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_8D93D649F85E0677 ON user (username)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640435BEDAA3');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE typede_reclamation');
        $this->addSql('ALTER TABLE field CHANGE field_id field_id INT NOT NULL');
        $this->addSql('ALTER TABLE gestation ADD preparation_vêlage DATE NOT NULL, ADD vêlage_prévu DATE NOT NULL, DROP preparation_velage, DROP velage_prevu');
        $this->addSql('DROP INDEX UNIQ_8D93D649F85E0677 ON user');
    }
}
