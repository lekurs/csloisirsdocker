<?php

declare(strict_types=1);

namespace App\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190425121317 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE csloisirs_user (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', login VARCHAR(150) NOT NULL, password VARCHAR(150) NOT NULL, email VARCHAR(255) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:array)\', slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_3E00410AA08CB10 (login), UNIQUE INDEX UNIQ_3E0041035C246D5 (password), UNIQUE INDEX UNIQ_3E00410E7927C74 (email), UNIQUE INDEX UNIQ_3E00410989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_subscription (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_5693EFCE2B36786B (title), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_price (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', subscription_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', price INT NOT NULL, INDEX IDX_D8F1B85B9A1887DC (subscription_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_formation (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', area_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', gallery_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', start_date DATETIME NOT NULL, end_date DATETIME NOT NULL, title VARCHAR(150) NOT NULL, price INT DEFAULT NULL, available_seats INT DEFAULT NULL, INDEX IDX_AA99EDBBD0F409C (area_id), INDEX IDX_AA99EDB4E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_product (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(200) NOT NULL, slug VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_CA2596072B36786B (title), UNIQUE INDEX UNIQ_CA259607989D9B62 (slug), INDEX IDX_CA25960712469DE2 (category_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_category (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', category VARCHAR(100) NOT NULL, slug VARCHAR(100) NOT NULL, UNIQUE INDEX UNIQ_30563CA564C19C1 (category), UNIQUE INDEX UNIQ_30563CA5989D9B62 (slug), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_gallery (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', title VARCHAR(150) NOT NULL, UNIQUE INDEX UNIQ_5E44EA902B36786B (title), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_image (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', product_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', gallery_id CHAR(36) DEFAULT NULL COMMENT \'(DC2Type:uuid)\', path VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_D7049EDDB548B0F (path), INDEX IDX_D7049EDD4584665A (product_id), INDEX IDX_D7049EDD4E7AF8F (gallery_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE csloisirs_area (id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\', name VARCHAR(150) NOT NULL, address VARCHAR(255) DEFAULT NULL, zip INT DEFAULT NULL, city VARCHAR(200) DEFAULT NULL, UNIQUE INDEX UNIQ_59E7EF315E237E06 (name), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE csloisirs_price ADD CONSTRAINT FK_D8F1B85B9A1887DC FOREIGN KEY (subscription_id) REFERENCES csloisirs_subscription (id)');
        $this->addSql('ALTER TABLE csloisirs_formation ADD CONSTRAINT FK_AA99EDBBD0F409C FOREIGN KEY (area_id) REFERENCES csloisirs_area (id)');
        $this->addSql('ALTER TABLE csloisirs_formation ADD CONSTRAINT FK_AA99EDB4E7AF8F FOREIGN KEY (gallery_id) REFERENCES csloisirs_gallery (id)');
        $this->addSql('ALTER TABLE csloisirs_product ADD CONSTRAINT FK_CA25960712469DE2 FOREIGN KEY (category_id) REFERENCES csloisirs_category (id)');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDD4584665A FOREIGN KEY (product_id) REFERENCES csloisirs_product (id)');
        $this->addSql('ALTER TABLE csloisirs_image ADD CONSTRAINT FK_D7049EDD4E7AF8F FOREIGN KEY (gallery_id) REFERENCES csloisirs_gallery (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE csloisirs_price DROP FOREIGN KEY FK_D8F1B85B9A1887DC');
        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDD4584665A');
        $this->addSql('ALTER TABLE csloisirs_product DROP FOREIGN KEY FK_CA25960712469DE2');
        $this->addSql('ALTER TABLE csloisirs_formation DROP FOREIGN KEY FK_AA99EDB4E7AF8F');
        $this->addSql('ALTER TABLE csloisirs_image DROP FOREIGN KEY FK_D7049EDD4E7AF8F');
        $this->addSql('ALTER TABLE csloisirs_formation DROP FOREIGN KEY FK_AA99EDBBD0F409C');
        $this->addSql('DROP TABLE csloisirs_user');
        $this->addSql('DROP TABLE csloisirs_subscription');
        $this->addSql('DROP TABLE csloisirs_price');
        $this->addSql('DROP TABLE csloisirs_formation');
        $this->addSql('DROP TABLE csloisirs_product');
        $this->addSql('DROP TABLE csloisirs_category');
        $this->addSql('DROP TABLE csloisirs_gallery');
        $this->addSql('DROP TABLE csloisirs_image');
        $this->addSql('DROP TABLE csloisirs_area');
    }
}
