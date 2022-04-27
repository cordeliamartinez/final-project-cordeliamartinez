@extends("layouts.main")

@section("title", "Routes")

@section("content")

    <div class="container mb-3">
        <div class="row g-3 justify-content-center">
            <div class="col-sm-12">
                <table class="table">
                    <tr>
                        <th> </th>
                        <th>Name</th>
                        <th>Distance</th>
                        <th>Elevation</th>
                        <th>Type</th>
                        <th>Difficulty</th>
                    </tr>

                    @foreach($routes as $route)
                        <tr>
                            @if(!Auth::user())
                                <td>
                                    <button type="button" class="btn  btn-sm btn-outline-secondary" disabled>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                        </svg>
                                    </button> 
                                </td>
                            @else
                                @can('can-favorite', $route)
                                    <td>
                                        <form method="POST" action="{{route('favorite.store')}}">
                                            @csrf
                                            <input type="hidden" name="routeid" value="{{$route->id}}"></input>
                                            <input type="hidden" name="routename" value="{{$route->name}}"></input>
                                            <button type="submit" class="btn  btn-sm btn-outline-fuxia">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-plus" viewBox="0 0 16 16">
                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                                    <path d="M8 4a.5.5 0 0 1 .5.5V6H10a.5.5 0 0 1 0 1H8.5v1.5a.5.5 0 0 1-1 0V7H6a.5.5 0 0 1 0-1h1.5V4.5A.5.5 0 0 1 8 4z"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </td>
                                @else
                                    <td>
                                        <button type="button" class="btn  btn-sm btn-outline-secondary" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-check" viewBox="0 0 16 16">
                                                <path fill-rule="evenodd" d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                                                <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                            </svg>
                                        </button> 
                                    </td>
                                @endcan
                            @endif
                            <td>
                                <a href="{{route('route.show', ['id' => $route->id])}}" class="text-dark link-icon">
                                    {{$route->name}}  
                                    <span class="hover-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </span>
                                </a>
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