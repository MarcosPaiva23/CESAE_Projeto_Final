<?php $__env->startSection('content'); ?>

<div class="icon-text-container">
    <img src="<?php echo e(asset('img/feedback.png')); ?>" alt="feedback" class="icon-feedback">
    <span class="feedback">Deixa aqui o teu feedback da viagem:</span>
    <img src="<?php echo e(asset('img/feedback.png')); ?>" alt="feedback" class="icon-feedback">
</div>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Feedback</li>
    </ol>
</nav>

<?php if(Auth::check()): ?>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <form action="<?php echo e(route('feedback.store')); ?>" method="POST" class="p-4 border rounded shadow bg-white">
                <?php echo csrf_field(); ?>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" name="email"
                           value="<?php echo e(Auth::user()->email); ?>" readonly>
                    <label for="floatingInput">Email:</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Insira o assunto" id="floatingInput2" name="subject" required>
                    <label for="floatingInput2">Assunto:</label>
                </div>

                <div class="form-floating mb-3">
                    <textarea class="form-control" placeholder="Insira o seu comentário" id="floatingTextarea2" name="comment" style="height: 100px" required></textarea>
                    <label for="floatingTextarea2">Comentários:</label>
                </div>

                <button type="submit" class="btn btn-dark w-100">Enviar Feedback</button>
            </form>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <img src="<?php echo e(asset('img/warning.png')); ?>" alt="Warning" class="icon-login me-2">
        <span>Precisas de fazer <a href="<?php echo e(route('login')); ?>">login</a> para deixares um feedback.</span>
    </div>
<?php endif; ?>

<br>
<br>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\Novo\CESAE_Projeto_Final\ProjetoFinal\resources\views/feedback.blade.php ENDPATH**/ ?>