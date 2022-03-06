@extends("layouts.main")

@section("title")
    Edit Route: {{$route->name}}
@endsection

@section("content")

    <form method="POST" action="{{route('route.update', ['id' => $route->id])}}" class="mt-5">
        @csrf
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-9">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="name" name="name" value="{{old('name', $route->name)}}">
                        @error("name")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-3">
                        <label for="difficulty">Difficulty <span class="text-danger">*</span></label>
                        <select name="difficulty" id="difficulty" class="form-select">
                            <option value="">-- Select Difficulty --</option>
                            @foreach($difficulties as $difficulty)
                                <option value="{{$difficulty->id}}" {{(string) $difficulty->id === (string)old('difficulty', $route->difficulty_id) ? "selected": ""}}>{{$difficulty->difficulty}}</option>
                            @endforeach
                        </select>
                        @error("difficulty")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="start ">Start Location <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="start" name="start" value="{{old('start', $route->start)}}"">
                        @error("start")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="end ">End Location <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="end" name="end" value="{{old('end', $route->finish)}}"">
                        @error("end")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="type ">Type <span class="text-danger">*</span></label>
                        <select name="type" id="type" class="form-select">
                            <option value="">-- Select Type --</option>
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{(string) $type->id === (string) old('type', $route->type_id) ? "selected": ""}}>{{$type->type}}</option>
                            @endforeach
                        </select>
                        @error("type")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="terrain">Terrain <span class="text-danger">*</span></label>
                        <select name="terrain" id="terrain" class="form-select">
                            <option value="">-- Select Terrain --</option>
                            @foreach($terrains as $terrain)
                                <option value="{{$terrain->id}}" {{(string) $terrain->id === (string) old('terrain', $route->terrain_id) ? "selected": ""}}>{{$terrain->terrain}}</option>
                            @endforeach
                        </select>
                        @error("terrain")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="distance">Distance (km) <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" id="distance" name="distance" value="{{old('distance', $route->distance)}}"">
                        @error("distance")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="distance">Elevation (m) <span class="text-danger">*</span></label>
                        <input class="form-control" type="number" id="elevation" name="elevation" value="{{old('elevation', $route->elevation)}}">
                        @error("elevation")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="col-md-4">
                        <label for="time">Time <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" id="time" name="time" value="{{old('time', $route->time)}}">
                        @error("time")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>
            
            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="notes">Notes</label>
                        <textarea class="form-control" id="notes" name="notes">{{old('notes', $route->notes)}}</textarea>
                        @error("notes")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label for="link">Link</label>
                        <input class="form-control" type="url" id="link" name="link" value="{{old('link', $route->link)}}">
                        @error("link")
                            <small class="text-danger">{{$message}}</small>
                        @enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary mb-4">Save</button>
            <input type="reset" class="btn btn-secondary mb-4" value="Reset"></button>
    </form>

@endsection