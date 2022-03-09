@extends("layouts.main")

@section("title")
    Route: {{$routeInfo->name}}
@endsection

@section("content")

    <div class="row justify-content-center">
        <h5 class="col-md-10 bg-primary text-white p-2">By: {{$routeInfo->user->name}}</h5>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="mt-3">A little about the route</h4>
            <hr>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-10">
            <table class="table table-condensed mt-2">
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
        </div>
    </div>

    <div class="row justify-content-center mb-4 mt-4">
        <div class="col-sm-10">
            <a href="{{route('route.index')}}" role="button" class="btn btn-primary text-nowrap">
                Back to Routes
            </a>
            <a href="{{route('community.show', ['id' => $routeInfo->user->id])}}" role="button" class="btn btn-secondary text-nowrap">
                Go to {{$routeInfo->user->name}}
            </a>
        </div>
    </div>

@endsection