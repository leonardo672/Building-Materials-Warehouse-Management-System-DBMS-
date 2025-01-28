

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New Supplier</div>
  <div class="card-body">

    <!-- Display validation errors -->
    <?php if($errors->any()): ?>
      <div class="alert alert-danger">
          <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </ul>
      </div>
    <?php endif; ?>

    <form action="<?php echo e(url('suppliers')); ?>" method="post">
        <?php echo csrf_field(); ?>


        <!-- Supplier Name -->
        <label for="name">Supplier Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <!-- Contact Email -->
        <label for="contact_email">Contact Email</label><br>
        <input type="email" name="contact_email" id="contact_email" class="form-control" required><br>

        <!-- Contact Phone -->
        <label for="contact_phone">Contact Phone</label><br>
        <input type="text" name="contact_phone" id="contact_phone" class="form-control" required><br>

        <!-- Address -->
        <label for="address">Address</label><br>
        <textarea name="address" id="address" class="form-control" required></textarea><br>

        <!-- Submit Button -->
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/suppliers/create.blade.php ENDPATH**/ ?>