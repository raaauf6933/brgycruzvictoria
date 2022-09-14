@extends('layouts.guest.app')

@section('title', 'Login')

@section('content')
    <!-- Page content -->
    <div class="container pb-5 mt-5 mt-lg-6">
        <div class="row justify-content-center">
            <div class="col-11 col-md-6">
                <div class="card shadow mb-0 border-success">
                    <div class="card-body px-lg-5">
                        <img class="img-fluid rounded-circle d-block mx-auto" src="{{ asset('img/logo/logo.png') }}"
                            width="150" alt="logo">
                        <h3 class="text-success text-center mt-3">Login</h3>
                        {{-- Form --}}
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @include('layouts.includes.alert')

                            <div class="input-group mb-3">
                                <span class="input-group-text bg-success text-white"><i
                                        class="fas fa-envelope fa-xs"></i></span>
                                <input class="form-control" type="email" name="email" placeholder="Email"
                                    value="admin@gmail.com">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-success text-white" id="password"><i
                                        class="fas fa-eye fa-xs"></i></span>
                                <input class="form-control" type="password" name="password" placeholder="******"
                                    value="test1234" id="password_field">
                            </div>

                            <div class="custom-control custom-control-alternative custom-checkbox">
                                <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                                <label class="custom-control-label" for=" customCheckLogin">
                                    <span class="text-muted">Remember me</span>
                                </label>
                            </div>

                            <button type="submit" class="btn btn-success my-4 d-block w-100">Login</button>

                            <div class="text-end">
                                <a class="nav-link text-small text-warning" href="{{ route('password.request') }}">Forgot
                                    password?</a>
                            </div>
                        </form>
                        {{-- End Form --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        const password_field = document.getElementById('password_field');

        document.getElementById('password').addEventListener('click', function() {
            return password_field.getAttribute('type') == "password" ?
                password_field.setAttribute('type', 'text') :
                password_field.setAttribute('type', 'password')
        })
    </script>
@endsection
