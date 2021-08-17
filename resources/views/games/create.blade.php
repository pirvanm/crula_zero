@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="container">
  <div class="col-md-6 mx-auto">
    <div class="card uper">
      <div class="card-header">
        Add Games Data
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
          <form method="post" action="{{ route('games.store') }}"  enctype="multipart/form-data">
              <div class="form-group">
                  @csrf
                  <label for="name" class="form-label">Game Name:</label>
                  <input type="text" class="form-control" name="name"/>
              </div>
              <div class="form-group">
                  <label for="price"  class="form-label">Price</label>
                  <input type="text" class="form-control" name="price"/>
              </div>
              <div class="form-group">
                    <label for="price" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
              <div class="form-group">
                <label for="category"  class="form-label">Category</label>
                  <select name="category" class="form-control">
                    @foreach ($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
              </div>
             <div class="form-group mt-4">
             <button type="submit" class="btn btn-primary">Add Game</button>
             </div>
          </form>
      </div>
    </div>
  </div>
</div>
@endsection