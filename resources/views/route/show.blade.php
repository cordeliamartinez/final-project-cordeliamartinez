@extends("layouts.main")

@section("title")
    Route: {{$routeInfo->name}}
@endsection

@section("content")

    <h5>By: {{$routeInfo->user->name}}</h5>

    <table class="table table-condensed mt-5">
        <tr>
            <th scope="row">Difficulty</th>
            <td>{{$routeInfo->difficulty->difficulty}}</td>
        </tr>
        <tr>
            <th scope="row">Ride type</th>
            <td>{{$routeInfo->type->type}}</td>
        </tr>
        <tr>
            <th scope="row">Start to End</th>
            <td>{{$routeInfo->start}} --> {{$routeInfo->finish}}</td>
        </tr>
        <tr>
            <th scope="row">Terrain</th>
            <td>{{$routeInfo->terrain->terrain}}</td>
        </tr>
        <tr>
            <th scope="row">Distance</th>
            <td>{{$routeInfo->distance}} km</td>
        </tr>
        <tr>
            <th scope="row">Elevation</th>
            <td>{{$routeInfo->elevation}} m</td>
        </tr>
        <tr>
            <th scope="row">Est. Time</th>
            <td>{{$routeInfo->time}} hrs</td>
        </tr>
        @if($routeInfo->link)
            <tr>
                <th scope="row">Link</th>
                <td>
                    <a href="{{$routeInfo->link}}">{{$routeInfo->name}} on Strava</a>
                </td>
            </tr>
        @endif
        @if($routeInfo->notes)
            <tr>
                <td colspan="2">
                    <p><b>Notes:</b> {{$routeInfo->notes}}</p>
                </td>
            </tr>
        @endif
    </table>

    <a href="{{route('route.index')}}">
        <button class="btn btn-primary mb-4 mt-4">Back to Routes</button>
    </a>

@endsection