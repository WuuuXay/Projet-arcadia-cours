<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250218145359 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_rendu ADD animal_id INT NOT NULL, ADD contenu LONGTEXT NOT NULL, ADD date DATETIME NOT NULL');
        $this->addSql('ALTER TABLE compte_rendu ADD CONSTRAINT FK_D39E69D28E962C16 FOREIGN KEY (animal_id) REFERENCES animal (id)');
        $this->addSql('CREATE INDEX IDX_D39E69D28E962C16 ON compte_rendu (animal_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE compte_rendu DROP FOREIGN KEY FK_D39E69D28E962C16');
        $this->addSql('DROP INDEX IDX_D39E69D28E962C16 ON compte_rendu');
        $this->addSql('ALTER TABLE compte_rendu DROP animal_id, DROP contenu, DROP date');
    }
}
