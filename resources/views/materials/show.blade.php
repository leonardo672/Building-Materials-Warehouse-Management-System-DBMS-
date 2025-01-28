@extends('layout')
@section('content')

<!-- Main Card to Display Material Details -->
<div class="card">
  <div class="card-header">Material Details</div>
  <div class="card-body">
    
    @isset($material)
        <!-- Display Material Name -->
        <h5 class="card-title">Material Name: {{ $material->name }}</h5>

        <!-- Display Material Description -->
        <p class="card-text">Description: {{ $material->description }}</p>

        <!-- Display Material Category -->
        <p class="card-text">Category: {{ $material->category->name }}</p>

        <!-- Display Material Stock Quantity -->
        <p class="card-text">Stock Quantity: {{ $material->stock_quantity }}</p>

        <!-- Display Material Stock Threshold -->
        <p class="card-text">Stock Threshold: {{ $material->stock_threshold }}</p>

        <!-- Display Material Price Per Unit -->
        <p class="card-text">Price Per Unit: ${{ number_format($material->price_per_unit, 2) }}</p>

        <!-- Display Material Location -->
        <p class="card-text">Location: {{ $material->location->name }}</p>
    @else
        <p class="card-text">Material not found.</p>
    @endisset
  </div>

  <!-- Print Button -->
    <div class="d-flex justify-content-start mt-3">
        <button class="btn print-btn" onclick="printTransactionDetails()" title="Print Transaction Details">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </button>
    </div>
</div>

<style>
    /* Print Button Style */
    .print-btn {
        padding: 6px 12px; 
        font-size: 12px; 
        border-radius: 5px; 
        background-color: #28a745;
        color: white;
        border: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        box-shadow: 0 3px 6px rgba(0, 0, 0, 0.1);
    }

    .print-btn:hover {
        background-color: #218838;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
    }

    /* Align the print button to the left */
    .d-flex {
        display: flex;
    }

    .justify-content-start {
        justify-content: flex-start;
    }
</style>

<!-- JavaScript Function for Print -->
<script>
function printMaterialDetails() {
    const content = document.querySelector('.card').outerHTML; // Select the card content
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = content; // Replace the body with the card content
    window.print(); // Trigger the print dialog
    document.body.innerHTML = originalContent; // Restore the original content
    location.reload(); // Reload the page to restore event listeners
}
</script>

@endsection
