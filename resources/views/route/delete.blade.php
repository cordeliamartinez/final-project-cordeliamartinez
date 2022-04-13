@extends('layouts.main')

@section('title')
    Delete Route
@endsection
  
@section('content')

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-11">
            <h4 class="mt-3">Are you sure you want to delete "{{$route->name}}"?</h4>
            <hr>
        </div>
    </div>

    <form method="POST" action="{{route('route.destroy', ['id' => $route->id])}}" class="mt-2">
        @csrf
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <button type="submit" class="btn btn-delete mb-4">Delete</button>
                <button class="btn btn-secondary mb-4">
                    <a href="{{route('profile.index')}}" class="text-white text-decoration-none">
                        Cancel
                    </a>
                </button>
            </div>
        </div>
    </form>

@endsection