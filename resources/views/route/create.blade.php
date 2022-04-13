@extends("layouts.main")

@section("title", "New Route")

@section("content")

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-12">
            <h4 class="mt-3">Tell us about your route</h4>
            <hr>
        </div>
    </div>


    <form method="POST" action="{{route('route.store')}}" class="mt-2">
        @csrf
            <div class="row mb-3 justify-content-center">
                <div class="col-md-6">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="name" name="name" value="{{old('name')}}">
                    @error("name")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="difficulty">Difficulty <span class="text-danger">*</span></label>
                    <select name="difficulty" id="difficulty" class="form-select">
                        <option value="">-- Select Difficulty --</option>
                        @foreach($difficulties as $difficulty)
                            <option value="{{$difficulty->id}}" {{(string) $difficulty->id === old('difficulty') ? "selected": ""}}>{{$difficulty->difficulty}}</option>
                        @endforeach
                    </select>
                    @error("difficulty")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-md-5">
                    <label for="start ">Start Location <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="start" name="start" value="{{old('start')}}">
                    @error("start")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="end ">End Location <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="end" name="end" value="{{old('end')}}">
                    @error("end")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-md-5">
                    <label for="type ">Type <span class="text-danger">*</span></label>
                    <select name="type" id="type" class="form-select">
                        <option value="">-- Select Type --</option>
                        @foreach($types as $type)
                            <option value="{{$type->id}}" {{(string) $type->id === old('type') ? "selected": ""}}>{{$type->type}}</option>
                        @endforeach
                    </select>
                    @error("type")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-5">
                    <label for="terrain">Terrain <span class="text-danger">*</span></label>
                    <select name="terrain" id="terrain" class="form-select">
                        <option value="">-- Select Terrain --</option>
                        @foreach($terrains as $terrain)
                            <option value="{{$terrain->id}}" {{(string) $terrain->id === old('terrain') ? "selected": ""}}>{{$terrain->terrain}}</option>
                        @endforeach
                    </select>
                    @error("terrain")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-md-3">
                    <label for="distance">Distance (km) <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="distance" name="distance" value="{{old('distance')}}">
                    @error("distance")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-3">
                    <label for="distance">Elevation (m) <span class="text-danger">*</span></label>
                    <input class="form-control" type="number" id="elevation" name="elevation" value="{{old('elevation')}}">
                    @error("elevation")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="col-md-4">
                    <label for="time">Time <span class="text-danger">*</span></label>
                    <input class="form-control" type="text" id="time" name="time" value="{{old('time')}}">
                    @error("time")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            
            <div class="row mb-3 justify-content-center">
                <div class="col-md-10">
                    <label for="notes">Notes</label>
                    <textarea class="form-control" id="notes" name="notes">{{old('notes')}}</textarea>
                    @error("notes")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <div class="col-md-10">
                    <label for="link">Link</label>
                    <input class="form-control" type="url" id="link" name="link" value="{{old('link')}}">
                    @error("link")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>

            <div class="row justify-content-center mb-4">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary mb-4">Save</button>
                    <input type="reset" class="btn btn-secondary mb-4" value="Reset"></button>
                </div>
            </div>
    </form> 

@endsection