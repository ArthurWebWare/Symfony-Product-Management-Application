<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240522101959 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update foreign keys to link product and category tables.';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_2_categories DROP FOREIGN KEY FK_3C5C4B63BE6903FD');
        $this->addSql('ALTER TABLE product_2_categories DROP FOREIGN KEY FK_3C5C4B634584665A');
        $this->addSql('DROP INDEX IDX_3C5C4B63BE6903FD ON product_2_categories');
        $this->addSql('DROP INDEX `primary` ON product_2_categories');
        $this->addSql('ALTER TABLE product_2_categories CHANGE product_category_id category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_2_categories ADD CONSTRAINT FK_3C5C4B6312469DE2 FOREIGN KEY (category_id) REFERENCES product_category (id) ON DELETE RESTRICT');
        $this->addSql('ALTER TABLE product_2_categories ADD CONSTRAINT FK_3C5C4B634584665A FOREIGN KEY (product_id) REFERENCES product (id) ON DELETE CASCADE');
        $this->addSql('CREATE INDEX IDX_3C5C4B6312469DE2 ON product_2_categories (category_id)');
        $this->addSql('ALTER TABLE product_2_categories ADD PRIMARY KEY (product_id, category_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE product_2_categories DROP FOREIGN KEY FK_3C5C4B6312469DE2');
        $this->addSql('ALTER TABLE product_2_categories DROP FOREIGN KEY FK_3C5C4B634584665A');
        $this->addSql('DROP INDEX IDX_3C5C4B6312469DE2 ON product_2_categories');
        $this->addSql('DROP INDEX `PRIMARY` ON product_2_categories');
        $this->addSql('ALTER TABLE product_2_categories CHANGE category_id product_category_id INT NOT NULL');
        $this->addSql('ALTER TABLE product_2_categories ADD CONSTRAINT FK_3C5C4B63BE6903FD FOREIGN KEY (product_category_id) REFERENCES product_category (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE product_2_categories ADD CONSTRAINT FK_3C5C4B634584665A FOREIGN KEY (product_id) REFERENCES product (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE INDEX IDX_3C5C4B63BE6903FD ON product_2_categories (product_category_id)');
        $this->addSql('ALTER TABLE product_2_categories ADD PRIMARY KEY (product_id, product_category_id)');
    }
}
