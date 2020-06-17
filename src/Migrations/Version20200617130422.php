<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200617130422 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE recette (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, name VARCHAR(45) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, time INT NOT NULL, difficulty INT NOT NULL, little_describe VARCHAR(45) NOT NULL, INDEX IDX_49BB63909D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE app_users (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, email VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_C2502824F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE recette_has_ingredient (id INT AUTO_INCREMENT NOT NULL, recette_id INT NOT NULL, ingredient_id INT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, quantity VARCHAR(45) NOT NULL, INDEX IDX_46DDE39089312FE9 (recette_id), INDEX IDX_46DDE390933FE08C (ingredient_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE category (id INT AUTO_INCREMENT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE step (id INT AUTO_INCREMENT NOT NULL, recette_id INT NOT NULL, description LONGTEXT NOT NULL, created_at DATETIME NOT NULL, updated_at DATETIME NOT NULL, INDEX IDX_43B9FE3C89312FE9 (recette_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ingredient (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(45) NOT NULL, code VARCHAR(45) NOT NULL, created DATETIME NOT NULL, updated DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE recette ADD CONSTRAINT FK_49BB63909D86650F FOREIGN KEY (user_id_id) REFERENCES app_users (id)');
        $this->addSql('ALTER TABLE recette_has_ingredient ADD CONSTRAINT FK_46DDE39089312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
        $this->addSql('ALTER TABLE recette_has_ingredient ADD CONSTRAINT FK_46DDE390933FE08C FOREIGN KEY (ingredient_id) REFERENCES ingredient (id)');
        $this->addSql('ALTER TABLE step ADD CONSTRAINT FK_43B9FE3C89312FE9 FOREIGN KEY (recette_id) REFERENCES recette (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE recette_has_ingredient DROP FOREIGN KEY FK_46DDE39089312FE9');
        $this->addSql('ALTER TABLE step DROP FOREIGN KEY FK_43B9FE3C89312FE9');
        $this->addSql('ALTER TABLE recette DROP FOREIGN KEY FK_49BB63909D86650F');
        $this->addSql('ALTER TABLE recette_has_ingredient DROP FOREIGN KEY FK_46DDE390933FE08C');
        $this->addSql('DROP TABLE recette');
        $this->addSql('DROP TABLE app_users');
        $this->addSql('DROP TABLE recette_has_ingredient');
        $this->addSql('DROP TABLE category');
        $this->addSql('DROP TABLE step');
        $this->addSql('DROP TABLE ingredient');
    }
}
