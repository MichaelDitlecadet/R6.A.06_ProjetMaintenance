<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250206104017 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE categorie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE competition (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, lieu VARCHAR(255) NOT NULL, etat VARCHAR(255) DEFAULT NULL)');
        $this->addSql('CREATE TABLE competition_licencie (competition_id INTEGER NOT NULL, licencie_id INTEGER NOT NULL, PRIMARY KEY(competition_id, licencie_id), CONSTRAINT FK_A046D3D7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE, CONSTRAINT FK_A046D3DB56DCD74 FOREIGN KEY (licencie_id) REFERENCES licencie (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_A046D3D7B39D312 ON competition_licencie (competition_id)');
        $this->addSql('CREATE INDEX IDX_A046D3DB56DCD74 ON competition_licencie (licencie_id)');
        $this->addSql('CREATE TABLE epreuve (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, competition_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, categorie_id INTEGER NOT NULL, CONSTRAINT FK_D6ADE47F7B39D312 FOREIGN KEY (competition_id) REFERENCES competition (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_D6ADE47F7B39D312 ON epreuve (competition_id)');
        $this->addSql('CREATE TABLE equipe (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, type VARCHAR(255) NOT NULL, nombre_joueurs INTEGER NOT NULL)');
        $this->addSql('CREATE TABLE etablissement (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, ville VARCHAR(255) NOT NULL, adresse1 VARCHAR(255) NOT NULL, adresse2 VARCHAR(255) DEFAULT NULL, code_postal INTEGER NOT NULL, telephone VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL)');
        $this->addSql('CREATE TABLE licencie (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, etablissement_id INTEGER NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, numero_licence INTEGER NOT NULL, sexe INTEGER NOT NULL, classe VARCHAR(255) DEFAULT NULL, CONSTRAINT FK_3B755612FF631228 FOREIGN KEY (etablissement_id) REFERENCES etablissement (id) NOT DEFERRABLE INITIALLY IMMEDIATE)');
        $this->addSql('CREATE INDEX IDX_3B755612FF631228 ON licencie (etablissement_id)');
        $this->addSql('CREATE TABLE sport (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, gestion_perf INTEGER DEFAULT NULL)');
        $this->addSql('CREATE TABLE tour_epreuve_competition (id INTEGER PRIMARY KEY AUTOINCREMENT NOT NULL, numero INTEGER NOT NULL, libelle VARCHAR(255) NOT NULL)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE categorie');
        $this->addSql('DROP TABLE competition');
        $this->addSql('DROP TABLE competition_licencie');
        $this->addSql('DROP TABLE epreuve');
        $this->addSql('DROP TABLE equipe');
        $this->addSql('DROP TABLE etablissement');
        $this->addSql('DROP TABLE licencie');
        $this->addSql('DROP TABLE sport');
        $this->addSql('DROP TABLE tour_epreuve_competition');
    }
}
