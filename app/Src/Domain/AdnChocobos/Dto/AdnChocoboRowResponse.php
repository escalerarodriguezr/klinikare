<?php
declare(strict_types=1);

namespace App\Src\Domain\AdnChocobos\Dto;

class AdnChocoboRowResponse
{
    public function __construct(
        public readonly string $name,
        public readonly int  $adition,
        public readonly string $hash
    )
    {
    }

}
