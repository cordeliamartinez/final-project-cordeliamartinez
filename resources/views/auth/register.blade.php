@extends('layouts.main')

@section('title', 'Register')

@section('content')

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="mt-3">Create a BikeRoute account</h4>
            <p>Already have an account? <a href="{{route('login')}}">Sign in</a></p>
        </div>
    </div>

    <form method="POST" action="{{route('registration.create')}}" class="mt-2">
        @csrf
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="name">Full Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                        @error("name")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="type">Cyclist Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-select">
                            <option value="">-- Select Type --</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{(string) $type->id === old('type') ? "selected": ""}}>{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error("type")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="email">Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" id="email" name="email" value="{{old('email')}}">
                        @error("email")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <label for="password">Password <span class="text-danger">*</span></label>
                        <input class="form-control" type="password" id="password" name="password">
                        @error("password")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <div class="col-sm-6">
                        <input type="submit" class="btn btn-primary mb-4" value="Register"></button>
                        <input type="reset" class="btn btn-secondary mb-4" value="Reset"></button>
                    </div>
                </div>
            </div>
    </form>

@endsection