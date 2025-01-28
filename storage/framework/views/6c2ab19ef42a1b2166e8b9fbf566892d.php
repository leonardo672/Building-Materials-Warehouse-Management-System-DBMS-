

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New Location</div>
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

    <form action="<?php echo e(route('locations.store')); ?>" method="post">
        <?php echo csrf_field(); ?>


        <label for="name">Location Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control"></textarea><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/locations/create.blade.php ENDPATH**/ ?>