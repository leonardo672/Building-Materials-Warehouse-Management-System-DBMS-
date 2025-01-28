
<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Edit Order</div>
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
      
      <form action="<?php echo e(url('orders/' . $order->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php echo method_field("PATCH"); ?>
        <input type="hidden" name="id" id="id" value="<?php echo e($order->id); ?>" />
        
        <!-- Order Type -->
        <label for="order_type">Order Type</label><br>
        <select name="order_type" id="order_type" class="form-control" required>
            <option value="purchase" <?php echo e($order->order_type == 'purchase' ? 'selected' : ''); ?>>Purchase</option>
            <option value="sales" <?php echo e($order->order_type == 'sales' ? 'selected' : ''); ?>>Sales</option>
        </select><br>
        
        <!-- Material Selection -->
        <label for="material_id">Material</label><br>
        <select name="material_id" id="material_id" class="form-control" required>
            <?php $__currentLoopData = $materials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $material): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($material->id); ?>" <?php echo e($order->material_id == $material->id ? 'selected' : ''); ?>>
                    <?php echo e($material->name); ?>

                </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <!-- Quantity -->
        <label for="quantity">Quantity</label><br>
        <input type="number" name="quantity" id="quantity" value="<?php echo e($order->quantity); ?>" class="form-control" required min="1"><br>

        <!-- Total Price -->
        <label for="total_price">Total Price</label><br>
        <input type="number" name="total_price" id="total_price" value="<?php echo e($order->total_price); ?>" class="form-control" required step="0.01" min="0"><br>

        <!-- Status -->
        <label for="status">Status</label><br>
        <select name="status" id="status" class="form-control" required>
            <option value="pending" <?php echo e($order->status == 'pending' ? 'selected' : ''); ?>>Pending</option>
            <option value="completed" <?php echo e($order->status == 'completed' ? 'selected' : ''); ?>>Completed</option>
            <option value="canceled" <?php echo e($order->status == 'canceled' ? 'selected' : ''); ?>>Canceled</option>
        </select><br>

        <!-- Submit Button -->
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>
   
  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/orders/edit.blade.php ENDPATH**/ ?>