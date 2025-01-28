@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Create New Category</div>
  <div class="card-body">

    <!-- Display validation errors -->
    @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
    @endif

    <!-- Category creation form -->
    <form action="{{ route('categories.store') }}" method="post">
        {!! csrf_field() !!}

        <!-- Category Name -->
        <label for="name">Category Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
