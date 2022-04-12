@extends("layouts.main")

@section("title")
    Edit your Comment on {{$comment->route->name}}
@endsection

@section("content")

    <div class="row mt-3 justify-content-center">
        <div class="col-sm-10">
            <h4 class="mt-3">Tell us what's different with your comment</h4>
            <hr>
        </div>
    </div>

    <form method="POST" action="{{route('comment.update', ['id' => $comment->id])}}" class="mt-2">
        @csrf
            <div class="row mb-3 justify-content-center">
                <div class="col-md-10">
                    <label for="comment" class="mb-2">Comment</label>
                    <textarea class="form-control" id="comment" name="comment">{{old('comment', $comment->comment)}}</textarea>
                    @error("comment")
                        <small class="text-danger">{{$message}}</small>
                    @enderror
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-10">
                    <button class="btn btn-primary" type="submit">Edit</button>
                    <input type="reset" class="btn btn-secondary" value="Reset"></button>
                </div>
            </div>
    </form>

@endsection