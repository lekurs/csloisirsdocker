<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190516092151 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products_images DROP FOREIGN KEY FK_662C35403DA5256D');
        $this->addSql('ALTER TABLE products_images ADD CONSTRAINT FK_662C35403DA5256D FOREIGN KEY (image_id) REFERENCES csloisirs_image (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE products_images DROP FOREIGN KEY FK_662C35403DA5256D');
        $this->addSql('ALTER TABLE products_images ADD CONSTRAINT FK_662C35403DA5256D FOREIGN KEY (image_id) REFERENCES csloisirs_image (id)');
    }
}
