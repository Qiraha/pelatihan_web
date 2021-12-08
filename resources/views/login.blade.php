@extends('templates.main')

@section('content')
<div class="container">
    <div class="row justify-content-center vh-100">
        <div class="col-lg-8 text-center align-self-center">
            <h1 class="fs-2">Welcome to <strong>Notes App</strong></h1>
            <p class="fw-bold mb-5">Please Login to Continue</p>
            @if (session()->has('success'))
                <div class="row justify-content-center">
                    <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                        {{session('success')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @elseif(session()->has('credentialError'))
                <div class="row justify-content-center">
                    <div class="alert alert-danger alert-dismissible fade show col-4" role="alert">
                        {{session('credentialError')}}
                        <button type="button" class="btn-close" color data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
            <div class="row justify-content-center my-3">
                <div class="col-lg-6 text-start">
                    <form action="login" class="text-start" method="post">
                        @csrf
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
                            <button type="submit" class="btn btn-dark rounded-3">Login</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{url('register')}}" class="text-dark fw-bold">Register now</a>

        </div>
    </div>
</div>

@endsection
