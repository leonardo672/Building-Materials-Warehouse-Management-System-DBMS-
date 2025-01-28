
<?php $__env->startSection('content'); ?>

<div class="card">
  <div class="card-header">Create New User</div>
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

    <form action="<?php echo e(url('users')); ?>" method="post">
        <?php echo csrf_field(); ?>


        <label for="name">Name</label><br>
        <input type="text" name="name" id="name" class="form-control" required><br>

        <label for="email">Email</label><br>
        <input type="email" name="email" id="email" class="form-control" required><br>

        <label for="password">Password</label><br>
        <input type="password" name="password" id="password" class="form-control" required><br>

        <label for="role">Role</label><br>
        <select name="role" id="role" class="form-control" required>
            <option value="staff">Staff</option>
            <option value="manager">Manager</option>
            <option value="admin">Admin</option>
        </select><br>

        <input type="submit" value="Save" class="btn btn-success"><br>
    </form>

  </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\Projects\Mark\new\Warehouse_of_Building_Materials_Management_System-app\resources\views/users/create.blade.php ENDPATH**/ ?>