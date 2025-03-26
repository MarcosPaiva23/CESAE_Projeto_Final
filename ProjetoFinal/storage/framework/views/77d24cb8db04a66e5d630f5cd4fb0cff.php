<?php $__env->startSection('content'); ?>

    
    <?php if(session('error')): ?>
        <div class="alert alert-danger text-center">
            <h3><?php echo e(session('error')); ?></h3>
        </div>
        <br>
    <?php endif; ?>

    <?php if(session('message')): ?>
        <div class="alert alert-success text-center">
            <h3><?php echo e(session('message')); ?></h3>
        </div>
        <br>
    <?php endif; ?>


<div class="container mt-4">
    <div class="row">
        <!-- Coluna Esquerda - Conteúdo -->
        <div class="col-md">
            <div class="conteudo">
                <br>
                <h6><img src="<?php echo e(asset('img/ride-hailing.png')); ?>" alt="Ride" class="icon-ride">Bem-vindo ao CESAE Boleias!</h6>
                <br>

                <p>O CESAE Boleias é uma plataforma inovadora desenvolvida para facilitar a partilha de transporte entre os alunos do CESAE. Registe-se, indique o seu ponto de partida e escolha se deseja oferecer ou pedir boleia. Com o nosso sistema inteligente, é fácil encontrar alunos com rotas compatíveis e combinar viagens de forma prática e sustentável.</p>

                <h6 class="mt-4">Funcionalidades:</h6>
                <br>

                <ul>
                    <li><strong>Match Inteligente:</strong> Encontre automaticamente as melhores boleias.</li>
                    <li><strong>Agendamento de Boleias:</strong> Marque viagens para dias e horários específicos.</li>
                    <li><strong>Gestão Personalizada:</strong> Organize as suas boleias e comunique com outros participantes.</li>
                    <li><strong>Feedback:</strong> Avalie e garanta segurança e confiança.</li>
                </ul>
            </div>
        </div>

        <?php if(Route::has('login')): ?>
            <?php if(auth()->guard()->check()): ?>

                <!-- Coluna Direita - Barra e Menu -->
                <div class="col-md">
                    <div class="barra mt-4 text-center">
                        <h5>O que pretendes fazer hoje?</h5>
                    </div>

                    <div class="menu mt-4">
                        <div class="container text-center">
                            <ul class="list-unstyled">
                                <li>
                                    <a href="<?php echo e(route('feedback')); ?>">
                                        <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                        Deixar feedback
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php endif; ?>
        <?php endif; ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/home.blade.php ENDPATH**/ ?>