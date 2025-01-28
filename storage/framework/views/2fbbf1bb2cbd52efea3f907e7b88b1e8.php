
<?php $__env->startSection('content'); ?>

<!-- Main Card to Display Order Details -->
<div class="card">
  <div class="card-header">Order Details</div>
  <div class="card-body">
    
    <?php if(isset($order)): ?>
        <!-- Display Order ID -->
        <h5 class="card-title">Order ID: <?php echo e($order->id); ?></h5>

        <!-- Display Order Type -->
        <p class="card-text">Order Type: <?php echo e(ucfirst($order->order_type)); ?></p>

        <!-- Display Material Name -->
        <p class="card-text">Material: <?php echo e($order->material->name); ?></p>

        <!-- Display Quantity -->
        <p class="card-text">Quantity: <?php echo e($order->quantity); ?></p>

        <!-- Display Total Price -->
        <p class="card-text">Total Price: $<?php echo e(number_format($order->quantity * $order->material->price_per_unit, 2)); ?></p>

        <!-- Display Status -->
        <p class="card-text">Status: <?php echo e(ucfirst($order->status)); ?></p>

        <!-- Display Order Created Date -->
        <p class="card-text">Order Date: <?php echo e($order->created_at->format('F d, Y')); ?></p>
    <?php else: ?>
        <p class="card-text">Order not found.</p>
    <?php endif; ?>
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
function printOrderDetails() {
    const content = document.querySelector('.card').outerHTML; // Select the card content
    const originalContent = document.body.innerHTML;

    document.body.innerHTML = content; // Replace the body with the card content
    window.print(); // Trigger the print dialog
    document.body.innerHTML = originalContent; // Restore the original content
    location.reload(); // Reload the page to restore event listeners
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/orders/show.blade.php ENDPATH**/ ?>