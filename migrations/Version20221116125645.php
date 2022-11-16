<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221116125645 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE subscription (id INT AUTO_INCREMENT NOT NULL, suscriber_id INT NOT NULL, product_id INT NOT NULL, start_date DATE NOT NULL, state VARCHAR(255) NOT NULL, renew TINYINT(1) NOT NULL, INDEX IDX_A3C664D3636755A2 (suscriber_id), INDEX IDX_A3C664D34584665A (product_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D3636755A2 FOREIGN KEY (suscriber_id) REFERENCES subscriber (id)');
        $this->addSql('ALTER TABLE subscription ADD CONSTRAINT FK_A3C664D34584665A FOREIGN KEY (product_id) REFERENCES product (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D3636755A2');
        $this->addSql('ALTER TABLE subscription DROP FOREIGN KEY FK_A3C664D34584665A');
        $this->addSql('DROP TABLE subscription');
    }
}
