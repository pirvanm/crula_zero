@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  <div class="mb-2">
  <a href="{{ route('categories.create')}}" 
                class="btn btn-primary">Adauga o noua categorie</a>
  </div>
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  @if (count($categories))
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Created at</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($categories as $category)
          <tr>
              <td>{{$category->id}}</td>
              <td>{{$category->name}}</td>
              <td>{{$category->created_at}}</td>
              <td>
                <a href="{{ route('categories.edit', $category->id)}}" 
                class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('categories.destroy', $category->id)}}" method="post">
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
    <p>Hey, you have no category yet.</p>
  @endif
<div>
@endsection