<?php $__env->startSection('content'); ?>

<?php echo $__env->make('prob-notice', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo e($error); ?> <br>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php endif; ?>

<form method="POST" action="<?php echo e(route('prizes.store')); ?>">
    <?php echo csrf_field(); ?>

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control" />
    </div>
    <div class="mb-3">
        <label for="probability" class="form-label">Probability</label>
        <input type="number" name="probability" id="probability" class="form-control" min="0" max="100" placeholder="0 - 100" step="0.01" />
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
</form>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\lucky_prize_winner_event\resources\views/prizes/create.blade.php ENDPATH**/ ?>