@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Edit Location</div>
  <div class="card-body">
      
      <form action="{{ url('locations/' . $location->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $location->id }}" />

        <label for="name">Location Name</label><br>
        <input type="text" name="name" id="name" value="{{ $location->name }}" class="form-control" required><br>
        
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control">{{ $location->description }}</textarea><br>
        
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>

  </div>
</div>

@stop
