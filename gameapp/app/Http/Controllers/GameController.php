<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Category;
use App\Http\Requests\GameRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $games = Game::paginate(20);
        return view('games.index')->with('games', $games);
        # return view('games.index', ['games' => $games]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cats = Category::all();
        return view('games.create') ->with('cats', $cats);
    }



    /**
     * Display the specified resource.
     */
    public function show(Game $Game)
    {
        return view('categories.show')->with('Game', $Game);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $Game)
    {
        //
        return view('categories.edit')->with('Game', $Game);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $Game)
    {
        //
        if ($request->hasFile('image')) {
            $photo = time() . '.' . $request->photo->extension();
            $request->photo->move(public_path('images'), $photo);
        } else {
            $photo = $request->originPhoto;
        }
        $Game->name = $request->name;
        $Game->manufacturer = $request->manufacturer;
        $Game->releasedate = $request->releasedate;
        $Game->description = $request->description;
        $Game->image = $photo;


        if ($Game->save()) {
            return redirect('categories')
                ->with('message', 'The Game: ' . $Game->name . ' was successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $Game)
    {
        if ($Game->delete()) {
            return redirect('categories')
                ->with('message', 'The Game: ' . $Game->fullname . ' was successfully deleted!');
        }
    }

    public function search(Request $request)
    {
        $games = Game::names($request->q)->paginate(20);
        return view('categories.search')->with('categories', $games);
    }
}
