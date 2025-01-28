
<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New Order</div>
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

    <form action="<?php echo e(url('orders')); ?>" method="post">
        <?php echo csrf_field(); ?>


        <!-- Order Type -->
        <label for="order_type">Order Type</label><br>
        <select name="order_type" id="order_type" class="form-control" required>
            <option value="purchase">Purchase</option>
            <option value="sales">Sales</option>
        </select><br>

        <!-- Material Selection -->
        <label for="material_id">Material</label><br>
        <select name="material_id" id="material_id" class="form-control" required>
            <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($material->id); ?>"><?php echo e($material->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <!-- Quantity -->
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" class="form-control" required min="1"><br>

        <!-- Total Price -->
        <label for="total_price">Total Price</label><br>
        <input type="number" name="total_price" id="total_price" class="form-control" required step="0.01" min="0"><br>

        <!-- Status -->
        <label for="status">Status</label><br>
        <select name="status" id="status" class="form-control" required>
            <option value="pending">Pending</option>
            <option value="completed">Completed</option>
            <option value="canceled">Canceled</option>
        </select><br>

        <!-- Submit Button -->
        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/orders/create.blade.php ENDPATH**/ ?>