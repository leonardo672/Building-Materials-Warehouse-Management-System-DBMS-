@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Create New Material</div>
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

    <form action="{{ url('materials') }}" method="post">
        @csrf

        <!-- Material Name -->
        <label for="name">Material Name</label><br>
        <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required><br>

        <!-- Description -->
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control">{{ old('description') }}</textarea><br>

        <!-- Category -->
        <label for="category_id">Category</label><br>
        <select name="category_id" id="category_id" class="form-control" required>
          <option value="">Select Category</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select><br>

        <!-- Stock Quantity -->
        <label for="stock_quantity">Stock Quantity</label><br>
        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" 
               value="{{ old('stock_quantity', 0) }}" min="0" required><br>

        <!-- Stock Threshold -->
        <label for="stock_threshold">Stock Threshold</label><br>
        <input type="number" name="stock_threshold" id="stock_threshold" class="form-control" 
               value="{{ old('stock_threshold', 10) }}" min="1" required><br>

        <!-- Price Per Unit -->
        <label for="price_per_unit">Price Per Unit</label><br>
        <input type="number" name="price_per_unit" id="price_per_unit" class="form-control" 
               value="{{ old('price_per_unit', 0.00) }}" step="0.01" required><br>

        <!-- Location -->
        <label for="location_id">Location</label><br>
        <select name="location_id" id="location_id" class="form-control" required>
          <option value="">Select Location</option>
          @foreach($locations as $location)
            <option value="{{ $location->id }}" {{ old('location_id') == $location->id ? 'selected' : '' }}>
              {{ $location->name }}
            </option>
          @endforeach
        </select><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
