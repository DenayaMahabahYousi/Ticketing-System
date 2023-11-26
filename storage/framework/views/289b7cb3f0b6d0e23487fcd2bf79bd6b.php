<?php $__env->startSection('content'); ?>
<?php if($errors -> any()): ?>
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($item); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
<?php endif; ?>

<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">Login Admin</div>
			<div class="card-body">
                <form action='<?php echo e(route('auth.validate_login')); ?>' method='post'>
                    <?php echo csrf_field(); ?>
                    <div class="form-group mb-3">
						<input type="text" name="id" class="form-control" placeholder="ID" />
						<?php if($errors->has('id')): ?>
							<span class="text-danger"><?php echo e($errors->first('id')); ?></span>
						<?php endif; ?>
					</div>
					<div class="form-group mb-3">
						<input type="password" name="password" class="form-control" placeholder="Password" />
						<?php if($errors->has('password')): ?>
							<span class="text-danger"><?php echo e($errors->first('password')); ?></span>
						<?php endif; ?>
					</div>
					<div class="d-grid mx-auto">
						<button type="submit" class="btn btn-dark btn-block">Login</button>
                        <br>
                        <a href="<?php echo e(url('user')); ?>" class="btn btn-secondary">Lanjutkan sebagai User</a>
					</div>
                </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\NENAY\ticketing\resources\views/login.blade.php ENDPATH**/ ?>