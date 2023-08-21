<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/js/app.js', 'resources/css/projeto.css']) 
</head>
<body>
    <div class="row">
        <div class="col-sm-10">
            @component('sistema.navbar')
            @endcomponent
        </div>
        <div style="margin-top: 100px">
            <main role="main">
                    <div class=container>
                        @hasSection('content')
                            @yield('content')
                        @endif
                    </div>
            </main>
        </div>
    </div>
    @hasSection('javascript')
        @yield('javascript')
    @endif    
</body>
</html>
