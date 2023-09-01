<?php
declare(strict_types=1);

namespace App\Src\Application\ChocoBilly\Command;

use App\Src\Domain\ChocoBilly\Dto\ChocoBillyFileRow;
use App\Src\Domain\ChocoBilly\Dto\ChocoBillyOutputFileRow;
use App\Src\Domain\ChocoBilly\Service\ProcessChocoBillyOrder;
use Illuminate\Support\Collection;

class ProcessChocoBillyFileCommandHandler
{

    public function __construct(
        private readonly ProcessChocoBillyOrder $processChocoBillyOrder
    )
    {
    }

    public function __invoke(ProcessChocoBillyFileCommand $command): Collection
    {
        $responseCollection = new Collection();
        $command->fileRows->each(function (ChocoBillyFileRow $fileRow) use ($responseCollection){
            $stocks = $fileRow->getAvailableWeights()->sortDesc();
            $amount  =$fileRow->getQuantityOrdered();

            $response = $this->processChocoBillyOrder->__invoke($amount, $stocks);

            $responseCollection->push($response);




        });

        return $responseCollection;
    }


}
