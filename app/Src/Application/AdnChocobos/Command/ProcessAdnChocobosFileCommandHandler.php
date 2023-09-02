<?php
declare(strict_types=1);

namespace App\Src\Application\AdnChocobos\Command;

use App\Src\Domain\AdnChocobos\Service\AdnChocobosFileIterator;
use App\Src\Domain\AdnChocobos\Service\AdnChocobosManager;
use Illuminate\Support\Collection;

class ProcessAdnChocobosFileCommandHandler
{

    public function __construct(
        private readonly AdnChocobosFileIterator $adnChocobosFileIterator,
        private readonly AdnChocobosManager $manager
    )
    {
    }

    public function __invoke(ProcessAdnChocobosFileCommand $command): Collection
    {
        $iterator = $this->adnChocobosFileIterator->__invoke($command->resource);
        $index = 0;
        foreach ($iterator as $iteration) {
            if(empty($iteration)){
                break;
            }
            $index = $index + 1;
            $this->manager->__invoke($command->resource,$iteration, $index);
        }

       return $this->manager->getResponse();
    }

}
