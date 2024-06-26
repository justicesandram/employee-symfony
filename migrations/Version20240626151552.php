<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240626151552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee ADD department_id INT NOT NULL');
        $this->addSql('ALTER TABLE employee ADD CONSTRAINT FK_5D9F75A1AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_5D9F75A1AE80F5DF ON employee (department_id)');
        $this->addSql('ALTER TABLE position DROP FOREIGN KEY FK_462CE4F5AE80F5DF');
        $this->addSql('DROP INDEX IDX_462CE4F5AE80F5DF ON position');
        $this->addSql('ALTER TABLE position DROP department_id');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE employee DROP FOREIGN KEY FK_5D9F75A1AE80F5DF');
        $this->addSql('DROP INDEX IDX_5D9F75A1AE80F5DF ON employee');
        $this->addSql('ALTER TABLE employee DROP department_id');
        $this->addSql('ALTER TABLE position ADD department_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE position ADD CONSTRAINT FK_462CE4F5AE80F5DF FOREIGN KEY (department_id) REFERENCES department (id)');
        $this->addSql('CREATE INDEX IDX_462CE4F5AE80F5DF ON position (department_id)');
    }
}
