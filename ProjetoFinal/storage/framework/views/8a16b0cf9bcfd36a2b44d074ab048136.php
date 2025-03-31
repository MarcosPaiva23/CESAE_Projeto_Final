<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login&register.css')); ?>">

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <?php if(Auth::check()): ?>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
                    </ol>
                </nav>

                <div class="card" style="min-height: fit-content;">
                    <div class="card-header cesae-purple text-white">
                        <h4 class="mb-0">Deixa aqui o teu feedback</h4>
                    </div>
                    <div class="card-body">
                        <?php if(session('message')): ?>
                            <div class="alert alert-success">
                                <?php echo e(session('message')); ?>

                            </div>
                        <?php endif; ?>

                        <?php $__errorArgs = ['error'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger">
                                <?php echo e($message); ?>

                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        <form action="<?php echo e(route('feedback.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>

                            
                            <div class="mb-3">
                                <label class="form-label">Email: </label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo e(Auth::user()->email); ?>" readonly>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Assunto: </label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>

                            
                            <div class="mb-3">
                                <label class="form-label">Comentários: </label>
                                <textarea class="form-control" id="comment" name="comment" style="height: 100px" required></textarea>
                            </div>

                            
                            <div class="d-grid">
                                <button type="submit" class="btn cesae-blue">Enviar Feedback</button>
                            </div>
                        </form>
                    </div>
                </div>
            <?php else: ?>
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <img src="<?php echo e(asset('img/warning.png')); ?>" alt="Warning" class="icon-login me-2">
                    <span>Precisas de fazer <a href="<?php echo e(route('login')); ?>">login</a> para deixares feedback.</span>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sw2024\Desktop\git\CESAE_Projeto_Final\ProjetoFinal\resources\views/feedback.blade.php ENDPATH**/ ?>