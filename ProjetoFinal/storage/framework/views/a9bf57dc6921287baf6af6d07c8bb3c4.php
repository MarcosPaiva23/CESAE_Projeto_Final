<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
<div class="container mt-4 admin-form-container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?php echo e(route('admin_dashboard')); ?>">Dashboard</a></li>
            <li class="breadcrumb-item active" aria-current="page">Criar Administrador</li>
        </ol>
    </nav>

    <div class="row">
        <!-- Coluna da esquerda com informação -->
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-header cesae-purple text-white">
                    <h4 class="mb-0">Gestão de Administradores</h4>
                </div>
                <div class="card-body">
                    <h5 class="text-dark">Informações Importantes</h5>
                    <p>Os administradores têm acesso completo à aplicação, incluindo:</p>
                    <ul>
                        <li>Gestão de utilizadores</li>
                        <li>Remoção e bloqueio de contas</li>
                    </ul>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle"></i> Certifique-se de criar contas de administrador apenas para pessoas autorizadas.
                    </div>
                    <div class="d-grid gap-2 mt-4">
                        <a href="<?php echo e(route('admin_dashboard')); ?>" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left"></i> Voltar ao Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Coluna da direita com o formulário -->
        <div class="col-md-8">
            <div class="card">
                <div class="card-header cesae-purple text-white">
                    <h4 class="mb-0">Criar Novo Administrador</h4>
                </div>
                <div class="card-body">
                    <?php if(session('message')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('message')); ?>

                        </div>
                    <?php endif; ?>
                    <form method="POST" action="<?php echo e(route('admin.store')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="mb-3">
                            <label for="name" class="form-label">Nome: </label>
                            <input type="text" class="form-control" id="name" name="name" value="<?php echo e(old('name')); ?>" required>
                            <?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email: </label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo e(old('email')); ?>" required>
                            <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password: </label>
                            <input type="password" class="form-control" id="password" name="password" required>
                            <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                <div class="text-danger"><?php echo e($message); ?></div>
                            <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </div>
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Confirmar Password: </label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn cesae-blue">
                                <i class="fas fa-user-plus"></i> Criar Conta de Administrador
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/back_office/create_admin.blade.php ENDPATH**/ ?>