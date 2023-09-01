@extends('layouts.master-without-nav')

@section('title')
    @lang('translation.Login')
@endsection

@section('body')
    <body>
@endsection

    @section('content')
        <div class="account-pages my-5 pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card overflow-hidden">

                            <div class="card-body pt-0">
                                <div class="p-2">
                                    <form class="form-horizontal" method="POST" action="{{route('admin.loginAction')}}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Email</label>
                                            <input name="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   value="{{ old('email', '') }}" id="username"
                                                   placeholder="Enter Email" autocomplete="email" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Password</label>
                                            <div
                                                class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                                <input type="password" name="password"
                                                       class="form-control  @error('password') is-invalid @enderror"
                                                       id="userpassword" value="" placeholder="Enter password"
                                                       aria-label="Password" aria-describedby="password-addon">

                                                @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="mt-3 d-grid">
                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Log
                                                In</button>
                                        </div>

                                    </form>
                                </div>

                            </div>
                        </div>
                        <div class="mt-5 text-center">

                            <div>
                                <p>©
                                    <script>
                                        document.write(new Date().getFullYear())
                                    </script> Klinikare
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end account-pages -->

@endsection
