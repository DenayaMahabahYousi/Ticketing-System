

<?php $__env->startSection('content'); ?>
<h2 class="text-center">Dashboard Pengaduan</h2>
<!-- START DATA -->
<div class="my-3 p-3 bg-body rounded shadow-sm">
    
    <!-- TOMBOL TAMBAH DATA -->
    <div class="pb-3">
        <a href='<?php echo e(url('user/create')); ?>' class="btn btn-primary">+ Buat Pengaduan</a>
    </div>

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
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<!-- AKHIR DATA -->
<?php $__env->stopSection(); ?>        
<?php echo $__env->make('layout.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\NENAY\ticketing\resources\views/user/index.blade.php ENDPATH**/ ?>