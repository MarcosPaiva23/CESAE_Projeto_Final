<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/dashboard_condutor_passageiro.css')); ?>">

<h1 class="fonteBold mt-5 text-center">Os Meus Matches</h1>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin_dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Passageiro</li>
        </ol>
    </nav>

    <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentDriver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="card mb-3">
            <div class="card-body d-flex align-items-center">
                

                <?php if($currentDriver->foto != null): ?>
                    <img src="<?php echo e(asset('storage/' . $currentDriver->foto)); ?>" alt="Foto de <?php echo e($currentDriver->name); ?>"
                    class="img-fluid rounded-circle me-3" width="80" height="80">
                <?php else: ?>
                    <img src="<?php echo e(asset('img/no-photo.jpg')); ?>" alt="Sem foto"
                    class="img-fluid rounded-circle me-3" width="80" height="80">
                <?php endif; ?>


                
                <div class="flex-grow-1">
                    <h6 class="fonteBold mb-1"><?php echo e($currentDriver->name); ?></h6>
                    <p class="mb-1 text-muted"><?php echo e($currentDriver->curso); ?></p>
                    <p class="small text-muted">Distância: <?php echo e($currentDriver->distance); ?></p>
                </div>

                
                <div>
                    <a class="btn cesae-purple" href="<?php echo e(route('feedback.store')); ?>">Dar feedback</a>
                    <a class="btn cesae-blue" href="#">Conversar</a>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/lince/Desktop/git/CESAE_Projeto_Final/ProjetoFinal/resources/views/dashboard_passageiro.blade.php ENDPATH**/ ?>