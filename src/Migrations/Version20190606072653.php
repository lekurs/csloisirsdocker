<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190606072653 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_gallery DROP FOREIGN KEY FK_5E44EA90D44F05E5');
        $this->addSql('DROP INDEX IDX_5E44EA90D44F05E5 ON csloisirs_gallery');
        $this->addSql('ALTER TABLE csloisirs_gallery DROP images_id');
        $this->addSql('ALTER TABLE csloisirs_image ADD gallery_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDD4E7AF8F FOREIGN KEY (gallery_id) REFERENCES csloisirs_gallery (id)');
        $this->addSql('CREATE INDEX IDX_D7049EDD4E7AF8F ON csloisirs_image (gallery_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_gallery ADD images_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE csloisirs_gallery ADD CONSTRAINT FK_5E44EA90D44F05E5 FOREIGN KEY (images_id) REFERENCES csloisirs_image (id)');
        $this->addSql('CREATE INDEX IDX_5E44EA90D44F05E5 ON csloisirs_gallery (images_id)');
        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDD4E7AF8F');
        $this->addSql('DROP INDEX IDX_D7049EDD4E7AF8F ON csloisirs_image');
        $this->addSql('ALTER TABLE csloisirs_image DROP gallery_id');
    }
}
