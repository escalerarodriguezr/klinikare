<?php
declare(strict_types=1);

namespace App\Src\Domain\ChocoBilly\Service;

use Illuminate\Support\Collection;

class ProcessChocoBillyOrder
{


    public function __construct()
    {
    }

    public function __invoke(
        int $amount,
        Collection $stocks
    ): ProcessChocoBillyOrderResponse
    {
        $pending = $amount;
        $itemsResponse = new Collection();

        foreach ( $stocks as $stock ){

            $numberForStock = intval(floor($pending/$stock));
            if( $numberForStock == 0 ){
                continue;
            }
            $pending = $pending - $numberForStock*$stock;

            foreach (range(1,$numberForStock) as $element) {
                $itemsResponse->push($stock);
            }

            if( $pending <= 0  ){
                break;
            }
        }

        return new ProcessChocoBillyOrderResponse(
            $itemsResponse,
            $amount
        );

    }


}
