<?php
declare(strict_types=1);

namespace App\Src\Domain\AdnChocobos\Service;

use SplFileObject;

class AdnChocobosFileIterator
{
    public function __invoke(string $resource): \Generator
    {
        $path = storage_path($resource);
        $file = new SPLFileObject($path);
        foreach($file as $line) {
            yield trim($line);
        }
    }
}
