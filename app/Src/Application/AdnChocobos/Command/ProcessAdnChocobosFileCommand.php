<?php
declare(strict_types=1);

namespace App\Src\Application\AdnChocobos\Command;

class ProcessAdnChocobosFileCommand
{
    public function __construct(
        public readonly string $resource
    )
    {
    }
}
