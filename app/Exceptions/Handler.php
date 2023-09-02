<?php

namespace App\Exceptions;

use App\Src\Application\ChocoBilly\Command\ChocoBillyFileException;
use App\Src\Domain\AdnChocobos\Exception\ChocobosFileException;
use App\Src\Domain\Shared\Cqrs\CommandGuardException;
use App\Src\Domain\Shared\Cqrs\CommandValidatorException;
use App\Src\Domain\Shared\Cqrs\QueryGuardException;
use App\Src\Domain\Shared\Cqrs\QueryValidatorException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });

        $this->renderable(function (Throwable $e, $request) {
           if( $e instanceof ValidationException === false ){

               if( $e instanceof NotFoundHttpException){
                   if(str_contains($request->url(), '/admin/')){
                       return response()->view('errors.admin/404')->setStatusCode(404);
                   }
               }

               if( $e instanceof AuthenticationException){
                   if(str_contains($request->url(), '/admin/')){
                       return response()->view('errors.admin/401')->setStatusCode(Response::HTTP_UNAUTHORIZED);
                   }
               }

               if (\in_array(\get_class($e), $this->getDomainExceptionJsonResponseServiceException(), true)) {
                   return new JsonResponse(
                       ['error' => $e->getMessage() ],
                       Response::HTTP_UNPROCESSABLE_ENTITY
                   );
               }

               if (\in_array(\get_class($e), $this->getCommandGuardExceptions(), true)) {
                   if(str_contains($request->url(), '/admin/')){
                       return response()->view('errors.admin/403')->setStatusCode(403);
                   }
               }

               if (\in_array(\get_class($e), $this->getCommandValidationExceptions(), true)) {
                   if(str_contains($request->url(), '/admin/')){
                       return back()->withInput()->with('warning-notification', $e->getMessage());
                   }
               }

               if(str_contains($request->url(), '/admin/')){
                   return response()->view('errors.admin/500')->setStatusCode(500);
               }
           }
        });
    }

    private function getSortClassName(string $className): string
    {
        $parts = explode('\\', $className);
        return end($parts);
    }


    private function getDomainExceptionJsonResponseServiceException(): array
    {
        return [
            ChocoBillyFileException::class,
            ChocobosFileException::class
        ];
    }

    private function getCommandGuardExceptions(): array
    {
        return [
            CommandGuardException::class,
            QueryGuardException::class
        ];
    }

    private function getCommandValidationExceptions(): array
    {
        return [
            CommandValidatorException::class,
            QueryValidatorException::class
        ];
    }
}
