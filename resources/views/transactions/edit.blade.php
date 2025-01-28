@extends('layout')

@section('content')

<div class="card">
  <div class="card-header">Edit Transaction</div>
  <div class="card-body">
      
      <!-- Form to edit an existing transaction -->
      <form action="{{ url('transactions/' . $transaction->id) }}" method="post">
        @csrf
        @method('PATCH') <!-- Laravel method spoofing to use PATCH for updates -->

        <input type="hidden" name="id" id="id" value="{{ $transaction->id }}" />

        <!-- Material Selection -->
        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                @foreach ($materials as $material)
                    <option value="{{ $material->id }}" {{ $material->id == $transaction->material_id ? 'selected' : '' }}>
                        {{ $material->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Transaction Type -->
        <div class="form-group">
            <label for="type">Transaction Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="add" {{ $transaction->type == 'add' ? 'selected' : '' }}>Add</option>
                <option value="deduct" {{ $transaction->type == 'deduct' ? 'selected' : '' }}>Deduct</option>
            </select>
        </div>

        <!-- Quantity -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ $transaction->quantity }}" min="1">
        </div>

        <!-- Performed By (User) -->
        <div class="form-group">
            <label for="performed_by">Performed By</label>
            <select name="performed_by" id="performed_by" class="form-control" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $transaction->performed_by ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update</button>
      </form>
   
  </div>
</div>

@endsection
