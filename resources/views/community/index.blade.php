@extends('layouts.main')

@section('title', 'Community')

@section('content')

    <div class="container">
        <div class="row g-3 justify-content-center mt-2">
            <div class="col-sm-10">
                <table class="table">
                    <tr>
                        <th>Cyclist</th>
                        <th>Email</th>
                        <th>Type</th>
                        <th>Routes</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td><a href="{{route('community.show', ['id' => $user->id])}}">{{$user->name}}</a></td>
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