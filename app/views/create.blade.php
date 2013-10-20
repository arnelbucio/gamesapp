@extends('layout')

@section('content')
    <div class="page-header">
        <h1>Create Game <small>and someday finish it!</small></h1>
    </div>

    @include('_errors')

    <form action="{{ action('GamesController@handleCreate') }}" method="post" id="new_game" role="form">
        <input type="hidden" name="complete" value='0'>
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="{{ Input::old('title') }}">
        </div>
        <div class="form-group">
            <label for="publisher">Publisher</label>
            <input type="text" class="form-control" name="publisher" id="publisher" value="{{ Input::old('publisher') }}">
        </div>
        <div class="checkbox">
            <label for="complete">
                <input type="checkbox" name="complete" id="complete" value='1'>Completed?
            </label>
        </div>
        <input type="submit" value="Create" class="btn btn-primary">
        <a href="{{ action('GamesController@index') }}" class="btn btn-link">Cancel</a>
    </form>
@stop
