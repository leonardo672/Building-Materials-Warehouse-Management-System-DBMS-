@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Create New Location</div>
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

    <form action="{{ route('locations.store') }}" method="post">
        {!! csrf_field() !!}

        <label for="name">Location Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control"></textarea><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
