<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/dashboard_condutor_passageiro.css')); ?>">

<h1 class="fonteBold mt-5 text-center">Os Meus Matches</h1>

<div class="container mt-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin_dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard Condutor</li>
        </ol>
    </nav>

    <!-- Div do Preloader -->
    <div id="preloader">
        <br>
        <div class="spinner"></div>
        <br>
    </div>

    <div id="passengersDiv">

    </div>


</div>

<script>
    window.passengers = <?php echo json_encode($passengers, 15, 512) ?>;

    window.address = <?php echo json_encode($address, 15, 512) ?>;

    window.assets = "<?php echo e(asset('storage/')); ?>";

    window.noPhoto = "<?php echo e(asset('img/no-photo.jpg')); ?>";

    window.feedback = "<?php echo e(route('feedback.store')); ?>"
</script>

<script src="<?php echo e(asset("js/driverView.js")); ?>"></script>


<link rel="stylesheet" href="<?php echo e(asset('css/loading_animation.css')); ?>">

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /home/lince/Desktop/git/CESAE_Projeto_Final/ProjetoFinal/resources/views/dashboard_condutor.blade.php ENDPATH**/ ?>