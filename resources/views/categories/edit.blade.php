@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
    <h1>Category: {{ $category->name }}</h1>

    <div class="container">
      <div class="col-md-6 mx-auto">
          <div class="card uper">
              <div class="card-header">
                  Update Category
              </div>
              <div class="card-body">
                  @if ($errors->any())
                  <div class="alert alert-danger">
                      @foreach ($errors->all() as $error)
                          <p class="mb-0">{{ $error }}</p>
                      @endforeach
                  </div>
                  @endif
                  @if (session()->has('success'))
                      <div class="alert alert-success">
                          <p class="mb-0">{{ session('success') }}</p>
                      </div>
                  @endif
                  <form method="POST" action="{{ route('categories.edit', ['category' => $category->id]) }}">
                  {{ method_field('PUT') }}
                  @csrf
                      <div class="form-group">   
                          <label for="name" class="form-label">Category Name:</label>
                          <input type="text" name="name" value="{{ $category->name }}" class="form-control"/>
                      </div>
                      <div class="form-group mt-2">
                          <button type="submit" class="btn btn-primary">Update</button>
                      </div>
                  </form>
              </div>
          </div>
      </div>
  </div>
  <h1>Games list</h1>
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
        <div>
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
      <p>This category has no games yet.</p>
    @endif
<div>
@endsection