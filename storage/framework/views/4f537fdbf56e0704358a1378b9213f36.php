

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Edit Supplier</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('suppliers/' . $supplier->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php echo method_field("PATCH"); ?>
        <input type="hidden" name="id" id="id" value="<?php echo e($supplier->id); ?>" />

        <!-- Supplier Name -->
        <label for="name">Supplier Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo e($supplier->name); ?>" class="form-control" required><br>
        
        <!-- Contact Email -->
        <label for="contact_email">Contact Email</label><br>
        <input type="email" name="contact_email" id="contact_email" value="<?php echo e($supplier->contact_email); ?>" class="form-control" required><br>

        <!-- Contact Phone -->
        <label for="contact_phone">Contact Phone</label><br>
        <input type="text" name="contact_phone" id="contact_phone" value="<?php echo e($supplier->contact_phone); ?>" class="form-control" required><br>

        <!-- Address -->
        <label for="address">Address</label><br>
        <textarea name="address" id="address" class="form-control" required><?php echo e($supplier->address); ?></textarea><br>

        <!-- Submit Button -->
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>
   
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/suppliers/edit.blade.php ENDPATH**/ ?>