<?php
declare(strict_types=1);

namespace App\Src\Application\ChocoBilly\Command;

use App\Models\User;
use Illuminate\Support\Collection;

class ProcessChocoBillyFileCommand
{
    public function __construct(
        public readonly int $total,
        public readonly Collection $fileRows
    )
    {
    }


}
