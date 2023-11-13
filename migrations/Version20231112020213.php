<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231112020213 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE AnimalBatch (id INT AUTO_INCREMENT NOT NULL, espece_AnimalBatch VARCHAR(255) NOT NULL, sexe_ration VARCHAR(255) NOT NULL, poidsmax_ration DOUBLE PRECISION NOT NULL, poidsmin_ration DOUBLE PRECISION NOT NULL, age_AnimalBatch VARCHAR(255) NOT NULL, nombre_AnimalBatch INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field (field_id INT NOT NULL, field_nom VARCHAR(255) NOT NULL, field_chef VARCHAR(255) NOT NULL, field_type VARCHAR(255) NOT NULL, field_superficie BIGINT NOT NULL, field_quantity INT NOT NULL, PRIMARY KEY(field_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gestation (id INT AUTO_INCREMENT NOT NULL, espece VARCHAR(255) NOT NULL, preparation_vêlage DATE NOT NULL, vêlage_prévu DATE NOT NULL, date_avertissement DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name_ingredient VARCHAR(255) NOT NULL, item_quantity_ingredient DOUBLE PRECISION NOT NULL, unit_ingredient VARCHAR(255) NOT NULL, cost_ingredient DOUBLE PRECISION NOT NULL, loaded_by_ingredient VARCHAR(255) NOT NULL, description_ingredient LONGTEXT DEFAULT NULL, type_ingredient VARCHAR(255) NOT NULL, nutriment_principal_ingredient LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE newborns (id INT AUTO_INCREMENT NOT NULL, sexe VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, espece VARCHAR(255) NOT NULL, poids DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value_needs (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_needs (id INT AUTO_INCREMENT NOT NULL, espece_besoin_nutritionnel VARCHAR(255) NOT NULL, statut_production_besoin_nutritionnel VARCHAR(255) NOT NULL, sexe_besoin_nutritionnel VARCHAR(255) NOT NULL, poids_min_besoin_nutritionnel DOUBLE PRECISION NOT NULL, poids_max_besoin_nutritionnel DOUBLE PRECISION NOT NULL, bute_production_besoin_nutritionnel VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE presence (id_p INT NOT NULL, date DATE NOT NULL, presence_state VARCHAR(255) NOT NULL, PRIMARY KEY(id_p)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ration (id INT AUTO_INCREMENT NOT NULL, espece_ration VARCHAR(255) NOT NULL, statut_ration VARCHAR(255) NOT NULL, sexe_ration VARCHAR(255) NOT NULL, poids_min_ration DOUBLE PRECISION NOT NULL, poids_max_ration DOUBLE PRECISION NOT NULL, bute_production_ration VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE todo (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (user_id INT AUTO_INCREMENT NOT NULL, user_nom VARCHAR(255) NOT NULL, user_prenom VARCHAR(255) NOT NULL, user_email VARCHAR(255) NOT NULL, user_telephone VARCHAR(255) NOT NULL, user_role VARCHAR(255) NOT NULL, user_genre VARCHAR(255) NOT NULL, user_nbrabscence INT NOT NULL, username VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(user_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE AnimalBatch');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE gestation');
        $this->addSql('DROP TABLE ingredient');
        $this->addSql('DROP TABLE newborns');
        $this->addSql('DROP TABLE nutritional_value_needs');
        $this->addSql('DROP TABLE nutritional_needs');
        $this->addSql('DROP TABLE nutritional_value');
        $this->addSql('DROP TABLE presence');
        $this->addSql('DROP TABLE ration');
        $this->addSql('DROP TABLE todo');
        $this->addSql('DROP TABLE user');
    }
}
