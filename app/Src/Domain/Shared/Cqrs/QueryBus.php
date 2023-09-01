<?php
declare(strict_types=1);

namespace App\Src\Domain\Shared\Cqrs;

interface QueryBus
{
    public function handle(mixed $query): mixed;

}
