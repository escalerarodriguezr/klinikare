<?php
declare(strict_types=1);

namespace App\Src\Domain\AdnChocobos\Service;

use App\Src\Domain\AdnChocobos\Dto\AdnChocoboRowResponse;
use App\Src\Domain\AdnChocobos\Exception\ChocobosFileException;
use Illuminate\Support\Collection;
use SplFileObject;

class AdnChocobosManager
{
    private SplFileObject $inputFile;
    private int $originFileSize;
    private int $nextLine;
    private int $currentLine;
    private int $nextChocobo;
    private string $currentRowString;
    private string $currentChocoboName;
    private int $currentChocoboAdition;
    private int $currentFileSize;

    private Collection $response;

    public function __construct()
    {
        $this->nextLine = 1;
        $this->currentLine = 0;
        $this->nextChocobo = 1;
        $this->currentRowString = '';
        $this->currentChocoboName = '';
        $this->response = new Collection();
        $this->currentFileSize = 0;
    }


    public function __invoke(string $resource, string $row, int $index): void
    {
        $this->currentLine = $index;
        $this->currentRowString = $row;

        if( $this->nextLine === 1 ){
            $path = storage_path($resource);
            $this->inputFile = new SplFileObject(
                $path,
                'r+'
            );

            $this->setOriginFileSize();
        }

        $this->setCurrentFileSize();
        $this->proccessFirstRowOfChocobo();
        $this->processChocoboAditionLine();

    }

    private function setOriginFileSize(): void
    {
        $this->originFileSize = $this->inputFile->getSize();
    }

    public function setCurrentFileSize(): void
    {
        $this->currentFileSize = $this->inputFile->getSize();
    }

    public function getResponse(): Collection
    {
        return $this->response;
    }


    private function proccessFirstRowOfChocobo(): void
    {
        if( $this->nextLine !== $this->nextChocobo ){
            return;
        }
        $parseRow = explode(' ', $this->currentRowString);
        list($name,$additions) = $parseRow;
        $additions = (int)$additions;

        if ( $additions < 1 || $additions > 64 ){
            throw ChocobosFileException::fromAdnChocobosManager();
        }

        $this->currentChocoboName = $name;
        $this->nextLine = $this->nextLine + 1;
        $this->nextChocobo = $this->nextLine + $additions;
        $this->currentChocoboAdition = 0;
        $this->pushRowResponse();

    }

    private function processChocoboAditionLine(): void
    {
        if( $this->nextLine == $this->nextChocobo ){
            return;
        }

        if( $this->currentLine === $this->nextLine ){
            $parseRow = explode(' ', $this->currentRowString);
            list($position,$byte) = $parseRow;
            $position = (int) $position;

            $this->currentChocoboAdition = $this->currentChocoboAdition + 1;
            $this->nextLine = $this->nextLine + 1;

            if( $position < 0 || $position > $this->currentFileSize ){
                throw ChocobosFileException::fromAdnChocobosManager();
            }

            if( (int)$byte < 0 || (int)$byte > 255 ){
                throw ChocobosFileException::fromAdnChocobosManager();
            }

            $this->addChococoboAdnToFile(
                $position,
                $byte
            );
            $this->pushRowResponse();
        }
    }

    private function getHashOfFile(): string
    {
        $path = sprintf('%s/%s', $this->inputFile->getPath(),$this->inputFile->getFilename());
        return hash_file('crc32b',$path);
    }

    private function pushRowResponse(): void
    {
        $responseRow = new AdnChocoboRowResponse(
            $this->currentChocoboName,
            $this->currentChocoboAdition,
            $this->getHashOfFile()
        );

        $this->response->push($responseRow);

    }

    private function addChococoboAdnToFile(int $position, string $byte):void
    {
        $this->inputFile->seek($position);
        $this->inputFile->fwrite($byte);
        $this->currentFileSize = $this->inputFile->getSize();
    }

}
