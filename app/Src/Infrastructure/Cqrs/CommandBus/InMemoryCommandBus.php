<?php
declare(strict_types=1);

namespace App\Src\Infrastructure\Cqrs\CommandBus;

use App\Src\Domain\Shared\Cqrs\CommandBus;
use Illuminate\Support\Facades\DB;
use App\Src\Infrastructure\Cqrs\GuardResolver;
use App\Src\Infrastructure\Cqrs\HandlerResolver;
use App\Src\Infrastructure\Cqrs\ValidatorResolver;

class InMemoryCommandBus implements CommandBus
{
    public function __construct(
        private readonly HandlerResolver $handlerResolver,
        private readonly GuardResolver $guardResolver,
        private readonly ValidatorResolver $validatorResolver
    )
    {
    }

    public function handle(mixed $command): mixed
    {
        //Guard
        $guard = $this->guardResolver->__invoke($command);
        if($guard !== null){
            $guard($command);
        }

        //Validator
        $validator = $this->validatorResolver->__invoke($command);
        if($validator !== null){
            $validator($command);
        }

        //Handler
        if (
            !empty(env('DB_CONNECTION', null)) &&
            !app()->environment('testing')
        )
        {
            DB::beginTransaction();
        }

        try {
            $handler = $this->handlerResolver->__invoke($command);
            $response = $handler($command);
            if (
                !empty(env('DB_CONNECTION', null)) &&
                !app()->environment('testing')
            )
            {
                DB::commit();
            }

            return $response;
        } catch (\Throwable $exception) {
            if (
                !empty(env('DB_CONNECTION', null)) &&
                !app()->environment('testing')
            )
            {
                DB::rollBack();
            }
            throw $exception;
        }

    }
}
