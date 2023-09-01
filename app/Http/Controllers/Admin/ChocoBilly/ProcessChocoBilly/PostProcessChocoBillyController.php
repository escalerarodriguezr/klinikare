<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly;


use App\Http\Controllers\Controller;
use App\Models\User;
use App\Src\Application\ChocoBilly\Command\ProcessChocoBillyFileCommandBuilder;
use App\Src\Domain\ChocoBilly\Service\ProcessChocoBillyOrderResponse;
use App\Src\Domain\Shared\Cqrs\CommandBus;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\HttpFoundation\StreamedResponse;

class PostProcessChocoBillyController extends Controller
{

    const ROUTE_NAME = 'admin.process-choco-billy.process';

    private Authenticatable|User $actionUser;


    public function __construct(
        private readonly ProcessChocoBillyFileCommandBuilder $commandBuilder,
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
                ['error' => $firstErrorMessage ],
                422
            );
        }


        $command = $this->commandBuilder->build($request);
        $commandResponse = $this->commandBus->handle($command);
        $response = new StreamedResponse();
        $response->setCallBack(function () use( $commandResponse ) {
            foreach ($commandResponse as $row){
                /**
                 * @var $row ProcessChocoBillyOrderResponse
                 */
                echo sprintf('%s:%s%s',
                    ($row->weights->count()),
                    implode(',',$row->weights->toArray()),
                    "\n"
                );
            }

        });
        $disposition = $response->headers->makeDisposition(
            ResponseHeaderBag::DISPOSITION_ATTACHMENT,
            'choco-billy.txt'
        );
        $response->headers->set('Content-Disposition', $disposition);
        return $response;

    }

}
