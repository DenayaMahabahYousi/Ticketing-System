

<?php $__env->startSection('nav-menu'); ?>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('admin')); ?>">Dashboard</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('admin/forme')); ?>">Ditugaskan Kepada Saya</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('admin/software')); ?>">Pengaduan Software</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="<?php echo e(url('admin/hardware')); ?>">Pengaduan Hardware</a>
    </li>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<h2 class="text-center">Pengaduan yang Ditugaskan Kepada Saya</h2>
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-auto">ID</th>
                <th class="col-auto">Status</th>
                <th class="col-auto">Kategori</th>
                <th class="col-md-3">Deskripsi Pengaduan</th>
                <th class="col-auto">Nama Pelapor</th>
                <th class="col-md-3">Tanggapan</th>
                <th class="col-auto">Tanggal dilaporkan</th>
                <th class="col-auto">Tanggal diproses</th>
                <th class="col-auto">Tanggal selesai</th>
                <th class="col-auto">Ditugaskan Kepada</th>
                <th class="col-auto">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($item->id); ?></td>
                    <td><?php echo e($item->status->status); ?></td>
                    <td><?php echo e($item->category->name); ?></td>
                    <td><?php echo e($item->complaint); ?></td>
                    <td><?php echo e($item->name); ?></td>
                    <td><?php echo e($item->answer); ?></td>
                    <td><?php echo e($item->opened_at); ?></td>
                    <td><?php echo e($item->process_at); ?></td>
                    <td><?php echo e($item->closed_at); ?></td>
                    <?php if(is_null($item->admin?->name)): ?>
                        <td>-</td>
                    <?php else: ?>
                        <td><?php echo e($item->admin?->name); ?></td>
                    <?php endif; ?>
                    <td>
                        <a href='<?php echo e(url('admin/'.$item->id.'/edit')); ?>' class="btn btn-warning btn-sm">Tanggapi/Ubah Status</a>
                        <form onsubmit="return confirm('Yakin akan menghapus data?')" class="d-inline" action="<?php echo e(url('admin/'.$item->id)); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" name="submit" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- AKHIR DATA -->
<?php $__env->stopSection(); ?>        
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\NENAY\ticketing\resources\views/admin/forme.blade.php ENDPATH**/ ?>