<!DOCTYPE html>
<html>
<head>
    <title>Custom Auth in Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css"/>
    <style>
        body{margin-top:20px;}
        .card-style1 {
            box-shadow: 0px 0px 10px 0px rgb(89 75 128 / 9%);
        }
        .border-0 {
            border: 0!important;
        }
        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 1px solid rgba(0,0,0,.125);
            border-radius: 0.25rem;
        }

        section {
            padding: 120px 0;
            overflow: hidden;
            background: #fff;
        }
        .mb-2-3, .my-2-3 {
            margin-bottom: 2.3rem;
        }

        .section-title {
            font-weight: 600;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 10px;
            position: relative;
            display: inline-block;
        }
        .text-primary {
            color: #ceaa4d !important;
        }
        .text-secondary {
            color: #15395A !important;
        }
        .font-weight-600 {
            font-weight: 600;
        }
        .display-26 {
            font-size: 1.3rem;
        }

        @media screen and (min-width: 992px){
            .p-lg-7 {
                padding: 4rem;
            }
        }
        @media screen and (min-width: 768px){
            .p-md-6 {
                padding: 3.5rem;
            }
        }
        @media screen and (min-width: 576px){
            .p-sm-2-3 {
                padding: 2.3rem;
            }
        }
        .p-1-9 {
            padding: 1.9rem;
        }

        .bg-secondary {
            background: #15395A !important;
        }
        @media screen and (min-width: 576px){
            .pe-sm-6, .px-sm-6 {
                padding-right: 3.5rem;
            }
        }
        @media screen and (min-width: 576px){
            .ps-sm-6, .px-sm-6 {
                padding-left: 3.5rem;
            }
        }
        .pe-1-9, .px-1-9 {
            padding-right: 1.9rem;
        }
        .ps-1-9, .px-1-9 {
            padding-left: 1.9rem;
        }
        .pb-1-9, .py-1-9 {
            padding-bottom: 1.9rem;
        }
        .pt-1-9, .py-1-9 {
            padding-top: 1.9rem;
        }
        .mb-1-9, .my-1-9 {
            margin-bottom: 1.9rem;
        }
        @media (min-width: 992px){
            .d-lg-inline-block {
                display: inline-block!important;
            }
        }
        .rounded {
            border-radius: 0.25rem!important;
        }
    </style>
</head>
<body>
<nav class="navbar navbar-light navbar-expand-lg mb-5" style="background-color: #e3f2fd;">
    <div class="container">
        <a class="navbar-brand mr-auto" href="{{ route('login') }}"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

@yield('content')
</body>
</html>