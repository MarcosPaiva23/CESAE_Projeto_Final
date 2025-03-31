<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/login&register.css')); ?>">

<div class="container mt-4 mb-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" style="min-height: fit-content;">
                <div class="card-header cesae-purple text-white">
                    <h4 class="mb-0">Login</h4>
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

                    <form method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo csrf_field(); ?>

                        
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <div class="alert alert-danger" role="alert">
                                Credenciais incorretas
                            </div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>

                        
                        <div class="mb-3">
                            <label class="form-label">Email: </label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>">
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Password: </label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>

                        
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="remember" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                            <label class="form-check-label" for="remember">Lembrar-me</label>
                        </div>

                        
                        <div class="d-grid mb-2">
                            <button type="submit" class="btn cesae-blue">Login</button>
                        </div>
                        <div class="text-center mt-2">
                            <a href="<?php echo e(route('password.request')); ?>" class="text-decoration-none d-block">Esqueci-me da password</a>
                            <a href="<?php echo e(route('register')); ?>" class="text-decoration-none d-block mt-1">Criar nova conta</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sw2024\Desktop\git\CESAE_Projeto_Final\ProjetoFinal\resources\views/auth/login.blade.php ENDPATH**/ ?>