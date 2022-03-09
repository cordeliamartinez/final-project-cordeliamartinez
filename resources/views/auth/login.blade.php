@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="mt-3">Login to your BikeRoute account</h4>
            <p>Don't have an account? <a href="{{route('registration.index')}}">Sign up</a></p>
        </div>
    </div>

    <form method="POST" action="{{route('auth.login')}}" class="mt-2">
        @csrf
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="email" name="email">
                    </div>
                </div>
            </div>
            <div class="row mb-4 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-primary mb-4" value="Login"></button>
                        <input type="reset" class="btn btn-secondary mb-4" value="Reset"></button>
                    </div>
                </div>
            </div>
    </form>

@endsection