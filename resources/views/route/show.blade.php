@extends("layouts.main")

@section("title")
    Route: {{$routeInfo->name}}
@endsection

@section("content")

    <h5>By: {{$routeInfo->user->name}}</h5>

    <span class="border border-dark mt-3">Description: {{$routeInfo->notes}}</span>

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
        <tr>
            <th scope="row">Link</th>
            <td>
                <a href="{{$routeInfo->link}}">{{$routeInfo->name}} on Strava</a>
            </td>
        </tr>
    </table>

@endsection