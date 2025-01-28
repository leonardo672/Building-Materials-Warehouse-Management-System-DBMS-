

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Edit Transaction</div>
  <div class="card-body">
      
      <!-- Form to edit an existing transaction -->
      <form action="<?php echo e(url('transactions/' . $transaction->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?> <!-- Laravel method spoofing to use PATCH for updates -->

        <input type="hidden" name="id" id="id" value="<?php echo e($transaction->id); ?>" />

        <!-- Material Selection -->
        <div class="form-group">
            <label for="material_id">Material</label>
            <select name="material_id" id="material_id" class="form-control" required>
                <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($material->id); ?>" <?php echo e($material->id == $transaction->material_id ? 'selected' : ''); ?>>
                        <?php echo e($material->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Transaction Type -->
        <div class="form-group">
            <label for="type">Transaction Type</label>
            <select name="type" id="type" class="form-control" required>
                <option value="add" <?php echo e($transaction->type == 'add' ? 'selected' : ''); ?>>Add</option>
                <option value="deduct" <?php echo e($transaction->type == 'deduct' ? 'selected' : ''); ?>>Deduct</option>
            </select>
        </div>

        <!-- Quantity -->
        <div class="form-group">
            <label for="quantity">Quantity</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="<?php echo e($transaction->quantity); ?>" min="1">
        </div>

        <!-- Performed By (User) -->
        <div class="form-group">
            <label for="performed_by">Performed By</label>
            <select name="performed_by" id="performed_by" class="form-control" required>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($user->id); ?>" <?php echo e($user->id == $transaction->performed_by ? 'selected' : ''); ?>>
                        <?php echo e($user->name); ?>

                    </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-success">Update</button>
      </form>
   
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/transactions/edit.blade.php ENDPATH**/ ?>