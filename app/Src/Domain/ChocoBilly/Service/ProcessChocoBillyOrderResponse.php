<?php
declare(strict_types=1);

namespace App\Src\Domain\ChocoBilly\Service;

use Illuminate\Support\Collection;

class ProcessChocoBillyOrderResponse
{
    public function __construct(
        public readonly Collection $weights,
        public readonly int $quantityOrdered
    )
    {
    }




}
