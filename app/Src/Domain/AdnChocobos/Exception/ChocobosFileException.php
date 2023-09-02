<?php
declare(strict_types=1);

namespace App\Src\Domain\AdnChocobos\Exception;

class ChocobosFileException extends \DomainException
{
    public static function fromAdnChocobosManager(): self
    {
        return new self('El formato del archivo no es correcto');
    }

}
