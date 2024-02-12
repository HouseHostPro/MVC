<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="{{asset('build/assets/custom.css')}}">
    <script src="{{asset('build/assets/custom2.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body style="height: 98vh;">
    <main class="container-fluid d-flex justify-content-center">
        <div class="container-sm">
            <div class="col-12 row border-bottom border-black mt-4 ">
                <div class="col-12 col-md-11 col-lg-7 row">
                    <button type="button" id="atras" class="col-1 border-0 bg-white mb-3 text-end" >
                        <a href="@yield('url')" class="text-dark ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                            </svg>
                        </a>
                    </button>
                    <h1 class="col-10 mb-4 h2">@yield('title')</h1>
                </div>
            </div>
           @yield('content')
        </div>
    </main>
</body>
</html>

