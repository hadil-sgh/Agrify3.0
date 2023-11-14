<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231114142510 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal ADD animalbatch_id INT DEFAULT NULL, ADD nutritional_needs_id INT DEFAULT NULL, ADD ration_id INT DEFAULT NULL, ADD gestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F809303D FOREIGN KEY (animalbatch_id) REFERENCES animal_batch (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F90D0435D FOREIGN KEY (nutritional_needs_id) REFERENCES nutritional_needs (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231F4A5A89FC FOREIGN KEY (ration_id) REFERENCES ration (id)');
        $this->addSql('ALTER TABLE animal ADD CONSTRAINT FK_6AAB231FC4ABA3D1 FOREIGN KEY (gestation_id) REFERENCES gestation (id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F809303D ON animal (animalbatch_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F90D0435D ON animal (nutritional_needs_id)');
        $this->addSql('CREATE INDEX IDX_6AAB231F4A5A89FC ON animal (ration_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AAB231FC4ABA3D1 ON animal (gestation_id)');
        $this->addSql('ALTER TABLE ingredient ADD ration_id INT DEFAULT NULL, ADD nutritional_value_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF78704A5A89FC FOREIGN KEY (ration_id) REFERENCES ration (id)');
        $this->addSql('ALTER TABLE ingredient ADD CONSTRAINT FK_6BAF7870C43CAA69 FOREIGN KEY (nutritional_value_id) REFERENCES nutritional_value (id)');
        $this->addSql('CREATE INDEX IDX_6BAF78704A5A89FC ON ingredient (ration_id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6BAF7870C43CAA69 ON ingredient (nutritional_value_id)');
        $this->addSql('ALTER TABLE newborns ADD gestation_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE newborns ADD CONSTRAINT FK_8A5A2A32C4ABA3D1 FOREIGN KEY (gestation_id) REFERENCES gestation (id)');
        $this->addSql('CREATE INDEX IDX_8A5A2A32C4ABA3D1 ON newborns (gestation_id)');
        $this->addSql('ALTER TABLE nutritional_value_needs ADD nutritional_needs_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE nutritional_value_needs ADD CONSTRAINT FK_4FDD3D0690D0435D FOREIGN KEY (nutritional_needs_id) REFERENCES nutritional_needs (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_4FDD3D0690D0435D ON nutritional_value_needs (nutritional_needs_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F809303D');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F90D0435D');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231F4A5A89FC');
        $this->addSql('ALTER TABLE animal DROP FOREIGN KEY FK_6AAB231FC4ABA3D1');
        $this->addSql('DROP INDEX IDX_6AAB231F809303D ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F90D0435D ON animal');
        $this->addSql('DROP INDEX IDX_6AAB231F4A5A89FC ON animal');
        $this->addSql('DROP INDEX UNIQ_6AAB231FC4ABA3D1 ON animal');
        $this->addSql('ALTER TABLE animal DROP animalbatch_id, DROP nutritional_needs_id, DROP ration_id, DROP gestation_id');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF78704A5A89FC');
        $this->addSql('ALTER TABLE ingredient DROP FOREIGN KEY FK_6BAF7870C43CAA69');
        $this->addSql('DROP INDEX IDX_6BAF78704A5A89FC ON ingredient');
        $this->addSql('DROP INDEX UNIQ_6BAF7870C43CAA69 ON ingredient');
        $this->addSql('ALTER TABLE ingredient DROP ration_id, DROP nutritional_value_id');
        $this->addSql('ALTER TABLE newborns DROP FOREIGN KEY FK_8A5A2A32C4ABA3D1');
        $this->addSql('DROP INDEX IDX_8A5A2A32C4ABA3D1 ON newborns');
        $this->addSql('ALTER TABLE newborns DROP gestation_id');
        $this->addSql('ALTER TABLE nutritional_value_needs DROP FOREIGN KEY FK_4FDD3D0690D0435D');
        $this->addSql('DROP INDEX UNIQ_4FDD3D0690D0435D ON nutritional_value_needs');
        $this->addSql('ALTER TABLE nutritional_value_needs DROP nutritional_needs_id');
    }
}
