<?php
declare(strict_types=1);

namespace App\Http\Controllers\Admin\AdnChocobos\ProcessAdnChocobos;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Src\Application\AdnChocobos\Command\ProcessAdnChocobosFileCommand;
use App\Src\Domain\AdnChocobos\Dto\AdnChocoboRowResponse;
use App\Src\Domain\Shared\Cqrs\CommandBus;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PostProcessAdnChocobosController extends Controller
{
    const ROUTE_NAME = 'admin.process-adn-chocobos.process';

    private Authenticatable|User $actionUser;

    public function __construct(
        private readonly CommandBus $commandBus
    )
    {

    }


    public function __invoke(Request $request): StreamedResponse|JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'file' => [
                'required',
                'mimes:txt'
            ],
        ]);

        if ($validator->fails()) {
            $firstErrorMessage = $validator->errors()->get('file')[0];
            return new JsonResponse(
                ['error' => $firstErrorMessage],
                422
            );
        }

        $resourcePath = $request->file('file')->store('adn');
        $command = new ProcessAdnChocobosFileCommand(sprintf('app/%s',$resourcePath));
        $commandResponse = $this->commandBus->handle($command);

        $response = new StreamedResponse();
        $response->setCallBack(function () use( $commandResponse ) {
            foreach ($commandResponse as $row){
                /**
                 * @var $row AdnChocoboRowResponse
                 */
                echo sprintf('%s %s: %s%s',
                    $row->name,
                    $row->adition,
                    $row->hash,
                    "\n"
                );
            }
        });

        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'chocobo-adn.txt'
        );
        $response->headers->set('Content-Disposition', $disposition);
        return $response;

    }

}
