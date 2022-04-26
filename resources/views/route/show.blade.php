@extends("layouts.main")

@section("title")
    Route: {{$routeInfo->name}}
@endsection

@section("content")

    <div class="row justify-content-center">
        <h5 class="col-md-12 bg-fuxia text-white p-2 mt-n1">By: {{$routeInfo->user->name}}</h5>
    </div>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-12">
            <h4 class="mt-3">A little about the route</h4>
            <hr>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-sm-11">
            <table class="table table-condensed mt-2 justify-content-center">
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
                        <th scope="row"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-strava" viewBox="0 0 16 16">
                            <path d="M6.731 0 2 9.125h2.788L6.73 5.497l1.93 3.628h2.766L6.731 0zm4.694 9.125-1.372 2.756L8.66 9.125H6.547L10.053 16l3.484-6.875h-2.112z"/>
                          </svg> Link</th>
                        <td>
                            <a href="{{$routeInfo->link}}" target="_blank">{{$routeInfo->name}}</a>
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

    <hr>

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-12">
            <h4 class="mt-3">Comments</h4>
            <hr>
        </div>
    </div>

    @if(Auth::check())
        <form method="POST" action="{{route('comment.store')}}">
                @csrf
                <div class="mb-3">
                    <div class="row justify-content-center">
                        <div class="col-sm-11">
                            <input type="hidden" id="route" name="route" value="{{$routeInfo->id}}">
                            <textarea class="form-control" id="comment" name="comment" placeholder="What is your comment?">{{old('comment')}}</textarea>
                            @error("comment")
                                <small class="text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row g-3 justify-content-center">
                    <div class="col-sm-11">
                        <button type="submit" class="btn btn-primary mb-4">Comment</button>
                    </div>
                </div>
        </form>
    @else
        <div class="row justify-content-center mb-3">
            <div class="col-sm-11">
                <p class="text-uppercase fst-italic text-primary">Log in to leave a comment.</p>
            </div>
        </div>
    @endif

    @if(count($comments) > 0)
        @foreach($comments as $comment)
            <div class="row mt-3 justify-content-center">
                <div class="col-sm-11">
                    <h4 class="bg-fuxia text-white p-2">"{{$comment->comment}}"</h4>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <p class="ml-4">By: {{$comment->user->name}}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <p class="small fst-italic">Posted on {{date_format($comment->created_at, 'n/j/Y')}} at {{date_format($comment->created_at, 'g:i A')}}</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-11">
                    <div class="d-flex flex-row flex-wrap">
                        @can('update', $comment)
                            <a class="btn btn-sm btn-edit" href="{{route('comment.edit', ['id' => $comment->id])}}" role="button">Edit</a>
                        @endcan
                        @can('delete', $comment)
                            <form method="POST" action="{{route('comment.destroy', ['id' => $comment->id, 'routeID' => $routeInfo->id])}}">
                                @csrf
                                    <button class="btn btn-sm btn-delete" type="submit">Delete</button>
                            </form>
                        @endcan
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="row justify-content-center mb-3">
            <div class="col-sm-11">
                <p class="text-uppercase fst-italic text-primary">No comments yet! Be the first to comment by using the form above.</p>
            </div>
        </div>
    @endif


    <div class="row justify-content-center mt-4 mb-4">
        <div class="col-sm-11 mb-4">
            <hr>
            <a href="{{route('route.index')}}" role="button" class="btn btn-primary text-nowrap">
                Back to Routes
            </a>
            <a href="{{route('community.show', ['id' => $routeInfo->user->id])}}" role="button" class="btn btn-secondary text-nowrap">
                Go to {{$routeInfo->user->name}}
            </a>
        </div>
    </div>

@endsection