<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190606080934 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDDBD0F409C');
        $this->addSql('DROP INDEX IDX_D7049EDDBD0F409C ON csloisirs_image');
        $this->addSql('ALTER TABLE csloisirs_image DROP area_id');
        $this->addSql('ALTER TABLE csloisirs_area ADD image VARCHAR(255) DEFAULT NULL');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_area DROP image');
        $this->addSql('ALTER TABLE csloisirs_image ADD area_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDDBD0F409C FOREIGN KEY (area_id) REFERENCES csloisirs_area (id)');
        $this->addSql('CREATE INDEX IDX_D7049EDDBD0F409C ON csloisirs_image (area_id)');
    }
}
