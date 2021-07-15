<?php

namespace App\Command;

use Symfony\Component\Process\Process;

interface CliMigrationCommandInterface
{
    public function toProcess() : Process;

    public function __toString() : string;
}
