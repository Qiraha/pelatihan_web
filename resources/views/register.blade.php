@extends('templates.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center vh-100">
            <div class="col-lg-8 text-center align-self-center">
                <h1 class="fs-1">Welcome to <strong>Notes App</strong></h1>
                <p class="fw-bold mb-5">Please Login to Continue</p>
                <div class="row justify-content-center my-3">
                    <div class="col-lg-6 text-start">
                        <form action="{{url('register')}}" method="post">
                            @csrf
                            <input
                                type="text"
                                id="fullname"
                                class="form-control border-3 rounded-3 border-dark mt-3
                                @error('fullname') is-invalid @enderror"
                                name="fullname"
                                placeholder="Fullname"
                            />
                            @error('fullname')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <input
                                type="text"
                                id="username"
                                class="form-control border-3 rounded-3 border-dark mt-3
                                @error('username') is-invalid @enderror"
                                name="username"
                                {{-- maxlength="20"  --}}
                                placeholder="Username"
                                value="{{old('username')}}"
                            />
                            @error('username')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <input
                                {{-- type="email"  --}}
                                id="email"
                                class="form-control border-3 rounded-3 border-dark mt-3
                                @error('email') is-invalid @enderror"
                                name="email"
                                placeholder="Email"
                                value=""
                            />
                            @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <input
                                type="password"
                                id="password"
                                class="form-control border-3 rounded-3 border-dark mt-3
                                @error('password') is-invalid @enderror"
                                name="password"
                                {{-- minlength="6" --}}
                                placeholder="Password"
                            />
                            @error('password')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror

                            <div class="d-grid mt-3">
                                <button type="submit" class="btn btn-dark rounded-3">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            <a href="{{url('login')}}" class="text-dark fw-bold">back to Login</a>
            </div>
        </div>
    </div>
@endsection
