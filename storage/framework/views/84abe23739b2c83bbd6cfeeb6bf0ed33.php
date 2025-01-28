

<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Edit Location</div>
  <div class="card-body">
      
      <form action="<?php echo e(url('locations/' . $location->id)); ?>" method="post">
        <?php echo csrf_field(); ?>

        <?php echo method_field("PATCH"); ?>
        <input type="hidden" name="id" id="id" value="<?php echo e($location->id); ?>" />

        <label for="name">Location Name</label><br>
        <input type="text" name="name" id="name" value="<?php echo e($location->name); ?>" class="form-control" required><br>
        
        <label for="description">Description</label><br>
        <textarea name="description" id="description" class="form-control"><?php echo e($location->description); ?></textarea><br>
        
        <input type="submit" value="Update" class="btn btn-success"><br>
      </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/locations/edit.blade.php ENDPATH**/ ?>