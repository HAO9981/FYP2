<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>STL Board Game Cafe</title>
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('image/Board Game Logo.png') }}">
    <style>
        .navbar-custom {
            background-color: #85fa72;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light navbar-custom">
        <a class="navbar-brand" href="/homePage">
            <img src="{{ asset('image/Board Game Logo.png') }}" class="img-fluid rounded-circle" width="50"> Board Game Cafe
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
          
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/homePage">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 576 512">
                            <path fill="currentColor" d="M280.37 148.26L96 300.11V464a16 16 0 0 0 16 16l112.06-.29a16 16 0 0 0 15.92-16V368a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v95.64a16 16 0 0 0 16 16.05L464 480a16 16 0 0 0 16-16V300L295.67 148.26a12.19 12.19 0 0 0-15.3 0zM571.6 251.47L488 182.56V44.05a12 12 0 0 0-12-12h-56a12 12 0 0 0-12 12v72.61L318.47 43a48 48 0 0 0-61 0L4.34 251.47a12 12 0 0 0-1.6 16.9l25.5 31A12 12 0 0 0 45.15 301l235.22-193.74a12.19 12.19 0 0 1 15.3 0L530.9 301a12 12 0 0 0 16.9-1.6l25.5-31a12 12 0 0 0-1.7-16.93z"/>
                        </svg> Home
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/showProduct">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 512 512">
                            <path fill="currentColor" d="M144 16c0-8.8-7.2-16-16-16s-16 7.2-16 16v16H96c-8.8 0-16 7.2-16 16s7.2 16 16 16h16v32H60.2C49.1 96 40 105.1 40 116.2c0 2.5.5 4.9 1.3 7.3L73.8 208H72c-13.3 0-24 10.7-24 24s10.7 24 24 24h4L60 384h136l-16-128h4c13.3 0 24-10.7 24-24s-10.7-24-24-24h-1.8l32.5-84.5c.9-2.3 1.3-4.8 1.3-7.3c0-11.2-9.1-20.2-20.2-20.2H144V64h16c8.8 0 16-7.2 16-16s-7.2-16-16-16h-16V16zM48 416L4.8 473.6C1.7 477.8 0 482.8 0 488c0 13.3 10.7 24 24 24h208c13.3 0 24-10.7 24-24c0-5.2-1.7-10.2-4.8-14.4L208 416H48zm288 0l-43.2 57.6c-3.1 4.2-4.8 9.2-4.8 14.4c0 13.3 10.7 24 24 24h176c13.3 0 24-10.7 24-24c0-5.2-1.7-10.2-4.8-14.4L464 416H336zm-32-208v51.9c0 7.8 2.8 15.3 8 21.1l27.2 31l-2.2 72h125.5l-3.3-72l28.3-30.8c5.4-5.9 8.5-13.6 8.5-21.7V208c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16v16h-24v-16c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16v16h-24v-16c0-8.8-7.2-16-16-16h-16c-8.8 0-16 7.2-16 16zm80 96c0-8.8 7.2-16 16-16s16 7.2 16 16v32h-32v-32z"/>
                        </svg> Board Game Library
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('menu')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M18.06 23h1.66c.84 0 1.53-.65 1.63-1.47L23 5.05h-5V1h-1.97v4.05h-4.97l.3 2.34c1.71.47 3.31 1.32 4.27 2.26c1.44 1.42 2.43 2.89 2.43 5.29V23M1 22v-1h15.03v1c0 .54-.45 1-1.03 1H2c-.55 0-1-.46-1-1m15.03-7C16.03 7 1 7 1 15h15.03M1 17h15v2H1v-2Z"/>
                        </svg> Menu
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/showTable">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 1664 1472">
                            <path fill="currentColor" d="M64 606L0 576V448L832 64l832 384v128l-64 30v534q0 38-26.5 57t-69.5 19t-69.5-19t-26.5-57V694L928 916v480q0 38-26.5 57t-69.5 19t-69.5-19t-26.5-57V916L256 694v446q0 38-26.5 57t-69.5 19t-69.5-19t-26.5-57V606z"/>
                        </svg> Table
                    </a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('customer.reservations') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" viewBox="0 0 36 36">
                            <path fill="currentColor" d="M32 6H4a2 2 0 0 0-2 2v20a2 2 0 0 0 2 2h28a2 2 0 0 0 2-2V8a2 2 0 0 0-2-2ZM19 22H9a1 1 0 0 1 0-2h10a1 1 0 0 1 0 2Zm8-4H9a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2Zm0-4H9a1 1 0 0 1 0-2h18a1 1 0 0 1 0 2Z" class="clr-i-solid clr-i-solid-path-1"/>
                            <path fill="none" d="M0 0h36v36H0z"/>
                        </svg> Reservation Details
                    </a>
                </li>
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('account')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 432 432">
                        <path fill="currentColor" d="M213.5 3q88.5 0 151 62.5T427 216t-62.5 150.5t-151 62.5t-151-62.5T0 216T62.5 65.5T213.5 3zm0 64Q187 67 168 85.5t-19 45t19 45.5t45.5 19t45-19t18.5-45.5t-18.5-45t-45-18.5zm0 303q39.5 0 73-18.5T341 301q0-20-23.5-35.5t-52-23t-52-7.5t-52 7.5t-52 23T85 301q21 32 55 50.5t73.5 18.5z"/>
                    </svg>
                    </a>
                </li>
              </ul>
        </div>
    </nav> 
<body style="background-image: url('{{ asset('image/cool-background.png') }}'); background-size: cover; background-position: center;">
    <div class="container-fluid">
        @yield('content')
    </div>
</body>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>