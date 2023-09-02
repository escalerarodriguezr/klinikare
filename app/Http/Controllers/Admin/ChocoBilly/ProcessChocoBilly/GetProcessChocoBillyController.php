<?php
declare(strict_types=1);
namespace App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetProcessChocoBillyController extends Controller
{

    const SHOW_FORM_ROUTE_NAME = 'admin.process-choco-billy.showForm';

    private Authenticatable|User $actionUser;


    public function __construct()
    {

    }


    public function __invoke(Request $request): View|RedirectResponse
    {
        $this->actionUser = $request->user();
        return view('admin.chocobilly.processChocoBilly.show-form',[
            'actionUser' => $this->actionUser,
        ]);
    }

}
