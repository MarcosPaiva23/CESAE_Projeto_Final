<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CESAE Boleias</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('img/cesae_boleias_normal.png')); ?>">

    
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.bundle.min.js')); ?>" defer></script>


    
    <link rel="stylesheet" href="<?php echo e(asset('css/css2.css')); ?>">

</head>

<body>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="d-flex d-lg-none" style="width: 40px;"></div>

                <a class="navbar-brand mx-auto" href="/">
                    <img src="<?php echo e(asset('img/cesae_boleias_full.png')); ?>" alt="CESAE Digital Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link"href=<?php echo e(route('home')); ?>>Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"href=<?php echo e(route('about')); ?>>Sobre</a>
                        </li>



                        <?php if(Route::has('login')): ?>
                                <?php if(auth()->guard()->check()): ?>



                                    <?php if(Auth::user()->is_admin == 1): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/admin">Dashboard</a>
                                        </li>

                                        <?php else: ?>

                                        <?php if(Auth::user()->tem_carro == 1): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/dashboard-condutor">Matches</a>
                                        </li>

                                        <?php else: ?>

                                        <li class="nav-item">
                                            <a class="nav-link" href="/dashboard-passageiro">Matches</a>
                                        </li>
                                        <?php endif; ?>

                                    <?php endif; ?>

                                    <li class="nav-item">
                                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#settingsModal">Definições</a>
                                    </li>


                                    <form name="logout" id="logout" action="<?php echo e(route('logout')); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout').submit();">Logout</a>
                                    </form>

                                <?php else: ?>
                                    <li class="nav-item">
                                        <a class="nav-link" href="/login">Login</a>
                                    </li>

                                    <?php if(Route::has('register')): ?>
                                        <li class="nav-item">
                                            <a class="nav-link" href="/register">Registar</a>
                                        </li>
                                    <?php endif; ?>
                                <?php endif; ?>
                        <?php endif; ?>


                    </ul>
                </div>
            </div>
        </nav>


        
        <br>
        <div class="container body-div">
            

            <?php echo $__env->yieldContent('content'); ?>
        </div>
    </div>


    <footer>

        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="<?php echo e(asset('img/cesae_boleias_normal.png')); ?>" alt="CESAE Digital Logo">
                    </div>
                </div>
                <div class="col-md-4">
                    <h5>Links Úteis</h5>
                    <ul class="list-unstyled">
                        <li><a href="https://www.cesaedigital.pt/" class="text-white">CESAE Digital</a></li>
                        <li><a href="/feedback" class="text-white">Feedback</a></li>
                        <li><a href="/terms" class="text-white">Termos de Uso</a></li>
                        <li><a href="/privacy" class="text-white">Política de Privacidade</a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <h5>Contactos</h5>
                    <p>Se tiveres dúvidas ou sugestões, entra em contacto connosco!</p>
                    <div class="social-icons">
                        <a href="https://www.facebook.com/CesaeDigital/"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/cesae.digital/"><i class="fab fa-instagram"></i></a>
                        <a href="https://www.linkedin.com/school/cesae-digital/"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
            </div>
            <hr class="mt-4" style="background-color: white;">
            <div class="row">
                <div class="col text-center">
                    <p class="mb-0">&copy; <?php echo e(date('Y')); ?> CESAE Boleias. Todos os direitos reservados.</p>
                </div>
            </div>
        </div>
    </footer>
    <?php if(auth()->guard()->check()): ?>
    <?php echo $__env->make('settings_modal', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
<?php endif; ?>
</body>

</html>
<?php /**PATH C:\Users\marco\OneDrive\Ambiente de Trabalho\CESAE\CESAE_Projeto_Final\ProjetoFinal\resources\views/layout/main_layout.blade.php ENDPATH**/ ?>