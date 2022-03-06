@extends('layouts.main')

@section('title', 'Profile')
  
@section('content')

<h4 class="mt-3">{{$user->name}}</h4>
<p>{{$user->email}}</p>

@endsection