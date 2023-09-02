<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-apps">Klinikare</li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">Choco Billy</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li
                            class="{!! str_contains(Route::currentRouteName(), \App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly\GetProcessChocoBillyController::SHOW_FORM_ROUTE_NAME) !== false ? ' mm-active' : '' !!}"
                        >
                            <a href="{{route(\App\Http\Controllers\Admin\ChocoBilly\ProcessChocoBilly\GetProcessChocoBillyController::SHOW_FORM_ROUTE_NAME)}}">
                                Procesar archivo
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span key="t-dashboards">ADN Chocobos</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li
                            class="{!! str_contains(Route::currentRouteName(), \App\Http\Controllers\Admin\AdnChocobos\ProcessAdnChocobos\GetProcessAdnChocobosController::SHOW_FORM_ROUTE_NAME) !== false ? ' mm-active' : '' !!}"
                        >
                            <a href="{{route(\App\Http\Controllers\Admin\AdnChocobos\ProcessAdnChocobos\GetProcessAdnChocobosController::SHOW_FORM_ROUTE_NAME)}}">
                                Procesar archivo
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->
