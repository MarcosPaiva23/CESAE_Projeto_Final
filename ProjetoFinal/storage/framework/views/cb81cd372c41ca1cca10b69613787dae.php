    
    <?php $__env->startSection('content'); ?>

    <link rel="stylesheet" href="<?php echo e(asset('css/dashboard_condutor_passageiro.css')); ?>">

    <h1 class="fonteBold mt-5 text-center">Dashboard Passageiro</h1>

    <div class="container mt-4">

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('admin_dashboard')); ?>">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard Passageiro</li>
            </ol>
        </nav>

        <?php $__currentLoopData = $drivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentDriver): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="card mb-3 shadow-sm">
                <div class="card-body d-flex align-items-center">

                    
                    <img src="<?php echo e($currentDriver->foto); ?>" alt="Foto de <?php echo e($currentDriver->name); ?>"
                        class="img-fluid rounded-circle me-3" width="80" height="80">

                    
                    <div class="flex-grow-1">
                        <h6 class="fonteBold mb-1"><?php echo e($currentDriver->name); ?></h6>
                        <p class="mb-1 text-muted"><?php echo e($currentDriver->curso); ?></p>
                        <p class="small text-muted">Distância: To be added</p>
                    </div>

                    
                    <div>
                        <a class="btn btn-outline-primary me-2" href="<?php echo e(route('feedback.store')); ?>">Dar feedback</a>
                        <a class="btn btn-outline-primary me-2" href="#">Dar feedback</a>
                        <a class="btn btn-outline-secondary" href="#">Conversar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>

    <!-- Botão para apagar conta -->
    <div class="text-center mt-4">

        <button type="button" class="btn btn-danger">Apagar conta</button>
    </div>

    <?php $__env->stopSection(); ?>





<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\Novo\CESAE_Projeto_Final\ProjetoFinal\resources\views/dashboard_passageiro.blade.php ENDPATH**/ ?>