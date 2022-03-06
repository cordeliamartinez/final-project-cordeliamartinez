@extends("layouts.main")

@section("title", "Routes")

@section("content")

    @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif

    <div class="container">
        <div class="row">
            <table class="table">
                <tr>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Elevation</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                    <th>Edit</th>
                </tr>

                @foreach($routes as $route)
                    <tr>
                        <td>
                            <a href="{{route('route.show', ['id' => $route->id])}}">{{$route->name}}</a>
                        </td>
                        <td>{{$route->distance}} km</td>
                        <td>{{$route->elevation}} m</td>
                        <td>{{$route->type->type}}</td>
                        <td>{{$route->difficulty->difficulty}}</td>
                        <td>
                            <a href="{{route('route.edit', ['id' => $route->id])}}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

@endsection