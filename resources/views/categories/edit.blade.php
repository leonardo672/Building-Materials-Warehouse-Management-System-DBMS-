@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Edit Category</div>
  <div class="card-body">
      
      <!-- Form for editing a category -->
      <form action="{{ url('categories/' . $category->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $category->id }}" />

        <!-- Category Name -->
        <label for="name">Category Name</label><br>
        <input type="text" name="name" id="name" value="{{ $category->name }}" class="form-control" required><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>

  </div>
</div>

@stop
