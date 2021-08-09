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
                Add Category
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
                <form method="POST" action="{{ route('categories.store') }}">
                @csrf
                    <div class="form-group">   
                        <label for="name" class="form-label">Category Name:</label>
                        <input type="text" name="name" class="form-control"/>
                    </div>
                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection