<?php
declare(strict_types=1);

namespace App\Src\Domain\ChocoBilly\Dto;

use Illuminate\Support\Collection;

class ChocoBillyFileRow
{
    public function __construct(
        private Collection $availableWeights = new Collection(),
        private int $quantityOrdered = 0

    )
    {
    }

    public function getAvailableWeights(): Collection
    {
        return $this->availableWeights;
    }

    public function setAvailableWeights(Collection $availableWeights): void
    {
        $this->availableWeights = $availableWeights;
    }

    public function getQuantityOrdered(): int
    {
        return $this->quantityOrdered;
    }

    public function setQuantityOrdered(int $quantityOrdered): void
    {
        $this->quantityOrdered = $quantityOrdered;
    }




}
