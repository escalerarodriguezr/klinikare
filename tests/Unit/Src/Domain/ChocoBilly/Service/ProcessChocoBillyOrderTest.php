<?php

namespace Tests\Unit\Src\Domain\ChocoBilly\Service;

use App\Src\Domain\ChocoBilly\Service\ProcessChocoBillyOrder;
use App\Src\Domain\ChocoBilly\Service\ProcessChocoBillyOrderResponse;
use Tests\TestCase;

class ProcessChocoBillyOrderTest extends TestCase
{
    private ProcessChocoBillyOrder $processChocoBillyOrder;
    protected function setUp(): void
    {
        parent::setUp();
        $this->processChocoBillyOrder = $this->app->make(ProcessChocoBillyOrder::class);
    }

    public function testGetProcessChocoBillyOrderResponse(): void
    {
        $amount = 6;
        $stocks = collect([3,2]);
        $response = $this->processChocoBillyOrder->__invoke(
            $amount,
            $stocks
        );
        self::assertInstanceOf(ProcessChocoBillyOrderResponse::class,$response);
        self::assertSame(2,$response->weights->count());
        self::assertSame(3,$response->weights->first());
        self::assertSame(3,$response->weights->last());
    }

}
