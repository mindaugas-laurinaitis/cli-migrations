<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use App\Command\PtSchemaChangeCommand;
use App\Migrations\CliMigration;
use Doctrine\DBAL\Schema\Schema;


final class Version20210530192357 extends CliMigration
{
    public function up(Schema $schema): void
    {
        $this->addCommand(
            new PtSchemaChangeCommand(
                'ALTER TABLE customers ADD email varchar(255)'
            )
        );
    }
}
