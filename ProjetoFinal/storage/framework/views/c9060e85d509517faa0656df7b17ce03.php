<?php $__env->startSection('content'); ?>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">

<div class="container mt-4">
    <div class="card">
        <div class="card-header cesae-purple text-white">
            <h4 class="mb-0">Gestão de Utilizadores</h4>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Email</th>
                            <th>Curso</th>
                            <th>Tem Carro</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($user->id); ?></td>
                            <td>
                                <?php if($user->foto): ?>
                                    <img src="<?php echo e(asset('storage/' . $user->foto)); ?>" class="table-image">
                                <?php else: ?>
                                    <img src="<?php echo e(asset('img/no-photo.jpg')); ?>" class="table-image">
                                <?php endif; ?>
                            </td>
                            <td><?php echo e($user->name); ?></td>
                            <td><?php echo e($user->email); ?></td>
                            <td><?php echo e($user->curso); ?></td>
                            <td><?php echo e($user->tem_carro ? 'Sim' : 'Não'); ?></td>
                            <td>
                                <a class="btn btn-danger" href="<?php echo e(route('blockUserAccess', $user->id)); ?>">
                                    Bloquear Acesso
                                </a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

                
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center mt-3">
                        
                        <?php if($users->onFirstPage()): ?>
                            <li class="page-item disabled">
                                <span class="page-link">&laquo;</span>
                            </li>
                        <?php else: ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e($users->previousPageUrl()); ?>" rel="prev">&laquo;</a>
                            </li>
                        <?php endif; ?>

                        
                        <?php $__currentLoopData = $users->getUrlRange(1, $users->lastPage()); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($page == $users->currentPage()): ?>
                                <li class="page-item active" aria-current="page">
                                    <span class="page-link"><?php echo e($page); ?></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        
                        <?php if($users->hasMorePages()): ?>
                            <li class="page-item">
                                <a class="page-link" href="<?php echo e($users->nextPageUrl()); ?>" rel="next">&raquo;</a>
                            </li>
                        <?php else: ?>
                            <li class="page-item disabled">
                                <span class="page-link">&raquo;</span>
                            </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\sw2024\Desktop\CESAE_Projeto_Final\ProjetoFinal\resources\views/back_office/admin_dashboard.blade.php ENDPATH**/ ?>