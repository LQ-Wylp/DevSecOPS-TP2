<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240305090611 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cadeau (id INT AUTO_INCREMENT NOT NULL, prix VARCHAR(255) NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_cadeau (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE liste_cadeau_cadeau (liste_cadeau_id INT NOT NULL, cadeau_id INT NOT NULL, INDEX IDX_5301C71484A12BDD (liste_cadeau_id), INDEX IDX_5301C714D9D5ED84 (cadeau_id), PRIMARY KEY(liste_cadeau_id, cadeau_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE liste_cadeau_cadeau ADD CONSTRAINT FK_5301C71484A12BDD FOREIGN KEY (liste_cadeau_id) REFERENCES liste_cadeau (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE liste_cadeau_cadeau ADD CONSTRAINT FK_5301C714D9D5ED84 FOREIGN KEY (cadeau_id) REFERENCES cadeau (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE liste_cadeau_cadeau DROP FOREIGN KEY FK_5301C71484A12BDD');
        $this->addSql('ALTER TABLE liste_cadeau_cadeau DROP FOREIGN KEY FK_5301C714D9D5ED84');
        $this->addSql('DROP TABLE cadeau');
        $this->addSql('DROP TABLE liste_cadeau');
        $this->addSql('DROP TABLE liste_cadeau_cadeau');
    }
}
