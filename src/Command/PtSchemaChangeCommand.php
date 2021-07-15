<?php

namespace App\Command;

use Symfony\Component\Process\Process;

final class PtSchemaChangeCommand implements CliMigrationCommandInterface
{
    private $query;

    public function __construct(string $query)
    {
        $this->query = $query;
    }

    public function toProcess() : Process
    {
        return new Process([sprintf('pt-online-schema-change --alter "%s"', $this->query)]);
    }

    public function __toString() : string
    {
        return sprintf('PtSchemaChangeCommand(query=%s)', $this->query);
    }
}
