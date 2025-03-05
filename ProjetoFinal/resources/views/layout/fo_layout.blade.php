<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Site Uber Cesae</title>

    {{-- bottstrap --}}
    <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
    <script src="{{asset('bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>

    {{-- css main --}}
    <link rel="stylesheet" href="{{asset('css/main.css')}}">

</head>
<body>

    {{-- navebar --}}
    <nav class="navbar navbar-color fixed-top">
        <div class="container-fluid d-flex justify-content-center">

            {{-- imagem e titulo --}}
            <div class="col-11 text-center" >
                <a class="navbar-brand" href="#" style="color: white">
                    <img src="{{asset('img/PSX_20250225_122900.png')}}" alt="Logo" width="30" height="24" class="d-inline-block align-text-top">
                    <b>CESAE Boleias<b>
                  </a>
            </div>

            {{-- hamburguer --}}
            <div class="col text-end">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" >
                    <div class="offcanvas-header">
                      <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                      <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="#">Link</a>
                        </li>
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                          </ul>
                        </li>
                      </ul>
                      <form class="d-flex mt-3" role="search">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                    </div>
                  </div>
            </div>
        </div>
      </nav>

        <br><br><br>

        <div class="container-fluid row caixa">
            <div class="col-2"></div>
          <div class="col-8 teste merriweather-regular" style="background-color: #849293"> <br><br><br><br><br>
            Teste teste teste teste teste
            <br><br><br><br><br><br><br><br></div>
          </div>


    {{-- container para o conteudo nao ficar colado a lateral --}}
    <div class="container body-div">
        {{-- chamar o conteudo // 'content' é o nome que vai chamar --}}
        @yield('content')
    </div>

    <div>
        <table class="table  table-striped table-hover table-success" >
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


    <br><br>


      {{-- footer --}}
      <footer class="text-center text-lg-start footer-color ">
        <!-- Copyright -->
        <div class="text-center p-3">
          © 2025 Copyright:
          <a class="text-body footer-text-link-color" target="_blank" href="https://github.com/Licinio14?tab=repositories">GitHUb</a>
        </div>
        <!-- Copyright -->
    </footer>

</body>
</html>
