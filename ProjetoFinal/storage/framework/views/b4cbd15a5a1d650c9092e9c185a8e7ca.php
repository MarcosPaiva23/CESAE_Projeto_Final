<?php $__env->startSection('content'); ?>

<link rel="stylesheet" href="<?php echo e(asset('css/feedback.css')); ?>">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header" style="display: grid; grid-template-columns: auto max-content; align-items: center;">
                    <h2 class="mb-0">Detalhes do Feedback</h2>
                </div>


                <div class="card-body ">
                    <h5 class="card-subtitle mb-3">Feedback do Condutor</h5>
                    <h6 class="card-subtitle mb-2"> <?php echo e($feedback->assunto); ?></h6>
                    <h6 class="text-muted mb-3">Enviado por: <?php echo e($feedback->user_email); ?> em <?php echo e($feedback->created_at->format('d/m/Y H:i')); ?></h6>

                    <div class="feedback-content p-3 bg-light rounded my-3">
                        <?php echo nl2br(e($feedback->comentario)); ?>

                    </div>

                    <div class="text-end" style="white-space: nowrap;">
                        <a href="<?php echo e(route('back_office.ver_feedback')); ?>" class="btn btn-info" style="display: inline-block; margin-right: 10px;">
                            <i class="fa fa-arrow-left"></i> Voltar
                        </a>
                        <form action="<?php echo e(route('back_office.ver_feedback.delete', $feedback->id)); ?>" method="POST" onsubmit="return confirm('Tem certeza que deseja eliminar este feedback?')" style="display: inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\Novo\CESAE_Projeto_Final\ProjetoFinal\resources\views/back_office/ver_feedback_especifico.blade.php ENDPATH**/ ?>