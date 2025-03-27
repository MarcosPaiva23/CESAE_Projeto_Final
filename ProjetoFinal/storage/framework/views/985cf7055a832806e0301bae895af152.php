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

                    <h6><img src="<?php echo e(asset('img/ride-hailing.png')); ?>" alt="Ride" class="icon-ride">Bem-vindo ao CESAE
                        Boleias!</h6>
                    <br>

                    <p>O CESAE Boleias é uma plataforma inovadora desenvolvida para facilitar a partilha de transporte entre
                        os alunos do CESAE. Registe-se, indique o seu ponto de partida e escolha se deseja oferecer ou pedir
                        boleia. Com o nosso sistema inteligente, é fácil encontrar alunos com rotas compatíveis e combinar
                        viagens de forma prática e sustentável.</p>

                    <h6 class="mt-4">Funcionalidades:</h6>
                    <br>

                    <ul>
                        <li><strong>Match Inteligente:</strong> Encontre automaticamente as melhores boleias.</li>
                        <p>
                        <li><strong>Agendamento de Boleias:</strong> Marque viagens para dias e horários específicos.</li>
                        <p>
                        <li><strong>Gestão Personalizada:</strong> Organize as suas boleias e comunique com outros
                            participantes.</li>
                        <p>
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

                        <div class="menu mt-2 justify-content-center align-items-center">
                            <div class="container text-center">
                                <ul class="list-unstyled d-inline-block text-start">
                                    <p>
                                    <li>
                                        <a href="<?php echo e(route('showDriverTable')); ?>">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                            Matches
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('showPassengerTable')); ?>">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                            Dashboard Condutor
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo e(route('feedback')); ?>">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                            Deixar feedback
                                        </a>
                                    </li>
                                    <li>
                                         <a href="<?php echo e(route('settings.index')); ?>">
                                        <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                        Definições
                                        </a>
                                    </li>
                                    <li>
                                        <form method="POST" action="<?php echo e(route('logout')); ?>" style="display: inline;">
                                            <?php echo csrf_field(); ?>
                                            <button type="submit" style="font-family: inherit; font-size: inherit; color: inherit; text-decoration: none; border: none; background: none; cursor: pointer; padding: 0; margin: 0; display: flex; align-items: center;">
                                                <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                Logout
                                            </button>
                                        </form>
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

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\Novo\CESAE_Projeto_Final\ProjetoFinal\resources\views/home.blade.php ENDPATH**/ ?>