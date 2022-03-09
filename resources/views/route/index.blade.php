@extends("layouts.main")

@section("title", "Routes")

@section("content")

    <div class="container">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <th>Name</th>
                        <th>Distance</th>
                        <th>Elevation</th>
                        <th>Type</th>
                        <th>Difficulty</th>
                    </tr>

                    @foreach($routes as $route)
                        <tr>
                            <td>
                                <a href="{{route('route.show', ['id' => $route->id])}}" class="text-dark">{{$route->name}}</a>
                            </td>
                            <td>{{$route->distance}} km</td>
                            <td>{{$route->elevation}} m</td>
                            <td>{{$route->type->type}}</td>
                            <td>{{$route->difficulty->difficulty}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection