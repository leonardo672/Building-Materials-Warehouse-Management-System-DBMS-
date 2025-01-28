

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New Transaction</div>
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

    <!-- Form to create a new transaction -->
    <form action="<?php echo e(url('transactions')); ?>" method="post">
        <?php echo csrf_field(); ?>  <!-- Laravel's CSRF token -->

        <!-- Material Dropdown -->
        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                <option value="">Select Material</option>
                <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($material->id); ?>"><?php echo e($material->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Transaction Type Dropdown -->
        <div class="form-group">
            <label for="type">Transaction Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="add">Add</option>
                <option value="deduct">Deduct</option>
            </select>
        </div>

        <!-- Quantity Input -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required min="1" value="<?php echo e(old('quantity')); ?>">
        </div>

        <!-- Performed By Dropdown -->
        <div class="form-group">
            <label for="performed_by">Performed By</label>
            <select name="performed_by" id="performed_by" class="form-control" required>
                <option value="">Select User</option>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Save</button>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/transactions/create.blade.php ENDPATH**/ ?>