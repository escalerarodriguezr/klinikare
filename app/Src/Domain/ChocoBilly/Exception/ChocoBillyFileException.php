<?php

namespace App\Src\Domain\ChocoBilly\Exception;

class ChocoBillyFileException extends \DomainException
{
    public static function fromCommandBuilder(): self
    {
        return new self('El formato del archivo no es correcto');
    }

}
