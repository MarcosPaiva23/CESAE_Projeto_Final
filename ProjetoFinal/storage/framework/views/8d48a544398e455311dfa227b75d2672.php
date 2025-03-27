<?php $__env->startSection('content'); ?>

    <?php if(@session('status')): ?>
        <div class="alert alert-success text-center">
            <h3>Iremos enviar um email para recuperação da password</h3>
        </div>
        <br>
    <?php endif; ?>

    <form method="POST" action="<?php echo e(route('password.email')); ?>">
        <?php echo csrf_field(); ?>



        
        <div class="mb-3">
            <label  class="form-label">Email: </label>
            <input type="email" class="form-control" id="email" name="email">
            
        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
            <p class="form-error">Email invalido</p>
        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
        </div>

        <br>

        
        <button type="submit" class="btn btn-primary">Submeter</button>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\Novo\CESAE_Projeto_Final\ProjetoFinal\resources\views/auth/password_reset.blade.php ENDPATH**/ ?>