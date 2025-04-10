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
            <div class="col-md">
                <div class="conteudo">
                    <h6><img src="<?php echo e(asset('img/ride-hailing.png')); ?>" alt="Ride" class="icon-ride">Bem-vindo ao CESAE Boleias!</h6>
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
                    <div class="col-md">
                        <div class="barra mt-4 text-center">
                            <h5>O que pretendes fazer hoje?</h5>
                        </div>

                        <div class="menu mt-2 justify-content-center align-items-center">
                            <div class="container text-center">
                                <ul class="list-unstyled d-inline-block text-start">


                                    <?php if(Auth::user()->is_admin == 1): ?>
                                        
                                        <li>
                                            <a href="<?php echo e(route('admin_dashboard')); ?>">
                                                <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                Painel Administrador
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('admin.create')); ?>">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                                                            Adicionar Admins
                                            </a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('back_office.ver_feedback')); ?>">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                                                            Ver feedback
                                            </a>
                                        </li>
                                    <?php else: ?>
                                        
                                        <?php if(Auth::user()->tem_carro == 0): ?>
                                            <li>
                                                <a href="<?php echo e(route('showPassengerTable')); ?>">
                                                    <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                    Meus Matches (Passageiro)
                                                </a>
                                            </li>
                                        <?php else: ?>
                                            <li>
                                                <a href="<?php echo e(route('showDriverTable')); ?>">
                                                    <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                    Meus Matches (Condutor)
                                                </a>
                                            </li>
                                        <?php endif; ?>

                                        <li>
                                            <a href="<?php echo e(route('feedback')); ?>">
                                                <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                Deixar Feedback
                                            </a>
                                        </li>

                                        <li>
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">
                                                <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                                Definições
                                            </a>
                                        </li>
                                    <?php endif; ?>

                                    <li>
                                        <a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <img src="<?php echo e(asset('img/seta.png')); ?>" alt="Arrow" class="icon-arrow">
                                            Logout
                                        </a>
                                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                            <?php echo csrf_field(); ?>

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

<?php echo $__env->make('layout.main_layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\filip\OneDrive\Ambiente de Trabalho\git\teste\CESAE_Projeto_Final\ProjetoFinal\resources\views/home.blade.php ENDPATH**/ ?>