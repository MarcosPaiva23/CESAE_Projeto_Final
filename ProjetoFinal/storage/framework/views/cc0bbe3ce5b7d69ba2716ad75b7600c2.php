<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/feedback.css')); ?>">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2 class="h2-white">Gestão de Feedback</h2>
                </div>
                <div class="card-body">
                    <?php if(session()->has('success')): ?>
                        <div class="alert alert-success"><?php echo e(session('success')); ?></div>
                    <?php endif; ?>
                    <?php if(session()->has('error')): ?>
                        <div class="alert alert-danger"><?php echo e(session('error')); ?></div>
                    <?php endif; ?>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Email</th>
                                    <th>Assunto</th>
                                    <th>Data</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__empty_1 = true; $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <tr>
                                        <td><?php echo e($feedback->id); ?></td>
                                        <td><?php echo e($feedback->user_email); ?></td>
                                        <td><?php echo e($feedback->assunto); ?></td>
                                        <td><?php echo e($feedback->created_at->format('d/m/Y H:i')); ?></td>
                                        <td>
                                            <a href="<?php echo e(route('back_office.ver_feedback_especifico', $feedback->id)); ?>" class="btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> Ver
                                            </a>
                                            <form action="<?php echo e(route('back_office.ver_feedback.delete', $feedback->id)); ?>" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja eliminar este feedback?')">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('DELETE'); ?>
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-trash"></i> Eliminar
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Nenhum feedback encontrado.</td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center mt-4">
                        <?php echo e($feedbacks->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\boleias\CESAE_Projeto_Final\ProjetoFinal\resources\views/back_office/ver_feedback.blade.php ENDPATH**/ ?>