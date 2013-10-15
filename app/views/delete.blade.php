@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Delete {{ $game->title }} <small>Are you sure?</small></h1>
    </div>
    <form action="{{ action('GamesController@handleDelete') }}" method="post" role="form">
        <input type="hidden" name="game" value="{{ $game->id }}">
        <input type="submit" value="Yes" class="btn btn-danger">
        <a href="{{ action('GamesController@index') }}" class="btn btn-default">Nope</a>
    </form>
@stop
