<?php
declare(strict_types=1);

namespace App\Providers;

use App\Src\Domain\Shared\Cqrs\CommandBus;
use App\Src\Domain\Shared\Cqrs\QueryBus;
use App\Src\Infrastructure\Cqrs\CommandBus\InMemoryCommandBus;
use App\Src\Infrastructure\Cqrs\QueryBus\InMemoryQueryBus;
use Illuminate\Support\ServiceProvider;


class InfrastructureProvider extends ServiceProvider
{
    public function register(): void
    {
        //Cqrs
        $this->app->bind(CommandBus::class, InMemoryCommandBus::class);
        $this->app->bind(QueryBus::class, InMemoryQueryBus::class);


    }

    public function boot(): void
    {

    }

}
