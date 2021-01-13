<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190614132655 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_price DROP FOREIGN KEY FK_D8F1B85B9A1887DC');
        $this->addSql('DROP INDEX IDX_D8F1B85B9A1887DC ON csloisirs_price');
        $this->addSql('ALTER TABLE csloisirs_price ADD title VARCHAR(255) NOT NULL, DROP subscription_id');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D8F1B85B2B36786B ON csloisirs_price (title)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX UNIQ_D8F1B85B2B36786B ON csloisirs_price');
        $this->addSql('ALTER TABLE csloisirs_price ADD subscription_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', DROP title');
        $this->addSql('ALTER TABLE csloisirs_price ADD CONSTRAINT FK_D8F1B85B9A1887DC FOREIGN KEY (subscription_id) REFERENCES csloisirs_subscription (id)');
        $this->addSql('CREATE INDEX IDX_D8F1B85B9A1887DC ON csloisirs_price (subscription_id)');
    }
}
