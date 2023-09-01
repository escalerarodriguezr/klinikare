<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Src\Domain\Shared\Cqrs\CommandBus;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetProcessChocoBillyController extends Controller
{

    const SHOW_FORM_ROUTE_NAME = 'admin.process-choco-billy.showForm';

    private Authenticatable|User $actionUser;


    public function __construct(
        private readonly CommandBus $commandBus
    )
    {

    }


    public function __invoke(Request $request): View|RedirectResponse
    {

        $this->actionUser = $request->user();

        $roles = [
            'ROOT' => 'Root',
            'ADMIN' => 'Admin'
        ];


//        $request->session()->flash('success-notification', 'Task was successful!');
//        return redirect()->route('admin.dashboard');

        return view('admin.chocobilly.processChocoBilly.show-form',[
            'actionUser' => $this->actionUser,
            'roles' => $roles
        ]);

    }

//    public function save(CreateAdminRequest $request): RedirectResponse
//    {
//
//        $command = new CreateAdminCommand(
//            $request->name,
//            $request->email,
//            $request->role,
//            Hash::make($request->password),
//            $request->user()
//        );
//
//        $response = $this->commandBus->handle($command);
//
//        $message = sprintf('Administrador con email: %s creado.', $response->email);
//        $request->session()->flash('success-notification', $message);
//        return redirect()->route('admin.dashboard');
//
//
//    }

}
