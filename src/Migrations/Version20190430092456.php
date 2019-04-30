<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190430092456 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE products_images (product_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', image_id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', INDEX IDX_662C35404584665A (product_id), UNIQUE INDEX UNIQ_662C35403DA5256D (image_id), PRIMARY KEY(product_id, image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE products_images ADD CONSTRAINT FK_662C35404584665A FOREIGN KEY (product_id) REFERENCES csloisirs_product (id)');
        $this->addSql('ALTER TABLE products_images ADD CONSTRAINT FK_662C35403DA5256D FOREIGN KEY (image_id) REFERENCES csloisirs_image (id)');
        $this->addSql('DROP TABLE product');
        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDD4584665A');
        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDD4E7AF8F');
        $this->addSql('DROP INDEX IDX_D7049EDD4E7AF8F ON csloisirs_image');
        $this->addSql('DROP INDEX IDX_D7049EDD4584665A ON csloisirs_image');
        $this->addSql('ALTER TABLE csloisirs_image DROP product_id, DROP gallery_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE product (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) DEFAULT NULL COLLATE utf8mb4_unicode_ci, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('DROP TABLE products_images');
        $this->addSql('ALTER TABLE csloisirs_image ADD product_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\', ADD gallery_id CHAR(36) DEFAULT NULL COLLATE utf8mb4_unicode_ci COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDD4584665A FOREIGN KEY (product_id) REFERENCES csloisirs_product (id)');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDD4E7AF8F FOREIGN KEY (gallery_id) REFERENCES csloisirs_gallery (id)');
        $this->addSql('CREATE INDEX IDX_D7049EDD4E7AF8F ON csloisirs_image (gallery_id)');
        $this->addSql('CREATE INDEX IDX_D7049EDD4584665A ON csloisirs_image (product_id)');
    }
}
