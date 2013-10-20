<?php

class GamesController extends BaseController
{

    public function index()
    {
        // Show a listing of games.
        $games = Game::all();
        return View::make('index', compact('games'));
    }

    public function create()
    {
        // Show the create game form.
        return View::make('create');
    }

    public function handleCreate()
    {
        // Handle create form submission
        $rules = array(
            'title'     => 'required',
            'publisher' => 'required'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withInput()
                                   ->withErrors($validator);
        }

        Game::create(Input::all());
        return Redirect::action('GamesController@index');
    }

    public function edit(Game $game)
    {
        // Show the edit game form.
        return View::make('edit', compact('game'));
    }

    public function handleEdit()
    {
        // Handle edit form submission
        $rules = array(
            'title'     => 'required',
            'publisher' => 'required'
        );
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator);
        }

        $game = Game::findOrFail(Input::get('id'));
        $game->title     = Input::get('title');
        $game->publisher = Input::get('publisher');
        $game->complete  = Input::get('complete', 0);
        $game->save();

        return Redirect::action('GamesController@index');
    }

    public function delete(Game $game)
    {
        // Show delete confirmation page
        return View::make('delete', compact('game'));
    }

    public function handleDelete()
    {
        // Handle the delete confirmation
        $id = Input::get('game');
        $game = Game::findOrFail($id);
        $game->delete();

        return Redirect::action('GamesController@index');
    }
}
