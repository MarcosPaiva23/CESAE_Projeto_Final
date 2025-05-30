<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Uber Cesae</title>

    
    <link rel="stylesheet" href="<?php echo e(asset('bootstrap/css/bootstrap.min.css')); ?>">
    <script src="<?php echo e(asset('bootstrap/js/bootstrap.bundle.min.js')); ?>" defer></script>

    
    <link rel="stylesheet" href="<?php echo e(asset('css/css2.css')); ?>">

</head>
<body>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <div class="d-flex d-lg-none" style="width: 40px;"></div>

                <a class="navbar-brand mx-auto" href="/">
                    <img src="<?php echo e(asset('images/cesae_boleias.png')); ?>" alt="CESAE Digital Logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/">Sobre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Registar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

    <div>
        <div>
            <table class="table   table-hover table-success" >
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td colspan="2">Larry the Bird</td>
                    <td>@twitter</td>
                  </tr>
                </tbody>
              </table>
        </div>
    </div>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="footer-logo">
                        <img src="<?php echo e(asset('images/cesae_boleias.png')); ?>" alt="CESAE Digital Logo">
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
</body>
</html>
<?php /**PATH C:\Users\sw2024\Desktop\git\CESAE_Projeto_Final\ProjetoFinal\resources\views/layout/layout_marcos.blade.php ENDPATH**/ ?>