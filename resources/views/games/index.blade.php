@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="mb-2">
    <div>
    <form action="{{ route('search') }}" method="GET">
    <input type="text" name="search" required/>
    <button type="submit btn-info">Search</button>
</form>
</div>
  <a href="{{ route('games.create')}}" 
                class="btn btn-primary">Creaza Joc</a>
  </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if (count($games))
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Game Name</td>
            <td>Game Price</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($games as $game)
          <tr>
              <td>{{$game->id}}</td>
              <td>{{$game->name}}</td>
              <td>{{$game->price}}</td>
              <td>
                <a href="{{ route('games.edit', $game->id)}}" 
                class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('games.destroy', $game->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  @else
    <p>Hey, you have no games yet.</p>
  @endif
<div>
@endsection