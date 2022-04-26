<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Route;
use App\Models\Type;
use App\Models\Difficulty;
use App\Models\Terrain;
use App\Models\User;
use App\Models\Comment;
use App\Models\Favorite;
use Auth;


class RouteController extends Controller
{
    public function index() {
        // $routes = Route::with(['type', 'difficulty', 'terrain', 'user'])->orderBy('difficulty_id')->get();
        $routes = Route::with(['type', 'difficulty', 'terrain'])->get()->sortBy('difficulty_id');

        return view('route.index', [
            'routes' => $routes,
        ]);
    }

    public function show($id) {
        $routeInfo = Route::find($id);

        $comments = Comment::where('route_id', '=', $id)->get()->sortByDesc('created_at');

        return view('route.show', [
            'routeInfo' => $routeInfo,
            'comments' => $comments,
        ]);
    }

    public function create() {
        $routes = Route::all();
        $terrains = Terrain::all();
        $types = Type::all();
        $difficulties = Difficulty::all();

        return view('route.create', [
            'routes' => $routes,
            'terrains' => $terrains,
            'types' => $types,
            'difficulties' => $difficulties,
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'difficulty' => 'required|exists:difficulties,id',
            'start' => 'required|max:50',
            'end' => 'required|max:50',
            'type' => 'required|exists:types,id',
            'terrain' => 'required|exists:terrains,id',
            'distance' => 'required|numeric|min:0',
            'elevation' => 'required|integer|min:0',
            'time' => 'required|date_format:H:i:s',
            'notes' => 'nullable|max:200',
            'link' => 'nullable|url',
        ]);

        $route = new Route();
        $user = Auth::user();

        $route->user_id = $user->id;
        $route->name = $request->input('name');
        $route->difficulty_id = $request->input('difficulty');
        $route->start = $request->input('start');
        $route->finish = $request->input('end');
        $route->type_id = $request->input('type');
        $route->terrain_id = $request->input('terrain');
        $route->distance = $request->input('distance');
        $route->elevation = $request->input('elevation');
        $route->time = $request->input('time');
        $route->notes = $request->input('notes');
        $route->link = $request->input('link');

        $route->save();

        return redirect()
            ->route('profile.index')
            ->with('success', "Successfully created your new route {$request->input('name')}");
    }

    public function edit($id) {
        $route = Route::all()->find($id);
        $terrains = Terrain::all();
        $types = Type::all();
        $difficulties = Difficulty::all();

        $this->authorize('update', $route);

        return view('route.edit', [
            'route' => $route,
            'terrains' => $terrains,
            'types' => $types,
            'difficulties' => $difficulties,
        ]);
    }

    public function update($id, Request $request) {
        $request->validate([
            'name' => 'required|max:50',
            'difficulty' => 'required|exists:difficulties,id',
            'start' => 'required|max:50',
            'end' => 'required|max:50',
            'type' => 'required|exists:types,id',
            'terrain' => 'required|exists:terrains,id',
            'distance' => 'required|numeric|min:0',
            'elevation' => 'required|integer|min:0',
            'time' => 'required|date_format:H:i:s',
            'notes' => 'nullable|max:200',
            'link' => 'nullable|url',
        ]);

        $route = Route::all()->find($id);

        $route->name = $request->input('name');
        $route->difficulty_id = $request->input('difficulty');
        $route->start = $request->input('start');
        $route->finish = $request->input('end');
        $route->type_id = $request->input('type');
        $route->terrain_id = $request->input('terrain');
        $route->distance = $request->input('distance');
        $route->elevation = $request->input('elevation');
        $route->time = $request->input('time');
        $route->notes = $request->input('notes');
        $route->link = $request->input('link');

        $route->save();

        return redirect()
            ->route('profile.index')
            ->with('success', "Successfully updated your route {$request->input('name')}");
    }

    public function delete($id) {
        $route = Route::all()->find($id);

        $this->authorize('delete', $route);

        return view('route.delete', [
            'route' => $route,
        ]);
    }

    public function destroy($id) {
        $route = Route::all()->find($id);
        $routeName = $route->name;

        $this->authorize('delete', $route);

        $route->delete();

        return redirect()
            ->route('profile.index')
            ->with('success', "Successfully deleted your route {$routeName}");
    }
}
