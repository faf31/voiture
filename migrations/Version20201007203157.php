<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201007203157 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, libelle VARCHAR(255) NOT NULL, prix_moyen INT NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE voitures (id INT AUTO_INCREMENT NOT NULL, modele_id INT DEFAULT NULL, immatriculation VARCHAR(15) NOT NULL, nb_portes INT NOT NULL, annee INT NOT NULL, INDEX IDX_8B58301BAC14B70A (modele_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BAC14B70A FOREIGN KEY (modele_id) REFERENCES modele (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BAC14B70A');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE voitures');
    }
}
