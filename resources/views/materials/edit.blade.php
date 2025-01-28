@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Edit Material</div>
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

    <form action="{{ url('materials/' . $material->id) }}" method="post">
        @csrf
        @method('PATCH')

        <!-- Material ID (hidden) -->
        <input type="hidden" name="id" id="id" value="{{ $material->id }}" />

        <!-- Material Name Input -->
        <label for="name">Material Name</label><br>
        <input type="text" name="name" id="name" value="{{ old('name', $material->name) }}" class="form-control" required><br>

        <!-- Description Input -->
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control">{{ old('description', $material->description) }}</textarea><br>

        <!-- Category Dropdown -->
        <label for="category_id">Category</label><br>
        <select name="category_id" id="category_id" class="form-control" required>
          <option value="">Select Category</option>
          @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $category->id == old('category_id', $material->category_id) ? 'selected' : '' }}>
              {{ $category->name }}
            </option>
          @endforeach
        </select><br>

        <!-- Stock Quantity Input -->
        <label for="stock_quantity">Stock Quantity</label><br>
        <input type="number" name="stock_quantity" id="stock_quantity" value="{{ old('stock_quantity', $material->stock_quantity) }}" class="form-control" min="0" required><br>

        <!-- Stock Threshold Input -->
        <label for="stock_threshold">Stock Threshold</label><br>
        <input type="number" name="stock_threshold" id="stock_threshold" value="{{ old('stock_threshold', $material->stock_threshold) }}" class="form-control" min="1" required><br>

        <!-- Price Per Unit Input -->
        <label for="price_per_unit">Price Per Unit</label><br>
        <input type="number" name="price_per_unit" id="price_per_unit" value="{{ old('price_per_unit', $material->price_per_unit) }}" class="form-control" step="0.01" required><br>

        <!-- Location Dropdown -->
        <label for="location_id">Location</label><br>
        <select name="location_id" id="location_id" class="form-control" required>
          <option value="">Select Location</option>
          @foreach($locations as $location)
            <option value="{{ $location->id }}" {{ $location->id == old('location_id', $material->location_id) ? 'selected' : '' }}>
              {{ $location->name }}
            </option>
          @endforeach
        </select><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
