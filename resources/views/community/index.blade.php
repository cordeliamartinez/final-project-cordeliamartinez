@extends('layouts.main')

@section('title', 'Community')

@section('content')

    <div class="container">
        <div class="row g-3 justify-content-center mt-2 mb-4">
            <div class="col-sm-11">
                <table class="table mb-4">
                    <tr>
                        <th>Cyclist</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Routes</th>
                    </tr>
                    @foreach($users->sortBy('name') as $user)
                        <tr>
                            <td>
                                <a href="{{route('community.show', ['id' => $user->id])}}" class="text-dark link-icon">
                                    {{$user->name}}  
                                    <span class="hover-icon">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                                        </svg>
                                    </span>
                                </a>
                            </td>
                            <td><a href = "mailto: {{$user->email}}">{{$user->email}}</a></td>
                            <td>{{$user->type->type}}</td>
                            <td>{{$user->route->count()}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

@endsection