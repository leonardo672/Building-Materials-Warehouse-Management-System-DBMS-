

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New Material</div>
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

    <form action="<?php echo e(url('materials')); ?>" method="post">
        <?php echo csrf_field(); ?>

        <!-- Material Name -->
        <label for="name">Material Name</label><br>
        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" required><br>

        <!-- Description -->
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control"><?php echo e(old('description')); ?></textarea><br>

        <!-- Category -->
        <label for="category_id">Category</label><br>
        <select name="category_id" id="category_id" class="form-control" required>
          <option value="">Select Category</option>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e(old('category_id') == $category->id ? 'selected' : ''); ?>>
              <?php echo e($category->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <!-- Stock Quantity -->
        <label for="stock_quantity">Stock Quantity</label><br>
        <input type="number" name="stock_quantity" id="stock_quantity" class="form-control" 
               value="<?php echo e(old('stock_quantity', 0)); ?>" min="0" required><br>

        <!-- Stock Threshold -->
        <label for="stock_threshold">Stock Threshold</label><br>
        <input type="number" name="stock_threshold" id="stock_threshold" class="form-control" 
               value="<?php echo e(old('stock_threshold', 10)); ?>" min="1" required><br>

        <!-- Price Per Unit -->
        <label for="price_per_unit">Price Per Unit</label><br>
        <input type="number" name="price_per_unit" id="price_per_unit" class="form-control" 
               value="<?php echo e(old('price_per_unit', 0.00)); ?>" step="0.01" required><br>

        <!-- Location -->
        <label for="location_id">Location</label><br>
        <select name="location_id" id="location_id" class="form-control" required>
          <option value="">Select Location</option>
          <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($location->id); ?>" <?php echo e(old('location_id') == $location->id ? 'selected' : ''); ?>>
              <?php echo e($location->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/materials/create.blade.php ENDPATH**/ ?>