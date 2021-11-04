<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211104150533 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, bar_id INT NOT NULL, client_id INT NOT NULL, note DOUBLE PRECISION DEFAULT NULL, commentaire VARCHAR(255) DEFAULT NULL, INDEX IDX_8F91ABF089A253A (bar_id), INDEX IDX_8F91ABF019EB6921 (client_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar (id INT AUTO_INCREMENT NOT NULL, gerant_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, latitude DOUBLE PRECISION NOT NULL, longitude DOUBLE PRECISION NOT NULL, nom_rue VARCHAR(255) NOT NULL, num_rue VARCHAR(255) NOT NULL, code_postal VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, telephone VARCHAR(255) NOT NULL, qr_code VARCHAR(255) DEFAULT NULL, INDEX IDX_76FF8CAAA500A924 (gerant_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE client_salon (client_id INT NOT NULL, salon_id INT NOT NULL, INDEX IDX_510568A019EB6921 (client_id), INDEX IDX_510568A04C91BDE4 (salon_id), PRIMARY KEY(client_id, salon_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE consommable (id INT AUTO_INCREMENT NOT NULL, bar_id INT NOT NULL, nom VARCHAR(255) NOT NULL, prix DOUBLE PRECISION NOT NULL, quantite DOUBLE PRECISION DEFAULT NULL, INDEX IDX_A04C7F4D89A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE evenement (id INT AUTO_INCREMENT NOT NULL, bar_id INT NOT NULL, nom VARCHAR(255) NOT NULL, etat TINYINT(1) NOT NULL, type VARCHAR(255) DEFAULT NULL, heure_debut DATETIME DEFAULT NULL, heure_fin DATETIME DEFAULT NULL, INDEX IDX_B26681E89A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE gerant (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE photo (id INT AUTO_INCREMENT NOT NULL, bar_id INT NOT NULL, chemin_photo VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, INDEX IDX_14B7841889A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salon (id INT AUTO_INCREMENT NOT NULL, bar_id INT NOT NULL, message VARCHAR(255) NOT NULL, INDEX IDX_F268F41789A253A (bar_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, chemin_photo VARCHAR(255) DEFAULT NULL, prenom VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF089A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF019EB6921 FOREIGN KEY (client_id) REFERENCES client (id)');
        $this->addSql('ALTER TABLE bar ADD CONSTRAINT FK_76FF8CAAA500A924 FOREIGN KEY (gerant_id) REFERENCES gerant (id)');
        $this->addSql('ALTER TABLE client ADD CONSTRAINT FK_C7440455BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_salon ADD CONSTRAINT FK_510568A019EB6921 FOREIGN KEY (client_id) REFERENCES client (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE client_salon ADD CONSTRAINT FK_510568A04C91BDE4 FOREIGN KEY (salon_id) REFERENCES salon (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE consommable ADD CONSTRAINT FK_A04C7F4D89A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E89A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE gerant ADD CONSTRAINT FK_D1D45C70BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photo ADD CONSTRAINT FK_14B7841889A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
        $this->addSql('ALTER TABLE salon ADD CONSTRAINT FK_F268F41789A253A FOREIGN KEY (bar_id) REFERENCES bar (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF089A253A');
        $this->addSql('ALTER TABLE consommable DROP FOREIGN KEY FK_A04C7F4D89A253A');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E89A253A');
        $this->addSql('ALTER TABLE photo DROP FOREIGN KEY FK_14B7841889A253A');
        $this->addSql('ALTER TABLE salon DROP FOREIGN KEY FK_F268F41789A253A');
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF019EB6921');
        $this->addSql('ALTER TABLE client_salon DROP FOREIGN KEY FK_510568A019EB6921');
        $this->addSql('ALTER TABLE bar DROP FOREIGN KEY FK_76FF8CAAA500A924');
        $this->addSql('ALTER TABLE client_salon DROP FOREIGN KEY FK_510568A04C91BDE4');
        $this->addSql('ALTER TABLE client DROP FOREIGN KEY FK_C7440455BF396750');
        $this->addSql('ALTER TABLE gerant DROP FOREIGN KEY FK_D1D45C70BF396750');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE bar');
        $this->addSql('DROP TABLE client');
        $this->addSql('DROP TABLE client_salon');
        $this->addSql('DROP TABLE consommable');
        $this->addSql('DROP TABLE evenement');
        $this->addSql('DROP TABLE gerant');
        $this->addSql('DROP TABLE photo');
        $this->addSql('DROP TABLE salon');
        $this->addSql('DROP TABLE `user`');
    }
}
