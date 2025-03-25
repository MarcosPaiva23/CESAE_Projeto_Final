<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center align-items-center">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">Foto</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Distância</th>
                    <th scope="col">Utilidades</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $passengers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currentPassenger): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                            <tr>
                                <td><?php echo e($currentPassenger->foto); ?></td>
                                <td><?php echo e($currentPassenger->name); ?></td>
                                <td><?php echo e($currentPassenger->curso); ?></td>
                                <td>To be added</td>
                                <td><a class="btn btn-info" href="">Dar feedback</a>
                                    <a class="btn btn-info" href="">Conversar</a>
                                <td>
                            </tr>
                        
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <br><br>
        <button type="button" class="btn btn-danger">Apagar conta</button>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/dashboard_condutor.blade.php ENDPATH**/ ?>