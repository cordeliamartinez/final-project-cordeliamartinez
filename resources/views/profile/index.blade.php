@extends('layouts.main')

@section('title')
    {{$user->name}}'s Profile
@endsection
  
@section('content')

    <div class="row justify-content-center">
        <div class="col-sm-11">
            <div class="card mt-4">
                <div class="card-header">
                    Your Info
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h4>
                    <div class="card-text">
                        <ul>
                            <li>Type: {{$user->type->type}} Cyclist</li>
                            <li>Routes: {{$routecount}}</li>
                            <li>Email: <a href = "mailto: {{$user->email}}">{{$user->email}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-center mt-5 mb-3">
        <hr class="col-sm-11">
    </div>

    @if($favcount > 0)
        <div class="row g-3 justify-content-center">
            <div class="col-sm-11">
                <h4 class="bg-fuxia text-white p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                    </svg>
                    Your Favorite Routes</h4>
                <table class="table table-condensed mt-2">
                    <tr>
                        <th>Name</th>
                        <th>Author</th>
                        <th>Date Added</th>
                        <th class="text-center">Remove</th>
                    </tr>
                    @foreach($user->favorite->sortByDesc('created_at') as $favorite)
                        <tr>
                            <td>
                                <a href="{{route('route.show', ['id' => $favorite->route->id])}}" class="text-dark link-icon">
                                    {{$favorite->route->name}}  
                                    <span class="hover-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                                        </svg>
                                    </span>
                                </a>
                            </td>
                            <td>{{$favorite->route->user->name}}</td>
                            <td>{{date_format($favorite->created_at, 'n/j/Y')}} at {{date_format($favorite->created_at, 'g:i A')}}</td>
                            @can('delete', $favorite)
                                <td class="text-center">
                                    <form method="POST" action="{{route('favorite.destroy', ['id' => $favorite->id])}}">
                                        @csrf
                                            <button class="btn btn-sm btn-delete" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-x" viewBox="0 0 16 16">
                                                    <path fill-rule="evenodd" d="M6.146 5.146a.5.5 0 0 1 .708 0L8 6.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 7l1.147 1.146a.5.5 0 0 1-.708.708L8 7.707 6.854 8.854a.5.5 0 1 1-.708-.708L7.293 7 6.146 5.854a.5.5 0 0 1 0-.708z"/>
                                                    <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
                                                </svg>
                                            </button>
                                    </form>
                                </td>
                            @endcan
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-11">
                <a href="{{route('route.index')}}" role="button" class="btn btn-primary mt-4 mb-4 text-nowrap">
                    View Routes
                </a>
            </div>
        </div>

    @else
        <div class="row justify-content-center">
            <div class="col-sm-11">
                <h4 class="bg-fuxia text-white p-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
                        <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
                        <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
                    </svg>
                    Your Favorite Routes</h4>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-sm-10">
                <h5 class="text-uppercase fst-italic text-primary">Sorry,</h5>
                <p class="text-uppercase fst-italic text-primary">it seems like you don't have any favorites to show.</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mt-5 mb-3">
        <hr class="col-sm-11">
    </div>

    @if($routecount > 0)
    <div class="row g-3 justify-content-center">
        <div class="col-sm-11">
            <h4 class="bg-fuxia text-white p-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
              </svg> Your Created Routes</h4>
            <table class="table table-condensed mt-2">
                <tr>
                    <th>Name</th>
                    <th>Distance</th>
                    <th>Elevation</th>
                    <th>Type</th>
                    <th>Difficulty</th>
                    <th class="text-center">Edit</th>
                    <th class="text-center">Delete</th>
                </tr>
                @foreach($user->route->sortBy('difficulty_id') as $route)
                    <tr>
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
                        @can('update', $route)
                            <td class="text-center">
                                <a href="{{route('route.edit', ['id' => $route->id])}}" class="btn btn-sm btn-edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                    <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                                    <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                                  </svg></a>
                            </td>      
                        @endcan
                        @can('delete', $route)
                            <td class="text-center">
                                <a href="{{route('route.delete', ['id' => $route->id])}}" class="btn btn-sm btn-delete"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                  </svg></a>
                            </td>
                        @endcan
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    @else
        <div class="row g-3 justify-content-center">
            <div class="col-sm-11">
                <h4 class="bg-fuxia text-white p-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-arrow-up" viewBox="0 0 16 16">
                    <path d="M8.5 11.5a.5.5 0 0 1-1 0V7.707L6.354 8.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0l2 2a.5.5 0 0 1-.708.708L8.5 7.707V11.5z"/>
                    <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2zM9.5 3A1.5 1.5 0 0 0 11 4.5h2V14a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h5.5v2z"/>
                </svg> Your Created Routes</h4>
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-sm-10">
                <h5 class="text-uppercase fst-italic text-primary">Sorry,</h5>
                <p class="text-uppercase fst-italic text-primary">it seems like you don't have any routes to show.</p>
            </div>
        </div>
    @endif

    <div class="row justify-content-center mb-4">
        <div class="col-sm-11">
            <a href="{{route('route.create')}}" role="button" class="btn btn-primary mt-4 mb-4 text-nowrap">
                Create a Route
            </a>
        </div>
    </div>

@endsection