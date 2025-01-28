

<?php $__env->startSection('content'); ?>

<!-- Main Card to Display Transaction Details -->
<div class="card shadow-lg rounded card-bg">
    <div class="card-header header-bg">
        <h2><i class="fa fa-credit-card"></i> Transaction Details</h2>
    </div>

    <div class="card-body">
        <!-- Display Transaction Date -->
        <h5 class="card-title text-primary">Date: <?php echo e(\Carbon\Carbon::parse($transaction->created_at)->format('Y-m-d')); ?></h5>
        
        <!-- Display Material -->
        <p class="card-text"><strong>Material:</strong> <?php echo e($transaction->material->name ?? 'N/A'); ?></p>

        <!-- Display Transaction Type -->
        <p class="card-text"><strong>Transaction Type:</strong> <?php echo e(ucfirst($transaction->type)); ?></p>

        <!-- Display Quantity -->
        <p class="card-text"><strong>Quantity:</strong> <?php echo e($transaction->quantity); ?></p>

        <!-- Display Performed By User -->
        <p class="card-text"><strong>Performed By:</strong> <?php echo e($transaction->user->name ?? 'Unknown'); ?></p>

        <!-- Display Description if available -->
        <p class="card-text"><strong>Description:</strong> <?php echo e($transaction->description ?? 'N/A'); ?></p>

        <!-- Back to List Button -->
        <a href="<?php echo e(url('/transactions')); ?>" class="btn btn-secondary mt-3">
            <i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Transactions
        </a>
    </div>

    <!-- Print Button aligned to the left -->
    <div class="d-flex justify-content-start mt-3">
        <button class="btn print-btn" onclick="printTransactionDetails()" title="Print Transaction Details">
            <i class="fa fa-print" aria-hidden="true"></i> Print
        </button>
    </div>

</div>

<!-- JavaScript Function for Print -->
<script>
function printTransactionDetails() {
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/transactions/show.blade.php ENDPATH**/ ?>