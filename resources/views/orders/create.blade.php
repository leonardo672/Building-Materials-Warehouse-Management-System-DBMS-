@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Create New Order</div>
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

    <form action="{{ url('orders') }}" method="post">
        {!! csrf_field() !!}

        <!-- Order Type -->
        <label for="order_type">Order Type</label><br>
        <select name="order_type" id="order_type" class="form-control" required>
            <option value="purchase">Purchase</option>
            <option value="sales">Sales</option>
        </select><br>

        <!-- Material Selection -->
        <label for="material_id">Material</label><br>
        <select name="material_id" id="material_id" class="form-control" required>
            @foreach ($materials as $material)
                <option value="{{ $material->id }}">{{ $material->name }}</option>
            @endforeach
        </select><br>

        <!-- Quantity -->
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" class="form-control" required min="1"><br>

        <!-- Total Price -->
        <label for="total_price">Total Price</label><br>
        <input type="number" name="total_price" id="total_price" class="form-control" required step="0.01" min="0"><br>

        <!-- Status -->
        <label for="status">Status</label><br>
        <select name="status" id="status" class="form-control" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="canceled">Canceled</option>
        </select><br>

        <!-- Submit Button -->
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

@stop
