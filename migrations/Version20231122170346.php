<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231122170346 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal (id INT AUTO_INCREMENT NOT NULL, nutritional_needs_id INT DEFAULT NULL, ration_id INT DEFAULT NULL, gestation_id INT DEFAULT NULL, espece VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, poids DOUBLE PRECISION DEFAULT NULL, age VARCHAR(255) NOT NULL, unit_animal VARCHAR(255) NOT NULL, INDEX IDX_6AAB231F90D0435D (nutritional_needs_id), INDEX IDX_6AAB231F4A5A89FC (ration_id), UNIQUE INDEX UNIQ_6AAB231FC4ABA3D1 (gestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field (field_id INT AUTO_INCREMENT NOT NULL, field_nom VARCHAR(255) NOT NULL, field_type VARCHAR(255) NOT NULL, field_superficie BIGINT NOT NULL, field_quantity INT NOT NULL, field_chef VARCHAR(255) NOT NULL, PRIMARY KEY(field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestation (id INT AUTO_INCREMENT NOT NULL, espece VARCHAR(255) NOT NULL, preparation_velage DATE NOT NULL, velage_prevu DATE NOT NULL, date_avertissement DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, ration_id INT DEFAULT NULL, nutritional_value_id INT DEFAULT NULL, name_ingredient VARCHAR(255) NOT NULL, item_quantity_ingredient DOUBLE PRECISION NOT NULL, unit_ingredient VARCHAR(255) NOT NULL, cost_ingredient DOUBLE PRECISION NOT NULL, loaded_by_ingredient VARCHAR(255) NOT NULL, description_ingredient LONGTEXT DEFAULT NULL, type_ingredient VARCHAR(255) NOT NULL, nutriment_principal_ingredient LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', INDEX IDX_6BAF78704A5A89FC (ration_id), UNIQUE INDEX UNIQ_6BAF7870C43CAA69 (nutritional_value_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maladie (id INT AUTO_INCREMENT NOT NULL, animal_id VARCHAR(255) NOT NULL, medicament VARCHAR(255) NOT NULL, type_de_traitement VARCHAR(255) NOT NULL, dosage VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newborns (id INT AUTO_INCREMENT NOT NULL, gestation_id INT DEFAULT NULL, sexe VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, espece VARCHAR(255) NOT NULL, poids DOUBLE PRECISION NOT NULL, INDEX IDX_8A5A2A32C4ABA3D1 (gestation_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_needs (id INT AUTO_INCREMENT NOT NULL, species_needs VARCHAR(255) NOT NULL, production_status_needs VARCHAR(255) NOT NULL, sex_needs VARCHAR(255) NOT NULL, minimum_weight_needs DOUBLE PRECISION NOT NULL, maximum_weight_needs DOUBLE PRECISION NOT NULL, production_goal_needs VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value_needs (id INT AUTO_INCREMENT NOT NULL, nutritional_needs_id INT DEFAULT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, UNIQUE INDEX UNIQ_4FDD3D0690D0435D (nutritional_needs_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presence (id_p INT AUTO_INCREMENT NOT NULL, date DATE NOT NULL, presence_state VARCHAR(255) NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ration (id INT AUTO_INCREMENT NOT NULL, espece_ration VARCHAR(255) NOT NULL, statut_ration VARCHAR(255) NOT NULL, sexe_ration VARCHAR(255) NOT NULL, poids_min_ration DOUBLE PRECISION NOT NULL, poids_max_ration DOUBLE PRECISION NOT NULL, bute_production_ration VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reclamation (id INT AUTO_INCREMENT NOT NULL, type_rec_id INT NOT NULL, rec_emp VARCHAR(255) NOT NULL, rec_date DATE NOT NULL, rec_description VARCHAR(255) NOT NULL, rec_target VARCHAR(255) NOT NULL, urgency VARCHAR(255) NOT NULL, INDEX IDX_CE60640435BEDAA3 (type_rec_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE todo (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE typede_reclamation (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (user_id INT AUTO_INCREMENT NOT NULL, user_nom VARCHAR(255) NOT NULL, user_prenom VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_telephone VARCHAR(255) NOT NULL, user_role VARCHAR(255) NOT NULL, user_genre VARCHAR(255) NOT NULL, user_nbrabscence INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F90D0435D FOREIGN KEY (nutritional_needs_id) REFERENCES nutritional_needs (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F4A5A89FC FOREIGN KEY (ration_id) REFERENCES ration (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FC4ABA3D1 FOREIGN KEY (gestation_id) REFERENCES gestation (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78704A5A89FC FOREIGN KEY (ration_id) REFERENCES ration (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C43CAA69 FOREIGN KEY (nutritional_value_id) REFERENCES nutritional_value (id)');
        $this->addSql('ALTER TABLE newborns ADD CONSTRAINT FK_8A5A2A32C4ABA3D1 FOREIGN KEY (gestation_id) REFERENCES gestation (id)');
        $this->addSql('ALTER TABLE nutritional_value_needs ADD CONSTRAINT FK_4FDD3D0690D0435D FOREIGN KEY (nutritional_needs_id) REFERENCES nutritional_needs (id)');
        $this->addSql('ALTER TABLE reclamation ADD CONSTRAINT FK_CE60640435BEDAA3 FOREIGN KEY (type_rec_id) REFERENCES typede_reclamation (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F90D0435D');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F4A5A89FC');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FC4ABA3D1');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78704A5A89FC');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C43CAA69');
        $this->addSql('ALTER TABLE newborns DROP FOREIGN KEY FK_8A5A2A32C4ABA3D1');
        $this->addSql('ALTER TABLE nutritional_value_needs DROP FOREIGN KEY FK_4FDD3D0690D0435D');
        $this->addSql('ALTER TABLE reclamation DROP FOREIGN KEY FK_CE60640435BEDAA3');
        $this->addSql('DROP TABLE animal');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE gestation');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE maladie');
        $this->addSql('DROP TABLE newborns');
        $this->addSql('DROP TABLE nutritional_needs');
        $this->addSql('DROP TABLE nutritional_value');
        $this->addSql('DROP TABLE nutritional_value_needs');
        $this->addSql('DROP TABLE presence');
        $this->addSql('DROP TABLE ration');
        $this->addSql('DROP TABLE reclamation');
        $this->addSql('DROP TABLE todo');
        $this->addSql('DROP TABLE typede_reclamation');
        $this->addSql('DROP TABLE user');
    }
}
