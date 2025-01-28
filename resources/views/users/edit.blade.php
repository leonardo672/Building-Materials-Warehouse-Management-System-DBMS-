@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit User</div>
  <div class="card-body">
      
      <form action="{{ url('users/' . $user->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $user->id }}" />
        
        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required><br>
        
        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required><br>
        
        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" class="form-control"><br>
        
        <label for="role">Role</label><br>
        <select name="role" id="role" class="form-control" required>
            <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
            <option value="manager" {{ $user->role == 'manager' ? 'selected' : '' }}>Manager</option>
            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        </select><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>
   
  </div>
</div>

@stop