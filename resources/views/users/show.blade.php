@extends('layout')
@section('content')

<!-- Main Card to Display User Details -->
<div class="card">
  <div class="card-header">User Details</div>
  <div class="card-body">
    <div class="card-body">
        <!-- Display User Name -->
        <h5 class="card-title">Name: {{ $user->name }}</h5>
        
        <!-- Display User Email -->
        <p class="card-text">Email: {{ $user->email }}</p>
        
        <!-- Display User Role -->
        <p class="card-text">Role: {{ ucfirst($user->role) }}</p>
    </div>

    <!-- Print Button -->
    <div class="d-flex justify-content-start mt-3">
        <button class="btn print-btn" onclick="printTransactionDetails()" title="Print Transaction Details">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </button>
    </div>
  </div>
</div>

<!-- JavaScript Function for Print -->
<script>
function printUserDetails() {
    const content = document.querySelector('.card').outerHTML; // Select the card content
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = content; // Replace the body with the card content
    window.print(); // Trigger the print dialog
    document.body.innerHTML = originalContent; // Restore the original content
    location.reload(); // Reload the page to restore event listeners
}
</script>

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

@endsection
