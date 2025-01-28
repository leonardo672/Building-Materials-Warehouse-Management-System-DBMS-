@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Create New Transaction</div>
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

    <!-- Form to create a new transaction -->
    <form action="{{ url('transactions') }}" method="post">
        @csrf  <!-- Laravel's CSRF token -->

        <!-- Material Dropdown -->
        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                <option value="">Select Material</option>
                @foreach ($materials as $material)
                    <option value="{{ $material->id }}">{{ $material->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Transaction Type Dropdown -->
        <div class="form-group">
            <label for="type">Transaction Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="add">Add</option>
                <option value="deduct">Deduct</option>
            </select>
        </div>

        <!-- Quantity Input -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1" value="{{ old('quantity') }}">
        </div>

        <!-- Performed By Dropdown -->
        <div class="form-group">
            <label for="performed_by">Performed By</label>
            <select name="performed_by" id="performed_by" class="form-control" required>
                <option value="">Select User</option>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>

  </div>
</div>

@endsection
