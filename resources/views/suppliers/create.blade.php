@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Create New Supplier</div>
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

    <form action="{{ url('suppliers') }}" method="post">
        {!! csrf_field() !!}

        <!-- Supplier Name -->
        <label for="name">Supplier Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <!-- Contact Email -->
        <label for="contact_email">Contact Email</label><br>
        <input type="email" name="contact_email" id="contact_email" class="form-control" required><br>

        <!-- Contact Phone -->
        <label for="contact_phone">Contact Phone</label><br>
        <input type="text" name="contact_phone" id="contact_phone" class="form-control" required><br>

        <!-- Address -->
        <label for="address">Address</label><br>
        <textarea name="address" id="address" class="form-control" required></textarea><br>

        <!-- Submit Button -->
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
