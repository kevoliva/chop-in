<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211112135708 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar ADD salon_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAA4C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_76FF8CAA4C91BDE4 ON bar (salon_id)');
        $this->addSql('ALTER TABLE salon DROP FOREIGN KEY FK_F268F41789A253A');
        $this->addSql('DROP INDEX IDX_F268F41789A253A ON salon');
        $this->addSql('ALTER TABLE salon DROP bar_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAA4C91BDE4');
        $this->addSql('DROP INDEX UNIQ_76FF8CAA4C91BDE4 ON bar');
        $this->addSql('ALTER TABLE bar DROP salon_id');
        $this->addSql('ALTER TABLE salon ADD bar_id INT NOT NULL');
        $this->addSql('ALTER TABLE salon ADD CONSTRAINT FK_F268F41789A253A FOREIGN KEY (bar_id) REFERENCES bar (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_F268F41789A253A ON salon (bar_id)');
    }
}
