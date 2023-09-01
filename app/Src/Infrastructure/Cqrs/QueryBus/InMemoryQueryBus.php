<?php
declare(strict_types=1);

namespace App\Src\Infrastructure\Cqrs\QueryBus;

use App\Src\Domain\Shared\Cqrs\QueryBus;
use App\Src\Infrastructure\Cqrs\GuardResolver;
use App\Src\Infrastructure\Cqrs\HandlerResolver;
use App\Src\Infrastructure\Cqrs\ValidatorResolver;

class InMemoryQueryBus implements QueryBus
{


    public function __construct(
        private readonly HandlerResolver $handlerResolver,
        private readonly GuardResolver $guardResolver,
        private readonly ValidatorResolver $validatorResolver
    )
    {
    }

    public function handle(mixed $query): mixed
    {

        //Guard
        $guard = $this->guardResolver->__invoke($query, 'Query');
        if($guard !== null){
            $guard($query);
        }

        //Validator
        $validator = $this->validatorResolver->__invoke($query, 'Query');
        if($validator !== null){
            $validator($query);
        }

        //Handler
        try {
            $handler = $this->handlerResolver->__invoke($query, 'Query');
            return $handler($query);
        } catch (\Throwable $exception) {
            throw $exception;
        }
    }


}
