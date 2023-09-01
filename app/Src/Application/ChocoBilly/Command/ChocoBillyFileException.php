<?php

namespace App\Src\Application\ChocoBilly\Command;

class ChocoBillyFileException extends \DomainException
{
    public static function fromCommandBuilder(): self
    {
        return new self('El formato del archivo no es correcto');
    }

}
