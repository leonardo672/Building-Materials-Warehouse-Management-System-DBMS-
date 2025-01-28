@extends('layout')
@section('content')

<div class="card">
  <div class="card-header">Edit Order</div>
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
      
      <form action="{{ url('orders/' . $order->id) }}" method="post">
        {!! csrf_field() !!}
        @method("PATCH")
        <input type="hidden" name="id" id="id" value="{{ $order->id }}" />
        
        <!-- Order Type -->
        <label for="order_type">Order Type</label><br>
        <select name="order_type" id="order_type" class="form-control" required>
            <option value="purchase" {{ $order->order_type == 'purchase' ? 'selected' : '' }}>Purchase</option>
            <option value="sales" {{ $order->order_type == 'sales' ? 'selected' : '' }}>Sales</option>
        </select><br>
        
        <!-- Material Selection -->
        <label for="material_id">Material</label><br>
        <select name="material_id" id="material_id" class="form-control" required>
            @foreach ($materials as $material)
                <option value="{{ $material->id }}" {{ $order->material_id == $material->id ? 'selected' : '' }}>
                    {{ $material->name }}
                </option>
            @endforeach
        </select><br>

        <!-- Quantity -->
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" value="{{ $order->quantity }}" class="form-control" required min="1"><br>

        <!-- Total Price -->
        <label for="total_price">Total Price</label><br>
        <input type="number" name="total_price" id="total_price" value="{{ $order->total_price }}" class="form-control" required step="0.01" min="0"><br>

        <!-- Status -->
        <label for="status">Status</label><br>
        <select name="status" id="status" class="form-control" required>
            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
            <option value="canceled" {{ $order->status == 'canceled' ? 'selected' : '' }}>Canceled</option>
        </select><br>

        <!-- Submit Button -->
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>
   
  </div>
</div>

@stop
