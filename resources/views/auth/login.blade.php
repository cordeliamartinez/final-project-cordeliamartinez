@extends('layouts.main')

@section('title', 'Login')

@section('content')

    <h4 class="mt-3">Login to your BikeRoute account</h4>
    <p>Don't have an account? <a href="{{route('registration.index')}}">Sign up</a></p>

    <form method="POST" action="{{route('auth.login')}}" class="mt-3">
        @csrf
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="email" name="email">
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" id="password" name="password">
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary mb-4" value="Login"></button>
            <input type="reset" class="btn btn-secondary mb-4" value="Reset"></button>
    </form>

@endsection