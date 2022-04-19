@extends('layouts.main')

@section('title')
    myBikeRoute.com
@endsection
  
@section('content')


    <div class="img-gallery d-flex mt-4 mb-4 pb-4">
        <div class="col-gallery" id="left">
            <img src="/img/homepage.png" alt="Your Routes are Never Enough">
        </div>
        <div class="col-gallery" id="right">
            <div class="img-overlay" id="overlay-1">
                <img src="/img/1.jpeg" id="img-1" alt="Create on Bike">
                <div class="overlay-text" id="text-1">CREATE</div>
            </div>
            <div class="img-overlay" id="overlay-2">
                <img src="/img/2.jpg" alt="Browse on Bike">
                <div class="overlay-text">BROWSE</div>
            </div>
            <div class="img-overlay" id="overlay-3">
                <img src="/img/3.jpeg" alt="Explore on Bike">
                <div class="overlay-text">EXPLORE</div>
            </div>
            <div class="img-overlay" id="overlay-4">
                <img src="/img/4.jpg" alt="Ride on Bike">
                <div class="overlay-text">RIDE</div>
            </div>
        </div>
    </div>

    <script>
        document.querySelector('#overlay-1').onclick = function() {
            window.location.href = "{{route('route.create')}}";
        }
        document.querySelector('#overlay-2').onclick = function() {
            window.location.href = "{{route('route.index')}}";
        }
        document.querySelector('#overlay-3').onclick = function() {
            window.location.href = "{{route('community.index')}}";
        }
        document.querySelector('#overlay-4').onclick = function() {
            window.location.href = "{{route('profile.index')}}";
        }
    </script>

@endsection