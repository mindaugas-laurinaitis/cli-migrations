<?php

namespace App\EventSubscriber;

use App\Migrations\CliMigration;
use Doctrine\Common\EventSubscriber;
use Doctrine\Migrations\Events;
use Doctrine\Migrations\Event\MigrationsVersionEventArgs as VersionArgs;

class CliMigrationSubscriber implements EventSubscriber
{
    public function getSubscribedEvents()
    {
        return [
            Events::onMigrationsVersionExecuted,
        ];
    }

    public function onMigrationsVersionExecuted(VersionArgs $args)
    {
        $migration = $args->getPlan()->getMigration();
        if (!$migration instanceof CliMigration) {
            return;
        }
        foreach ($migration->getCommands() as $command) {
            $proc = $command->toProcess();
            $proc->mustRun();
        }
    }
}
