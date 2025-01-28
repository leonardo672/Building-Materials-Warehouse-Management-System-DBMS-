@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Edit Supplier</div>
  <div class="card-body">
      
      <form action="{{ url('suppliers/' . $supplier->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $supplier->id }}" />

        <!-- Supplier Name -->
        <label for="name">Supplier Name</label><br>
        <input type="text" name="name" id="name" value="{{ $supplier->name }}" class="form-control" required><br>
        
        <!-- Contact Email -->
        <label for="contact_email">Contact Email</label><br>
        <input type="email" name="contact_email" id="contact_email" value="{{ $supplier->contact_email }}" class="form-control" required><br>

        <!-- Contact Phone -->
        <label for="contact_phone">Contact Phone</label><br>
        <input type="text" name="contact_phone" id="contact_phone" value="{{ $supplier->contact_phone }}" class="form-control" required><br>

        <!-- Address -->
        <label for="address">Address</label><br>
        <textarea name="address" id="address" class="form-control" required>{{ $supplier->address }}</textarea><br>

        <!-- Submit Button -->
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>
   
  </div>
</div>

@stop
