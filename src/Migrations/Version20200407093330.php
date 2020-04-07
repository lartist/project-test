<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200407093330 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE form_widget (id INT AUTO_INCREMENT NOT NULL, type VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE field (id INT AUTO_INCREMENT NOT NULL, call_for_projects_id INT NOT NULL, widget_form_id INT NOT NULL, rank INT NOT NULL, INDEX IDX_5BF5455833F905A0 (call_for_projects_id), INDEX IDX_5BF5455851D99CBC (widget_form_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE call_for_projects (id INT AUTO_INCREMENT NOT NULL, label VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF5455833F905A0 FOREIGN KEY (call_for_projects_id) REFERENCES call_for_projects (id)');
        $this->addSql('ALTER TABLE field ADD CONSTRAINT FK_5BF5455851D99CBC FOREIGN KEY (widget_form_id) REFERENCES form_widget (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF5455851D99CBC');
        $this->addSql('ALTER TABLE field DROP FOREIGN KEY FK_5BF5455833F905A0');
        $this->addSql('DROP TABLE form_widget');
        $this->addSql('DROP TABLE field');
        $this->addSql('DROP TABLE call_for_projects');
    }
}
