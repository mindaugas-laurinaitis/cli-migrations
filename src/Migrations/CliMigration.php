<?php

namespace App\Migrations;

use App\Command\CliMigrationCommandInterface;
use Doctrine\Migrations\AbstractMigration;

abstract class CliMigration extends AbstractMigration
{
    private $commands = [];

    protected function addCommand(CliMigrationCommandInterface $cmd)
    {
        $this->commands[] = $cmd;
    }

    public function getCommands(): array
    {
        return $this->commands;
    }
}
