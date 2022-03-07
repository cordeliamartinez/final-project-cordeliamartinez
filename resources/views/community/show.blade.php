@extends("layouts.main")

@section("title")
    Cyclist: {{$user->name}}
@endsection

@section("content")

    <div class="card mt-4">
        <div class="card-header">
            A little about the cyclist
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$user->name}}</h4>
            <div class="card-text">
                <ul>
                    <li>is a {{$user->type->type}} Cyclist</li>
                    <li>has {{$user->route->count()}} Routes</li>
                    <li>can be reached at: <a href = "mailto: {{$user->email}}">{{$user->email}}</a></li>
                </ul>
            </div>
        </div>
    </div>

    @if($user->route->count() > 0)
        <div class="row mt-5">
            <h4>{{$user->name}}'s Routes</h4>
            <table class="table table-condensed mt-2">
                <tr>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Elevation</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                </tr>
                @foreach($user->route as $route)
                    <tr>
                        <td><a href="{{route('route.show', ['id' => $route->id])}}">{{$route->name}}</a></td>
                        <td>{{$route->distance}} km</td>
                        <td>{{$route->elevation}} m</td>
                        <td>{{$route->type->type}}</td>
                        <td>{{$route->difficulty->difficulty}}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    @else
        <div class="row mt-5">
            <h4>Sorry,</h4>
            <h5>It seems like {{$user->name}} doesn't have any routes to display.</h5>
        </div>
    @endif

    <a href="{{route('community.index')}}">
        <button class="btn btn-primary mb-4 mt-4">Back to Community</button>
    </a>


@endsection