<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231113220935 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animal_batch (id INT AUTO_INCREMENT NOT NULL, espece_animal_batch VARCHAR(255) NOT NULL, sexe_ration VARCHAR(255) NOT NULL, poidsmax_ration DOUBLE PRECISION NOT NULL, poidsmin_ration DOUBLE PRECISION NOT NULL, age_animal_batch VARCHAR(255) NOT NULL, nombre_animal_batch INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('DROP TABLE nutritionl_value_needs');
        $this->addSql('DROP TABLE nutritional_value');
        $this->addSql('DROP TABLE nutritional_needs');
        $this->addSql('ALTER TABLE animal ADD espece VARCHAR(255) NOT NULL, ADD sexe VARCHAR(255) NOT NULL, ADD poids DOUBLE PRECISION DEFAULT NULL, ADD age VARCHAR(255) NOT NULL, DROP espece_animal, DROP sexe_ration, DROP poidsmax_ration, DROP poidsmin_ration, DROP age_animal, DROP nombre_animal');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nutritionl_value_needs (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nutritional_value (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE nutritional_needs (id INT AUTO_INCREMENT NOT NULL, espece_besoin_nutritionnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, statut_production_besoin_nutritionnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, sexe_besoin_nutritionnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, poids_min_besoin_nutritionnel DOUBLE PRECISION NOT NULL, poids_max_besoin_nutritionnel DOUBLE PRECISION NOT NULL, bute_production_besoin_nutritionnel VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE animal_batch');
        $this->addSql('ALTER TABLE animal ADD espece_animal VARCHAR(255) NOT NULL, ADD sexe_ration VARCHAR(255) NOT NULL, ADD poidsmax_ration DOUBLE PRECISION NOT NULL, ADD poidsmin_ration DOUBLE PRECISION NOT NULL, ADD age_animal VARCHAR(255) NOT NULL, ADD nombre_animal INT NOT NULL, DROP espece, DROP sexe, DROP poids, DROP age');
    }
}
