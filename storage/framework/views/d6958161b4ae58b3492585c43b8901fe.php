

<?php $__env->startSection('content'); ?>

<form action='<?php echo e(url('admin/'.$user->id)); ?>' method='post'>
<?php echo csrf_field(); ?>
<?php echo method_field('PUT'); ?>
    <div class="my-3 p-3 bg-body rounded shadow-sm">    
        <a href="<?php echo e(url('admin')); ?>" class="btn btn-secondary">Kembali</a>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Nama Pelapor</p>
            <div class="col-sm-10">
                <p class="form-control"><?php echo e($user->name); ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">ID</p>
            <div class="col-sm-10">
                <p class="form-control"><?php echo e($user->id); ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Kategori Pengaduan</p>
            <div class="col-sm-10">
                <p class="form-control"><?php echo e($user->category->name); ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <p class="col-sm-2 col-form-label">Deskripsi Pengaduan</p>
            <div class="col-sm-10">
                <p class="form-control"><?php echo e($user->complaint); ?></textarea>
            </div>
        </div>

    <!--edit status-->
        <div class="mb-3 row">
            <label for="answer" class="col-sm-2 col-form-label">Tanggapan</label>
            <div class="col-sm-10">
                <textarea type="text" class="form-control" name="answer" id="answer"><?php echo e($user->answer); ?></textarea>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="status" class="col-sm-2 col-form-label">Edit Status</label>
            <div class="col-sm-10">
                <select class="form-control" name="status" id="status">
                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($item->id); ?>"><?php echo e($item->status); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SUBMIT</button></div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\NENAY\ticketing\resources\views/admin/edit.blade.php ENDPATH**/ ?>