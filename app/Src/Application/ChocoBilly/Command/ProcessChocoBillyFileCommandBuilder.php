<?php
declare(strict_types=1);

namespace App\Src\Application\ChocoBilly\Command;

use App\Src\Domain\ChocoBilly\Dto\ChocoBillyFileRow;
use App\Src\Domain\ChocoBilly\Exception\ChocoBillyFileException;
use Illuminate\Http\Request;

class ProcessChocoBillyFileCommandBuilder
{


    public function __construct()
    {
    }

    public function build(Request $request): ?ProcessChocoBillyFileCommand
    {
        $content = $request->file->getContent();
        $rows = explode("\n", $content);
        $parseData = [];
        $total = 0;

        foreach($rows as $row => $rowFileData)
        {
            $rowData = explode('^', $rowFileData);
            $rowFileValue = str_replace("\r", '', $rowData[0]);

            if( empty($rowFileValue) ){
                continue;
            }

            if( $row == 0 ){
                if(!is_numeric($rowFileValue)){
                    throw ChocoBillyFileException::fromCommandBuilder();
                }
                $chocoBillyFileRow = new ChocoBillyFileRow();
                $total = intval($rowFileValue);
                $parseData[$row] = $chocoBillyFileRow;
                continue;
            }

            if (($row % 2) != 0) {
                $availableWeights = explode(',',$rowFileValue);
                $intWeights = [];
                foreach ($availableWeights as $item){
                    if(!is_numeric($item)){
                        throw ChocoBillyFileException::fromCommandBuilder();
                    }
                    $intWeights[] = intval($item);
                }

                $chocoBillyFileRow = new ChocoBillyFileRow();
                $chocoBillyFileRow->setAvailableWeights(collect($intWeights));

                $parseData[$row-1] = $chocoBillyFileRow;
            } else {
                if(!is_numeric($rowFileValue)){
                    throw ChocoBillyFileException::fromCommandBuilder();
                }
                $parseData[$row-2]->setQuantityOrdered(intval($rowFileValue));
            }


        }
         $command = new ProcessChocoBillyFileCommand(
             $total,
             collect($parseData)
         );

        if( $command->total != $command->fileRows->count() ){
            throw ChocoBillyFileException::fromCommandBuilder();
        }

        return $command;

    }


}
