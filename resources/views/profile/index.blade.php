@extends('layouts.main')

@section('title')
    {{$user->name}}'s Profile
@endsection
  
@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <div class="card mt-4">
                <div class="card-header">
                    Your Info
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h4>
                    <div class="card-text">
                        <ul>
                            <li>Type: {{$user->type->type}} Cyclist</li>
                            <li>Routes: {{$user->route->count()}}</li>
                            <li>Email: <a href = "mailto: {{$user->email}}">{{$user->email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5 mb-3">
        <hr class="col-sm-10">
    </div>

    @if($user->favorite->count() > 0)
    <div class="row g-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="bg-primary text-white p-2">Your Favorite Routes</h4>
            <table class="table table-condensed mt-2">
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Date Added</th>
                    <th></th>
                </tr>
                @foreach($user->favorite as $favorite)
                    <tr>
                        <td><a href="{{route('route.show', ['id' => $favorite->route->id])}}" class="text-dark">{{$favorite->route->name}}</a></td>
                        <td>{{$favorite->route->user->name}}</td>
                        <td>{{date_format($favorite->created_at, 'n/j/Y')}} at {{date_format($favorite->created_at, 'g:i A')}}</td>
                        @can('delete', $favorite)
                            <td>
                                <form method="POST" action="{{route('favorite.destroy', ['id' => $favorite->id])}}">
                                    @csrf
                                        <button class="btn btn-sm btn-outline-danger" type="submit">X</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <a href="{{route('route.index')}}" role="button" class="btn btn-primary mt-4 mb-4 text-nowrap">
                View Routes
            </a>
        </div>
    </div>

    @else
        <div class="row mt-5 mb-2 justify-content-center">
            <div class="col-sm-10">
                <h4>SORRY,</h4>
                <h5>It seems like you don't have any favorite routes to display.</h5>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5 mb-3">
        <hr class="col-sm-10">
    </div>

    @if($user->route->count() > 0)
    <div class="row g-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="bg-primary text-white p-2">Your Created Routes</h4>
            <table class="table table-condensed mt-2">
                <tr>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Elevation</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
                @foreach($user->route as $route)
                    <tr>
                        <td><a href="{{route('route.show', ['id' => $route->id])}}" class="text-dark">{{$route->name}}</a></td>
                        <td>{{$route->distance}} km</td>
                        <td>{{$route->elevation}} m</td>
                        <td>{{$route->type->type}}</td>
                        <td>{{$route->difficulty->difficulty}}</td>
                        @can('update', $route)
                            <td>
                                <a href="{{route('route.edit', ['id' => $route->id])}}">Edit</a>
                            </td>
                        @endcan
                        @can('delete', $route)
                            <td>
                                <a href="{{route('route.delete', ['id' => $route->id])}}">Delete</a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
        <div class="row mt-5 mb-2 justify-content-center">
            <div class="col-sm-10">
                <h4>SORRY,</h4>
                <h5>It seems like you don't have any routes to display.</h5>
            </div>
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <a href="{{route('route.create')}}" role="button" class="btn btn-primary mt-4 mb-4 text-nowrap">
                Create a Route
            </a>
        </div>
    </div>

@endsection