<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114130506 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE nutritional_needs (id INT AUTO_INCREMENT NOT NULL, species_needs VARCHAR(255) NOT NULL, production_status_needs VARCHAR(255) NOT NULL, sex_needs VARCHAR(255) NOT NULL, minimum_weight_needs DOUBLE PRECISION NOT NULL, maximum_weight_needs DOUBLE PRECISION NOT NULL, production_goal_needs VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE nutritional_value_needs (id INT AUTO_INCREMENT NOT NULL, pb DOUBLE PRECISION NOT NULL, fb DOUBLE PRECISION NOT NULL, adf DOUBLE PRECISION NOT NULL, ndf DOUBLE PRECISION NOT NULL, ms DOUBLE PRECISION NOT NULL, eb DOUBLE PRECISION NOT NULL, ca DOUBLE PRECISION NOT NULL, p DOUBLE PRECISION NOT NULL, mg DOUBLE PRECISION NOT NULL, k DOUBLE PRECISION NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE nutritional_needs');
        $this->addSql('DROP TABLE nutritional_value');
        $this->addSql('DROP TABLE nutritional_value_needs');
    }
}
