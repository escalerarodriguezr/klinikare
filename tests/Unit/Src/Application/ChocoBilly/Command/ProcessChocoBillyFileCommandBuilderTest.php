<?php

namespace Tests\Unit\Src\Application\ChocoBilly\Command;

use App\Src\Application\ChocoBilly\Command\ChocoBillyFileException;
use App\Src\Application\ChocoBilly\Command\ProcessChocoBillyFileCommand;
use App\Src\Application\ChocoBilly\Command\ProcessChocoBillyFileCommandBuilder;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class ProcessChocoBillyFileCommandBuilderTest extends TestCase
{

    private ProcessChocoBillyFileCommandBuilder $commandBuilder;
    protected function setUp():void
    {
        parent::setUp();
        $this->commandBuilder = $this->app->make(ProcessChocoBillyFileCommandBuilder::class);
    }

    private function getFileForTesting(string $path): UploadedFile
    {
        $path = storage_path($path);
        $original_name = 'input_billy_ok.txt';
        $mime_type = 'text/plain';
        return new UploadedFile($path, $original_name, $mime_type);
    }

    public function testValidChocoBillyFile()
    {
        $request = new Request();
        $request->merge(['file'=>$this->getFileForTesting('testing/input_billy_ok.txt')]);
        $commandResponse = $this->commandBuilder->build($request);
        self::assertInstanceOf(ProcessChocoBillyFileCommand::class,$commandResponse);

    }

    public function testInvalidChocoBillyFile()
    {
        $request = new Request();
        $request->merge(['file'=>$this->getFileForTesting('testing/input_billy_invalid.txt')]);
        self::expectException(ChocoBillyFileException::class);
        $this->commandBuilder->build($request);
    }


}
