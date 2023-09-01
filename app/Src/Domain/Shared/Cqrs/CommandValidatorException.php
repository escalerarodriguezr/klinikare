<?php
declare(strict_types=1);

namespace App\Src\Domain\Shared\Cqrs;

class CommandValidatorException extends \DomainException
{
    public static function fromCommand(mixed $command, string $message, string $action=null): self
    {


        return new self(
            sprintf(
                'Acción "%s" no permitida. Motivo: "%s"',
                $action ?? self::getSortClassName( $command::class),
                $message
            )
        );
    }

    private static function getSortClassName(string $className): string
    {
        $parts = explode('\\', $className);
        return end($parts);
    }


}
