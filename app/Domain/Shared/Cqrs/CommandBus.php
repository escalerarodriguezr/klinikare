<?php
declare(strict_types=1);

namespace App\Domain\Shared\Cqrs;

interface CommandBus
{
    public function handle(mixed $command): mixed;

}
