<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Diklat</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('assets/fontawesome/css/all/min.css') }}">
    
    @yield('css')
    <style>
        .link-menu {
            color: white;
        }

        .link-menu:hover {
            color:white;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo 03" aria-controls="navbarTogglerDemo03" 
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggle-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('admin') }}">Admin Diklat</a>

        <div class="collapse navbar-collapse" id="navbarToggleDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/akun-profil') }}">Akun Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/jenis-diklat') }}">Jenis Diklat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/kuota-diklat') }}">Kuota Diklat</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('admin/info-pendaftaran') }}">Info Pendaftaran</a>
                </li>
            </ul>
            <div class="my-2 my-lg-0">
                <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <label class="btn btn-secondary active">
                        <a href="{{ url('admin/profile/'. session('admin_id')) }}" class="link-menu"> Profile
                        </a>
                    </label>
                    <label class="btn btn-secondary">
                        <a href="{{ url('logout') }}" class="link-menu">Log Out   
                        </a>
                    </label>
                </div>
            </div>
        </div>
    </nav>


    <div class="container-fluid mt-3">
        <div class="jumbotron">
            @yield('content')
        </div>
    </div>

    <footer class="footer navbar fixed-bottom bg-dark">
        <div class="container">
            <span class="text-muted">Copyright @ 2021 BK UDINUS</span>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" 
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" 
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    @yield('js')
</body>

</html>