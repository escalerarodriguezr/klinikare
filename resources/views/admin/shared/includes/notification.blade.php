@if ($message = Session::get('success-notification'))
    <div id="vanilla-toast-container">
        <div id="vanilla-toast" class="success" style="display:inline-block;">
            <div id="vanilla-toast-text">{{$message}}</div>
            <span id="vanilla-toast-close-button" data-blade="toast" style="display:inline-block;">✖</span>
        </div>
    </div>
@endif

@if ($message = Session::get('error-notification'))
    <div id="vanilla-toast-container">
        <div id="vanilla-toast" class="error" style="display:inline-block;">
            <div id="vanilla-toast-text">{{$message}}</div>
            <span id="vanilla-toast-close-button" data-blade="toast" style="display:inline-block;">✖</span>
        </div>
    </div>
@endif

@if ($message = Session::get('info-notification'))
    <div id="vanilla-toast-container">
        <div id="vanilla-toast" class="info" style="display:inline-block;">
            <div id="vanilla-toast-text">{{$message}}</div>
            <span id="vanilla-toast-close-button" data-blade="toast" style="display:inline-block;">✖</span>
        </div>
    </div>
@endif

@if ($message = Session::get('warning-notification'))
    <div id="vanilla-toast-container">
        <div id="vanilla-toast" class="warning" style="display:inline-block;">
            <div id="vanilla-toast-text">{{$message}}</div>
            <span id="vanilla-toast-close-button" data-blade="toast" style="display:inline-block;">✖</span>
        </div>
    </div>
@endif



