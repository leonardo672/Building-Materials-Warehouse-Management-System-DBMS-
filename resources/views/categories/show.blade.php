@extends('layout')

@section('content')

<!-- Main Card to Display Category Details -->
<div class="card">
  <div class="card-header">Category Details</div>
  <div class="card-body">
    <div class="card-body">
        <!-- Display Category Name -->
        <h5 class="card-title">Category Name: {{ $category->name }}</h5>
    </div>

    <!-- Print Button -->
    <div class="d-flex justify-content-start mt-3">
        <button class="btn print-btn" onclick="printTransactionDetails()" title="Print Transaction Details">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </button>
    </div>
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
function printCategoryDetails() {
    const content = document.querySelector('.card').outerHTML; // Select the card content
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = content; // Replace the body with the card content
    window.print(); // Trigger the print dialog
    document.body.innerHTML = originalContent; // Restore the original content
    location.reload(); // Reload the page to restore event listeners
}
</script>

@endsection
