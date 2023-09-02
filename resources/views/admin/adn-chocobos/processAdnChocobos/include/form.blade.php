<div class="row">
    <div class="col-xl-6">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Cargar archivo para procesar</h4>





                    <div class="row">
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mb-3">--}}
{{--                                @include('admin.shared.includes.inputs.input-text-with-label', ['field'=>'name', 'label'=>'Nombre', 'inputValue' => null])--}}
{{--                                @include('admin.shared.includes.error-input-message',['field'=>'name'])--}}
{{--                            </div>--}}
{{--                        </div>--}}

                        <div class="col-md-6">

                            <div class="row">
                                <div class="col-sm-12">

                                    <div class="mt-3">
                                        <label for="file" class="form-label">Archivo</label>
                                        <input
                                            name="file"
                                            class="form-control"
                                            type="file" id="file"
                                        >
                                    </div>
                                </div>
                            </div>


{{--                            <label for="email" class="form-label">Email</label>--}}
{{--                            <input--}}
{{--                                id="email"--}}
{{--                                name="email"--}}
{{--                                value="{{ old('email', '') }}"--}}
{{--                                class="form-control @error('email') is-invalid @enderror"--}}
{{--                                placeholder="Enter Email"--}}
{{--                            >--}}
                            @error('email')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                        </div>

                    </div>


{{--                    <div class="row">--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="password" class="form-label">Contraseña</label>--}}
{{--                                <input--}}
{{--                                    id="password"--}}
{{--                                    type="text"--}}
{{--                                    name="password"--}}
{{--                                    value="{{ old('password', '') }}"--}}
{{--                                    class="form-control @error('password') is-invalid @enderror"--}}
{{--                                    placeholder="Contraseña"--}}
{{--                                >--}}
{{--                                @include('admin.shared.includes.error-input-message',['field'=>'password'])--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-md-6">--}}
{{--                            <label for="password_confirmation" class="form-label">Repetir Contraseña</label>--}}
{{--                            <input--}}
{{--                                id="password_confirmation"--}}
{{--                                name="password_confirmation"--}}
{{--                                value="{{ old('password_confirmation', '') }}"--}}
{{--                                class="form-control @error('password_confirmation') is-invalid @enderror"--}}
{{--                                placeholder="Repetir contraseña"--}}
{{--                            >--}}
{{--                            @error('password_confirmation')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror--}}
{{--                        </div>--}}

{{--                    </div>--}}





{{--                    <div class="row">--}}

{{--                        <div class="col-md-6">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="formrow-email-input" class="form-label">Email</label>--}}
{{--                                <input type="email" class="form-control" id="formrow-email-input" placeholder="Enter Your Email ID">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-md-6">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="formrow-password-input" class="form-label">Password</label>--}}
{{--                                <input type="password" class="form-control" id="formrow-password-input" placeholder="Enter Your Password">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="row">--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="formrow-inputCity" class="form-label">City</label>--}}
{{--                                <input type="text" class="form-control" id="formrow-inputCity" placeholder="Enter Your Living City">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <div class="col-lg-4">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="formrow-inputState" class="form-label">State</label>--}}
{{--                                <select id="formrow-inputState" class="form-select">--}}
{{--                                    <option selected>Choose...</option>--}}
{{--                                    <option>...</option>--}}
{{--                                </select>--}}
{{--                            </div>--}}
{{--                        </div>--}}

{{--                        <div class="col-lg-4">--}}
{{--                            <div class="mb-3">--}}
{{--                                <label for="formrow-inputZip" class="form-label">Zip</label>--}}
{{--                                <input type="text" class="form-control" id="formrow-inputZip" placeholder="Enter Your Zip Code">--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <div class="mb-3">--}}

{{--                        <div class="form-check">--}}
{{--                            <input class="form-check-input" type="checkbox" id="gridCheck">--}}
{{--                            <label class="form-check-label" for="gridCheck">--}}
{{--                                Check me out--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="mt-2 d-flex justify-content-end">
                        <div>
                            <button id="process-form-button" type="submit" class="btn btn-primary w-md">Procesar</button>
                        </div>
                    </div>
            </div>
            <!-- end card body -->
        </div>
        <!-- end card -->
    </div>
    <!-- end col -->
