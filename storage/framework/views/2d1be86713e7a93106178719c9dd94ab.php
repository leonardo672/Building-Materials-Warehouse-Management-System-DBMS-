

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Edit Material</div>
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

    <form action="<?php echo e(url('materials/' . $material->id)); ?>" method="post">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PATCH'); ?>

        <!-- Material ID (hidden) -->
        <input type="hidden" name="id" id="id" value="<?php echo e($material->id); ?>" />

        <!-- Material Name Input -->
        <label for="name">Material Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo e(old('name', $material->name)); ?>" class="form-control" required><br>

        <!-- Description Input -->
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control"><?php echo e(old('description', $material->description)); ?></textarea><br>

        <!-- Category Dropdown -->
        <label for="category_id">Category</label><br>
        <select name="category_id" id="category_id" class="form-control" required>
          <option value="">Select Category</option>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($category->id); ?>" <?php echo e($category->id == old('category_id', $material->category_id) ? 'selected' : ''); ?>>
              <?php echo e($category->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <!-- Stock Quantity Input -->
        <label for="stock_quantity">Stock Quantity</label><br>
        <input type="number" name="stock_quantity" id="stock_quantity" value="<?php echo e(old('stock_quantity', $material->stock_quantity)); ?>" class="form-control" min="0" required><br>

        <!-- Stock Threshold Input -->
        <label for="stock_threshold">Stock Threshold</label><br>
        <input type="number" name="stock_threshold" id="stock_threshold" value="<?php echo e(old('stock_threshold', $material->stock_threshold)); ?>" class="form-control" min="1" required><br>

        <!-- Price Per Unit Input -->
        <label for="price_per_unit">Price Per Unit</label><br>
        <input type="number" name="price_per_unit" id="price_per_unit" value="<?php echo e(old('price_per_unit', $material->price_per_unit)); ?>" class="form-control" step="0.01" required><br>

        <!-- Location Dropdown -->
        <label for="location_id">Location</label><br>
        <select name="location_id" id="location_id" class="form-control" required>
          <option value="">Select Location</option>
          <?php $__currentLoopData = $locations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $location): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($location->id); ?>" <?php echo e($location->id == old('location_id', $material->location_id) ? 'selected' : ''); ?>>
              <?php echo e($location->name); ?>

            </option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select><br>

        <input type="submit" value="Update" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/materials/edit.blade.php ENDPATH**/ ?>