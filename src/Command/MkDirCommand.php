<?php

namespace App\Command;

use Symfony\Component\Process\Process;

final class MkDirCommand implements CliMigrationCommandInterface
{
    private $dirName;

    public function __construct(string $dirName)
    {
        $this->dirName = $dirName;
    }

    public function toProcess() : Process
    {
        return new Process(['mkdir', $this->dirName]);
    }

    public function __toString() : string
    {
        return sprintf('MkDirCommand(dirName=%s)', $this->dirName);
    }
}
