<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} :: @yield('titulo')</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>

  <div class="logo">
    <img src="{{ asset('/img/logo-digital2.png') }}" alt="Digital">
  </div>

  <div class="container">

      <a href="{{ route('home') }}">Home</a>
      
      <a href="{{ route('atualizar.perfil', ['id' => 19 ]) }}">Atualizar Perfil</a>
      
      
        @yield('conteudo')
 </div>
        <footer>
          <p> Digital - 2021</p>
        </footer>
  </body>
</html>