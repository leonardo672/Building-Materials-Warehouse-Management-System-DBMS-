@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Create New User</div>
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

    <form action="{{ url('users') }}" method="post">
        {!! csrf_field() !!}

        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" class="form-control" required><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" class="form-control" required><br>

        <label for="role">Role</label><br>
        <select name="role" id="role" class="form-control" required>
            <option value="staff">Staff</option>
            <option value="manager">Manager</option>
            <option value="admin">Admin</option>
        </select><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
